<?php
// Code d'inclusion pour le plugin 'Couteau Suisse'
++$GLOBALS['cs_fonctions'];
// Ce fichier contient des fonctions toujours compilees dans tmp/couteau-suisse/mes_fonctions.php
if (!defined("_ECRIRE_INC_VERSION")) return;

// compatibilite SPIP < 2.00
if(!defined('_SPIP19300')) {
	// #VAL{x} renvoie 'x' (permet d'appliquer un filtre a une chaine)
	// Attention #VAL{1,2} renvoie '1', indiquer #VAL{'1,2'}
	function balise_VAL($p){
		$p->code = interprete_argument_balise(1,$p);
		if (!strlen($p->code)) $p->code = "''";
		$p->interdire_scripts = false;
		return $p;
	}
	if(!function_exists('oui')) { function oui($code) { return $code?' ':''; } }
	if(!function_exists('non')) { function non($code) { return $code?'':' '; } }
}

// fonction appelant une liste de fonctions qui permettent de nettoyer un texte original de ses raccourcis indesirables
function cs_introduire($texte) {
	// liste de filtres qui sert a la balise #INTRODUCTION
	if(!is_array($GLOBALS['cs_introduire'])) return $texte;
	$liste = array_unique($GLOBALS['cs_introduire']);
	foreach($liste as $f)
		if (function_exists($f)) $texte = $f($texte);
	return $texte;
}

// Fonction propre() sans paragraphage
function cs_propre($texte) {
	include_spip('inc/texte');
	$mem = $GLOBALS['toujours_paragrapher'];
	$GLOBALS['toujours_paragrapher'] = false;
	$texte = propre($texte);
	$GLOBALS['toujours_paragrapher'] = $mem;
	return $texte;
}

// Filtre creant un lien <a> sur un texte
// Exemple d'utilisation : [(#EMAIL*|cs_lien{#NOM})]
function cs_lien($lien, $texte='') {
	if(!$lien) return $texte;
	return cs_propre("[{$texte}->{$lien}]");
}

// filtre pour ajouter un <span> autour d'un texte
function cs_span($texte, $attr='') { return "<span $attr>$texte</span>"; }

// Controle (basique!) des 3 balises usuelles p|div|span eventuellement coupees
// Attention : simple traitement pour des balises non imbriquees
function cs_safebalises($texte) {
	$texte = trim($texte);
	// ouvre/supprime la premiere balise trouvee fermee (attention aux modeles SPIP)
	if(preg_match(',^(.*)</([a-z]+)>,Ums', $texte, $m) && !preg_match(",<$m[2][ >],", $m[1])) 
		$texte = strlen($m[1])?"<$m[2]>$texte":trim(substr($texte, strlen($m[2])+3));
	// referme/supprime la derniere balise laissee ouverte (attention aux modeles SPIP)
	if(preg_match(',^(.*)[ >]([a-z]+)<,Ums', $rev = strrev($texte), $m) && !preg_match(",>$m[2]/<,", $m[1])) 
		$texte = strrev(strlen($m[1])?">$m[2]/<$rev":trim(substr($rev, strlen($m[2])+2)));
	// balises <p|span|div> a traiter
	foreach(array('span', 'div', 'p') as $b) {
		// ouvrante manquante
		if(($fin = strpos($texte, "</$b>")) !== false)
			if(!preg_match(",<{$b}[ >],", substr($texte, 0, $fin)))
				$texte = "<$b>$texte";
		// fermante manquante
		$texte = strrev($texte);
		if(preg_match(',[ >]'.strrev("<{$b}").',', $texte, $reg)) {
			$fin = strpos(substr($texte, 0, $deb = strpos($texte, $reg[0])), strrev("</$b>"));
			if($fin===false || $fin>$deb) $texte = strrev("</$b>").$texte;
		}
		$texte = strrev($texte);
	}
	return $texte;
}

// fonction de suppression de notes. Utile pour #CS_SOMMAIRE ou #CS_DECOUPE
function cs_supprime_notes($texte) {
	return preg_replace(', *\[\[(.*?)\]\],msS', '', $texte);
}

// filtre appliquant les traitements SPIP d'un champ (et eventuellement d'un type d'objet) sur un texte
// (voir la fonction champs_traitements($p) dans : public/references.php)
// => permet d'utiliser les balises etoilees : #TEXTE*|mon_filtre|cs_traitements{TEXTE,articles}
// ce mecanisme est a preferer au traditionnel #TEXTE*|mon_filtre|propre
// cs_traitements() consulte simplement la globale $table_des_traitements et applique le traitement adequat
// $exclusions est une chaine ou un tableau de filtres a exclure du traitement
function cs_traitements($texte, $nom_champ='NULL', $type_objet='NULL', $exclusions=NULL) {
	global $table_des_traitements;
	if(!isset($table_des_traitements[$nom_champ])) return $texte;
	$ps = $table_des_traitements[$nom_champ];
	if(is_array($ps)) $ps = $ps[isset($ps[$type_objet]) ? $type_objet : 0];
	if(!$ps) return $texte;
	// retirer les filtres a exclure
	if($exclusions!==NULL) $ps = str_replace($exclusions, 'cs_noop', $ps);
	// remplacer le placeholder %s par le texte fourni
	eval('$texte=' . str_replace('%s', '$texte', $ps) . ';');
	return $texte;
}
function cs_noop($t='',$a=NULL,$b=NULL,$c=NULL) { return $t; }

// renvoie un champ d'un objet en base
function cs_champ_sql($id, $champ='texte', $objet='article') {
	// Utiliser la bonne requete en fonction de la version de SPIP
	if(function_exists('sql_getfetsel')) {
		// SPIP 2.0
		// TODO : fonctions SPIP pour trouver la table et l'id_objet
		if($r = sql_getfetsel($champ, 'spip_'.$objet.'s', 'id_'.$objet.'='.intval($id)))
			return $r;
	} else {
		if($r = spip_query('SELECT '.$champ.' FROM spip_'.$objet.'s WHERE id_'.$objet.'='.intval($id)))
			// s'il existe un champ, on le retourne
			if($row = spip_fetch_array($r)) return $row[$champ];
	}
	// sinon rien !
	return '';
}
@define('_decoupe_NB_CARACTERES', 60);

define('_onglets_CONTENU', '<div class="onglets_contenu"><h2 class="cs_onglet"><a href="#">');
define('_onglets_CONTENU2', '</a></h2>'); // sans le </div> !
define('_onglets_DEBUT', '<div class="onglets_bloc_initial">');
define('_onglets_REGEXPR', ',<onglets([0-9]*)>(.*?)</onglets\1>,ms');

// aide le Couteau Suisse a calculer la balise #INTRODUCTION
$GLOBALS['cs_introduire'][] = 'decoupe_nettoyer_raccourcis';

// filtre ajoutant 'artpage' a l'url 
function decoupe_url($url, $page, $num_pages) {
	return parametre_url($url, 'artpage',$page>1?"{$page}-{$num_pages}":'');
}

function onglets_callback($matches) {
	// cas des onglets imbriques
	if (strpos($matches[2], '<onglets')!==false)
		$matches[2] = preg_replace_callback(_onglets_REGEXPR, 'onglets_callback', $matches[2]);
	// nettoyage apres les separateurs
	$matches[2] = preg_replace(','.preg_quote(_decoupe_SEPARATEUR,',').'\s+,', _decoupe_SEPARATEUR, $matches[2]);
	// au cas ou on ne veuille pas d'onglets, on remplace les '++++' par un filet et on entoure d'une classe.
	if (defined('_CS_PRINT')) {
		@define(_decoupe_FILET, '<p style="border-bottom:1px dashed #666; padding:0; margin:1em 20%; font-size:4pt;" >&nbsp; &nbsp;</p>');
		$t = preg_split(',(\n\n|\r\n\r\n|\r\r),', $matches[2], 2);
		$texte = preg_replace(','.preg_quote(_decoupe_SEPARATEUR, ',').'(.*?)(\n\n|\r\n\r\n|\r\r),ms', _decoupe_FILET."<h4>$1</h4>\n\n", $t[1]);
		// on sait jamais...
		str_replace(_decoupe_SEPARATEUR, _decoupe_FILET, $texte);
		return '<div class="onglets_print"><h4>' . textebrut(echappe_retour($t[0],'CS')) . "</h4>\n\n$texte\n\n</div>";
	}
	$onglets = $contenus = array();
	$pages = explode(_decoupe_SEPARATEUR, $matches[2]);
	foreach ($pages as $p) {
		$t = preg_split(',(\n\n|\r\n\r\n|\r\r),', $p, 2);
		$t = array(trim(textebrut(nettoyer_raccourcis_typo(echappe_retour($t[0],'CS')))), cs_safebalises($t[1]));
		if(strlen($t[0].$t[1])) $contenus[] = _onglets_CONTENU.$t[0]._onglets_CONTENU2."<div>\n\n".$t[1]."\n\n</div></div>";
	}
	return _onglets_DEBUT.join('', $contenus).'</div>'._onglets_FIN;
}

// fonction appellee sur les parties du texte non comprises entre les balises : html|code|cadre|frame|script|acronym|cite
function decouper_en_onglets_rempl(&$texte) {
	// compatibilite avec la syntaxe de Pierre Troll
	if (strpos($texte, '<onglet|')!==false) {
		$texte = str_replace('<onglet|fin>', '</onglets>', $texte);
		$texte = preg_replace(',<onglet\|debut[^>]*\|titre=([^>]*)>\s*,', "<onglets>\\1\n\n", $texte);
		$texte = preg_replace(',\s*<onglet\|titre=([^>]*)>\s*,', "\n\n++++\\1\n\n", $texte);
	}
	// il faut un callback pour analyser l'interieur du texte
	return preg_replace_callback(_onglets_REGEXPR, 'onglets_callback', $texte);
}

// fonction appellee sur les parties du textes non comprises entre les balises : html|code|cadre|frame|script|acronym|cite
function decouper_en_pages_rempl($texte, $pagination_seule=false) {
	// un seul id par page...
	static $id_decoupe = '';
	
	// si pas de separateur, on sort
	if (strpos($texte, _decoupe_SEPARATEUR)===false) return $pagination_seule?'':$texte;

	// au cas ou on ne veuille pas de decoupe, on remplace les '++++' par un filet.
	if (defined('_CS_PRINT') && !$pagination_seule) {
		@define(_decoupe_FILET, '<p style="border-bottom:1px dashed #666; padding:0; margin:1em 20%; font-size:4pt;" >&nbsp; &nbsp;</p>');
		return str_replace(_decoupe_SEPARATEUR, _decoupe_FILET, $texte);
	}
	// recherche du sommaire s'il existe
	if (defined('_sommaire_REM') && (substr_count($texte, _sommaire_REM)==2)) {
		$pages = explode(_sommaire_REM, $texte);
		$sommaire = $pages[0].$pages[1];
		$texte = $pages[2];
	} else $sommaire = ''; 

	// traitement des pages
	$pages = explode(_decoupe_SEPARATEUR, $texte);
	$num_pages = count($pages);
	if ($num_pages == 1) return $pagination_seule?'':$texte;
	$artpage = max(intval(artpage()), 1);
	$artpage = min($artpage, $num_pages);
/*
	// si numero illegal ou si var_recherche existe, alors renvoyer toutes les pages, separees par une ligne <hr/>.
	// la surbrillance pourra alors fonctionner correctement.
	if (strlen($_GET['var_recherche']) || $artpage < 1 || $artpage > $num_pages)
		return join("<hr/>", $pages);
*/

	// si la balise #CS_DECOUPE est utilisee on renvoie le texte sans pagination
	if (!$pagination_seule) {
		// page demandee
		$page = cs_safebalises($pages[$artpage-1]);
		if (isset($_GET['decoupe_recherche'])) {
			include_spip('inc/surligne');
			$page = surligner_mots($page, $_GET['decoupe_recherche']);
		}
		if (defined('_decoupe_BALISE')) return $sommaire.$page;
	}

	$self = nettoyer_uri();//self();//$GLOBALS['REQUEST_URI'];

	// liens des differentes pages sous forme : 1 2 3 4
	$milieu = '';
	for ($i = 1; $i <= $num_pages; $i++) {
		$page_ = supprimer_tags(cs_safebalises(cs_introduire(echappe_retour($pages[$i-1],'CS'))));
		$title = preg_split("/[\r\n]+/", trim($page_), 2);
		$title = attribut_html(/*propre*/(couper($title[0], _decoupe_NB_CARACTERES)));//.' (...)';
		$milieu .= recuperer_fond('fonds/decoupe_item', array(
			'page'=>$i, 'artpage'=>$artpage, 'derniere_page'=>$num_pages,
			'title_page'=>_T('couteau:page_lien', array('page' => $i, 'title' => $title)), 
			'self' =>$self,
		));
	}

	// pagination finale
	$pagination = recuperer_fond('fonds/decoupe', array(
		'artpage'=>$artpage, 'derniere_page'=>$num_pages,
		'items'=>$milieu,
		'self' =>$self,
	));
	if ($pagination_seule) {
		if(trim($pagination)=="") return "";
		$pagination = "<div id='decoupe_balise$id_decoupe' class='pagination decoupe_balise'>\n$pagination\n</div>\n";
		return $pagination;
	}
	// ici $pagination_seule est false, $page est definie
	$pagination1 = "<div id='decoupe_haut$id_decoupe' class='pagination decoupe_haut'>\n$pagination\n</div>\n";
	$pagination2 = "<div id='decoupe_bas$id_decoupe' class='pagination decoupe_bas'>\n$pagination\n</div>\n";
	$id_decoupe++;
	return $sommaire.$pagination1.$page.$pagination2;
}

// supprime les notes devenues orphelines
function decoupe_notes_orphelines(&$texte) {
	if($GLOBALS['les_notes']=='') return;
	$notes = $GLOBALS['les_notes'];
/*	if(function_exists('tester_variable')) tester_variable('ouvre_note', '['); // tester_variable() depreciee sous SPIP 2.0
	else*/ if (!isset($GLOBALS['ouvre_note'])) $GLOBALS['ouvre_note'] = '[';
	$ouvre = preg_quote($GLOBALS['ouvre_note'],',');
	$appel = ",<p[^>]*>.*?$ouvre<a [^>]*(?:name|id)=[\"']nb([0-9]+)[\"'] class=[\"']spip_note[\"'] [^>]+>[^<]+</a>.*?</p>,s";
	preg_match_all($appel, $GLOBALS['les_notes'], $tableau);
	for($i=0;$i<count($tableau[0]);$i++) {
		if (!preg_match(",<a href=[\"']#nb{$tableau[1][$i]}[\"'],",$texte)) 
			$notes = str_replace($tableau[0][$i], '', $notes);
	}
	$GLOBALS['les_notes'] = trim($notes);
}

function cs_decoupe_compat($texte){
	// surcharge possible de _decoupe_SEPARATEUR par _decoupe_COMPATIBILITE
	$rempl = ',\s*('
		. preg_quote(_decoupe_SEPARATEUR,',')
		. (defined('_decoupe_COMPATIBILITE')?'|'.preg_quote(_decoupe_COMPATIBILITE,','):'')
		. ')\s*,';
	// mise au clair des separateurs : pour les onglets ET la decoupe en page
	$texte = preg_replace($rempl, "\n\n"._decoupe_SEPARATEUR."\n\n", $texte);
	// si pas d'onglets ou pagination seule demandee, on sort
	if (strpos($texte, '<onglet')===false) return $texte;
	// traitement des onglets
	return decouper_en_onglets_rempl($texte);
}

// ici on est en pre_propre, tests de compatibilite requis, puis traitement des onglets
function cs_onglets($texte){
	return cs_echappe_balises('html|code|cadre|frame|script|cite|jeux', 'cs_decoupe_compat', $texte);
}

// ici on est en post_propre, tests de compatibilite effectues
function cs_decoupe($texte, $pagination_seule=false){
	// si pas de separateur, on sort
	if (strpos($texte, _decoupe_SEPARATEUR)===false) return $pagination_seule?'':$texte;
	$texte = cs_echappe_balises('html|code|cadre|frame|script|cite|table|jeux', 'decouper_en_pages_rempl', $texte, $pagination_seule);
	if (!$pagination_seule)	decoupe_notes_orphelines($texte);
	return $texte;
}

// Compatibilite
function decouper_en_pages($texte){ return cs_decoupe($texte); }

// Balises pour des onglets en squelette
function balise_ONGLETS_DEBUT($p) {
	$arg = sinon(interprete_argument_balise(1,$p),'??');
	$p->code = "calcul_balise_onglet($arg,1)";
	$p->interdire_scripts = false;
	return $p;
}
function balise_ONGLETS_TITRE($p) {
	$arg = sinon(interprete_argument_balise(1,$p),'??');
	$p->code = "calcul_balise_onglet($arg,2)";
	$p->interdire_scripts = false;
	return $p;
}
function balise_ONGLETS_FIN($p) {
	$p->code = "calcul_balise_onglet('',3)";
	$p->interdire_scripts = false;
	return $p;
}
function calcul_balise_onglet($arg, $type) {
	/* dans un onglet principal (non imbrique), on peut omettre #ONGLETS_DEBUT : pratique a l'interieur d'une boucle
		Sinon il faut jouer avec #COMPTEUR_BOUCLE :
		<BOUCLE_sites(SITES)>
			[(#COMPTEUR_BOUCLE|=={1}|?{' '})#ONGLETS_DEBUT{#NOM_SITE}]
			[(#COMPTEUR_BOUCLE|>{1}|?{' '})#ONGLETS_TITRE{#NOM_SITE}]
			(...)
		</BOUCLE_sites>
	*/
	static $onglets_stade;
	if($type==2 && !isset($onglets_stade)) $type = 1;
	switch($type) {
		// #ONGLETS_DEBUT
		case 1:$onglets_stade=1; return _onglets_DEBUT._onglets_CONTENU.$arg._onglets_CONTENU2;
		// #ONGLETS_TITRE
		case 2:$onglets_stade=1; return '</div>'._onglets_CONTENU.$arg._onglets_CONTENU2;
		// #ONGLETS_FIN
		case 3:unset($onglets_stade); return '</div></div>';
	}
}

// decode le parametre artpage=page-total
// attention, artpage n'est pas toujours present
function artpage($t=false, $index=0) {
	if($t===false) $t=_request('artpage');
	$t=strlen($t)?explode('-', $t, 2):array('1','0');
	return $t[$index];
}
function artpage_fin($t=false) {
	if($t===false) $t=_request('artpage');
	$t=strlen($t)?explode('-', $t, 2):array('1','0');
	return $t[0]>0 && $t[0]==$t[1];
}
function artpage_debut($t=false) {
	return artpage($t)==1;
}

// si on veut la balise #CS_DECOUPE (pagination uniquement)
if (defined('_decoupe_BALISE')) {
	function balise_CS_DECOUPE_dist($p) {
		// id de l'article a trouver pour retourner son texte
		$texte = ($v = interprete_argument_balise(1,$p))!==NULL ? 'cs_champ_sql('.$v.')' : champ_sql('texte', $p);
		if ($p->type_requete == 'articles' || $v!==NULL) {
			$p->code = 'cs_decoupe(propre(cs_onglets(cs_supprime_notes('.$texte.'))), true)';
		} else {
			$p->code = "''";
		}
		$p->interdire_scripts = true;
		return $p;
	}
}

/*
 filtre |decoupe_type_pagination qui renvoie :
		1 si le nombre doit etre affiche
		2 si le nombre ne doit pas etre affiche
		3 s'il faut afficher '...'
 voir le modele : modeles/decoupe_item.html
*/
function decoupe_type_pagination($page, $artpage, $page_fin, $rayon=4, $extremes=2) {
	$diametre = $rayon*2;
	if($page_fin<=$diametre+$extremes+1 || $page<=$extremes || $page>$page_fin-$extremes) return 1;
	$depart = max(1, $artpage - $rayon);
	$arrivee = $artpage + $rayon;
	if($arrivee-$depart<$diametre) $arrivee=$depart+$diametre;
	if($arrivee>$page_fin) $arrivee = $page_fin;
	if($arrivee-$depart<$diametre) $depart=$arrivee-$diametre;
	if($depart<=$extremes+1) $depart = 1;
	if($arrivee>=$page_fin-$extremes) $arrivee = $page_fin;
	if($page<$depart-1 || $page>$arrivee+1) return 2;
	if($page==$depart-1 || $page==$arrivee+1) return 3;
	return 1;
}
function mailcrypt($texte) {
	static $ok = NULL;
	if (strpos($texte, '@')===false) return $texte;

	if(is_null($ok)) {
		$ok = true;
		// pour _cs_liens_AUTORISE
		include_spip('outils/inc_cs_liens');
		// tip visible onMouseOver (title)
		// jQuery replacera ensuite le '@' comme ceci : title.replace(/\.\..t\.\./,'[\x40]')
		@define('_mailcrypt_AROBASE_JS', '..&aring;t..');
		@define('_mailcrypt_AROBASE_JSQ', preg_quote(_mailcrypt_AROBASE_JS,','));
		// span ayant l'arobase en background
		@define('_mailcrypt_AROBASE', '<span class=\'spancrypt\'>&nbsp;</span>');
//		@define('_mailcrypt_REGEXPR1', ',\b['._cs_liens_AUTORISE.']*@[a-zA-Z][a-zA-Z0-9-.]*\.[a-zA-Z]+(\?['._cs_liens_AUTORISE.']*)?,');
		@define('_mailcrypt_REGEXPR2', ',\b(['._cs_liens_AUTORISE.']+)@([a-zA-Z][a-zA-Z0-9-.]*\.[a-zA-Z]+(\?['._cs_liens_AUTORISE.']*)?),');
	}

	// echappement des 'input' au cas ou le serveur y injecte des mails persos
	if (strpos($texte, '<in')!==false) 
		$texte = preg_replace_callback(',<input [^<]+/>,Umsi', 'cs_liens_echappe_callback', $texte);
	// echappement des 'protoc://login:mdp@site.ici' afin ne pas les confondre avec un mail
	if (strpos($texte, '://')!==false) 
		$texte = preg_replace_callback(',[a-z0-9]+://['._cs_liens_AUTORISE.']+:['._cs_liens_AUTORISE.']+@,Umsi', 'cs_liens_echappe_callback', $texte);
	// echappement des domaines .htm/.html : ce ne sont pas des mails
	if (strpos($texte, '.htm')!==false)
		$texte = preg_replace_callback(',href=(["\'])[^>]*@[^>]*\.html?\\1,', 'cs_liens_echappe_callback', $texte);

	// protection des liens HTML
	$texte = preg_replace(",[\"\']mailto:([^@\"']+)@([^\"']+)[\"\'],", 
		'"#" title="$1' . _mailcrypt_AROBASE_JS . '$2" onclick="location.href=lancerlien(\'$1\',\'$2\'); return false;"', $texte);
	// retrait des titles en doublon... un peu sale, mais en attendant mieux ?
	$texte = preg_replace(',title="[^"]+'._mailcrypt_AROBASE_JSQ.'[^"]+"([^>]+title=[\"\']),', '$1', $texte);

	if (strpos($texte, '@')===false) return echappe_retour($texte, 'LIENS');
	// protection de tout le reste...
	$texte = preg_replace(_mailcrypt_REGEXPR2, '$1'._mailcrypt_AROBASE.'$2', $texte);
	return echappe_retour($texte, 'LIENS');
}
/* Trois ou quatre balises pour creer des blocs depliables : 

#BLOC_TITRE     		/ {une_URL} si ajax, {un_numero} si bloc numerote, {visible} si bloc deplie /
Mon titre
#BLOC_RESUME			/ facultatif /
Mon resume qui disparait si on clique
#BLOC_DEBUT
Mon bloc depliable		/ qui est aussi l'emplacement pour l'Ajax si le fragment est donne /
#BLOC_FIN

*/

@define('_BLOC_TITRE_H', 'h4');

// Pour la balise suivante, l'ordre des arguments importe peu
// Un bloc replie, titre simple : #BLOC_TITRE
// Un bloc replie AJAX : #BLOC_TITRE{fragment} (fragment est une URLs)
// Un bloc replie numerote : #BLOC_TITRE{numero} (numero est un nombre entier)
// Un bloc deplie ou replie : ajouter l'argument 'visible' ou 'invisible' : #BLOC_TITRE{visible}
// Par defaut : les blocs sont replies
function balise_BLOC_TITRE($p) {
	// Les arguments : 'visible' ou 'invisible', un numero, une URL
	$p->code = "blocs_balises('titre', array(".blocs_arguments($p).'))';
	$p->interdire_scripts = false;
	return $p;
}

function blocs_arguments(&$p) {
	$i = 0; $args = array();
	while(($a = interprete_argument_balise(++$i,$p)) != NULL) $args[] = $a;
	return join(",", $args);
}

// 3 balises obsoletes
function balise_BLOC_TITRE_NUM(&$p) {return balise_BLOC_TITRE($p);}
function balise_BLOC_VISIBLE_TITRE_NUM(&$p) {return balise_BLOC_VISIBLE_TITRE($p);}
function balise_BLOC_VISIBLE_TITRE(&$p) {
	// Produire le premier argument {visible}
	$texte = new Texte; $texte->type='texte'; $texte->texte='visible';
	array_unshift($p->param, array(0=>NULL, 1=>array(0=>$texte)));
	return balise_BLOC_TITRE($p);
}

function balise_BLOC_RESUME($p) {
	$p->code = "blocs_balises('resume')";
	$p->interdire_scripts = false;
	return $p;
}

function balise_BLOC_DEBUT($p) {
	$p->code = "blocs_balises('debut', array(".blocs_arguments($p).'))';
	$p->interdire_scripts = false;
	return $p;
}

function balise_BLOC_FIN($p) {
	$p->code = "blocs_balises('fin')";
	$p->interdire_scripts = false;
	return $p;
}

function balise_BLOC_TITRE_DEBUT($p) {
	$p->code = "blocs_balises('titre_debut', array(".blocs_arguments($p).'))';
	$p->interdire_scripts = false;
	return $p;
}

function balise_BLOC_TITRE_FIN($p) {
	$p->code = "blocs_balises('titre_fin')";
	$p->interdire_scripts = false;
	return $p;
}

// Renvoie un code JQuery pour deplier un bloc au chargement de la page.
// Exemple pour deplier le 5eme bloc : #BLOC_DEPLIER{4} (l'index commence a zero)
function balise_BLOC_DEPLIER($p) {
	$eq = interprete_argument_balise(1, $p);
	$p->code = "bloc_deplier_script(intval($eq))";
	$p->interdire_scripts = false;
	return $p;
}
// Renvoie un code JQuery pour deplier un bloc numerote au chargement de la page.
// Exemple pour deplier le bloc .cs_bloc4 : #BLOC_DEPLIER_NUM{4}
function balise_BLOC_DEPLIER_NUM($p) {
	$eq = interprete_argument_balise(1, $p);
	$p->code = "bloc_num_deplier_script(intval($eq))";
	$p->interdire_scripts = false;
	return $p;
}

// Renvoie un code JQuery pour courcuiter la variable configurant les blocs uniques
// Argument : oui/non ou 0/1
function balise_BLOC_UNIQUE($p) {
	$arg = interprete_argument_balise(1, $p);
	$p->code = "bloc_unique_script($arg)";
	$p->interdire_scripts = false;
	return $p;
}

// fonction (SPIP>=2.0) pour le calcul de la balise #BLOC_DEPLIER
function bloc_deplier_script($num=0) {
	return $num<0?'':http_script("jQuery(document).ready(function() { jQuery('"._BLOC_TITRE_H.".blocs_titre').eq($num).click(); });");
}
// fonction (SPIP>=2.0) pour le calcul de la balise #BLOC_DEPLIER_NUM
function bloc_num_deplier_script($num=-1) {
	return $num<0?'':http_script("jQuery(document).ready(function() { jQuery('div.cs_bloc$num').children('.blocs_titre').eq(0).click(); });");
}
// fonction (SPIP>=2.0) pour le calcul de la balise #BLOC_UNIQUE
function bloc_unique_script($num=1) {
	$num = ($num==='oui' || intval($num)>0)?1:0;
	return http_script("var blocs_replier_tout = $num;");
}

// fonction pour le calcul des balises de type #BLOC_XXX
// $args ne sert que pour #BLOC_TITRE et contient les arguments de la balise sous forme de tableau
function blocs_balises($type, $args=array()) {
	// statut binaire : bit1=ajax bit2=titre bit3=resume bit4=debut
	// 2 = ajax (20 si distant) ; 1 = titre pas d'ajax (10 si distant); idem negatif = bloc visible
	static $bloc_stade;
	$k=isset($bloc_stade)?count($bloc_stade):0;
	$stade=$k?abs($bloc_stade[--$k]):0;
	$distant = $replie = 1; $id = $numero = '';
	switch($type) {
	case 'titre_debut':
		// id pour le bloc distant
		$id = ' id="cs_bloc_id_' . array_shift($args) . '"';
		$distant = 10;
	case 'titre':
		foreach($args as $a) {	
			if(is_numeric($a=trim($a))) $numero = ' cs_bloc'.$a;	
			elseif($a=='visible') $replie = -1;
			elseif($a=='invisible') $replie = 1;
			elseif(strlen($a)) $fragment = $a;
		}
		if (isset($fragment)){
			$ajax=' blocs_ajax ';
			$bloc_stade[]=2*$distant*$replie;
		} else {
			$fragment="javascript:;";
			$ajax='';
			$bloc_stade[]=1*$distant*$replie;
		}
		$replie = $replie>0?' blocs_replie':'';
		return "<div class=\"cs_blocs$numero\"><"._BLOC_TITRE_H." class=\"blocs_titre$replie$ajax\"$id><a href=\"$fragment\">";
	case 'resume':
		$class=$bloc_stade[$k]>0?'':' blocs_invisible blocs_slide';
		if($stade<1 || $stade>2) // on DOIT arriver de titre
			die("Erreur : #BLOC_RESUME sans #BLOC_TITRE ($stade)");
		$bloc_stade[$k]=$bloc_stade[$k]>0?3:-3;	// 3 = resume
		return "</a></"._BLOC_TITRE_H."><div class=\"blocs_resume$class\">";
	case 'debut':
		if(count($args)) {
			// debut d'un bloc depliable a distance
			foreach($args as $a) {	
				if($a=='visible') $replie = -1;
				elseif($a=='invisible') $replie = 1;
				elseif(strlen($a)) $id = " cs_bloc_id_$a";
			}
			$bloc_stade[]=11;
			$class = $replie>0?' blocs_invisible blocs_slide':'';
			return "<div class=\"blocs_destination$class$id\">";
		}
		$class=$bloc_stade[$k]<0?'':' blocs_invisible blocs_slide';
		$bloc_stade[$k]=$bloc_stade[$k]>0?4:-4; // 4=debut
		if($stade == 3)	// on arrive du resume, fermer la div resume seulement
			return "</div><div class=\"blocs_destination$class\">";
		else {
			if($stade<1 || $stade>2) // on DOIT arriver de titre
				die("Erreur : #BLOC_DEBUT sans #BLOC_TITRE ($stade)");
			return '</a></'._BLOC_TITRE_H."><div class=\"blocs_destination$class\">";
		}
	case 'titre_fin':
		$k=isset($bloc_stade)?abs(array_pop($bloc_stade)):0;
		if($k==10 || $k==20) // on DOIT arriver de #BLOC_TITRE_DEBUT
			return '</a></'._BLOC_TITRE_H.'></div>';
		die("Erreur : #BLOC_TITRE_FIN sans #BLOC_TITRE_DEBUT ($k)");
	case 'fin':
		$k=isset($bloc_stade)?abs(array_pop($bloc_stade)):0;
		switch($k) {
			case 4:return "</div></div>";
			case 11:return "</div>";
			default:die("Erreur : #BLOC_FIN sans #BLOC_DEBUT ($k)");
		}

	}
}
?>