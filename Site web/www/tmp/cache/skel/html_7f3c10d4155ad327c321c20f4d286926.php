<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/iphone/auteur.html
 * Date :      Mon, 26 Sep 2011 21:51:25 GMT
 * Compile :   Sun, 13 Jul 2014 21:05:31 GMT
 * Boucles :   _articles, _auteurs, _principale
 */ 

/* BOUCLE articles  */

 function BOUCLE_articleshtml_7f3c10d4155ad327c321c20f4d286926(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.popularite",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.popularite DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/iphone/auteur.html','html_7f3c10d4155ad327c321c20f4d286926','_articles',56,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : _request('debut_articles');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles']['total'] : $debut_boucle + 9), $Numrows['_articles']['total'] - 1);
	$Numrows['_articles']['grand_total'] = $Numrows['_articles']['total'];
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                <li><a href="' .
interdire_scripts(generer_url_public('article',(	'id_article=' .
	$Pile[$SP]['id_article']))) .
'"><h3>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</h3></a></li>
                ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_auteurshtml_7f3c10d4155ad327c321c20f4d286926(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	$select = array("rand() AS alea",
		"auteurs.id_auteur",
		"auteurs.nom");
	static $orderby = array('alea');
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/iphone/auteur.html','html_7f3c10d4155ad327c321c20f4d286926','_auteurs',77,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_auteurs']['compteur_boucle'] = 0;
	$Numrows['_auteurs']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_auteurs']) ? $Pile[0]['debut_auteurs'] : _request('debut_auteurs');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_auteurs'] = quete_debut_pagination('id_auteur',$Pile[0]['@id_auteur'] = substr($debut_boucle,1),20,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_auteurs']['total']-1)/(20))*(20)));
	$fin_boucle = min(($tout ? $Numrows['_auteurs']['total'] : $debut_boucle + 19), $Numrows['_auteurs']['total'] - 1);
	$Numrows['_auteurs']['grand_total'] = $Numrows['_auteurs']['total'];
	$Numrows['_auteurs']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_auteurs']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_auteurs']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_auteurs']['compteur_boucle']++;
		if ($Numrows['_auteurs']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_auteurs']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
                <li><a href="' .
interdire_scripts(generer_url_public('auteur',(	'id_auteur=' .
	$Pile[$SP]['id_auteur']))) .
'"' .
(calcul_exposer($Pile[$SP]['id_auteur'], 'id_auteur', $Pile[0], '', 'id_auteur', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'><h3>' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['nom']),"TYPO",$connect),'80')) .
'</h3></a></li>
                ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_principalehtml_7f3c10d4155ad327c321c20f4d286926(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_principale';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.id_auteur",
		"auteurs.lang",
		"auteurs.nom",
		"auteurs.bio",
		"auteurs.url_site",
		"auteurs.nom_site",
		"auteurs.email");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', sql_quote($Pile[0]['id_auteur'],'','int')));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/iphone/auteur.html','html_7f3c10d4155ad327c321c20f4d286926','_principale',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
(($t1 = strval(interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['nom']),"TYPO",$connect)))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(couper(propre($Pile[$SP]['bio'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/cimobile/squel_mobiles/iphone/auteur.html\',\'html_7f3c10d4155ad327c321c20f4d286926\',\'\',10,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


' .

	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/favicon', array('favicon' => 
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')) ,'lang' => $GLOBALS["spip_lang"] ,'id_auteur'=>$Pile[$SP]['id_auteur'],'id'=>$Pile[$SP]['id_auteur'],'recurs'=>(++$recurs)), array('compil'=>array('plugins/cimobile/squel_mobiles/iphone/auteur.html','html_7f3c10d4155ad327c321c20f4d286926','_principale',13,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
'


<link rel="alternate" type="application/rss+xml" title="' .
interdire_scripts(textebrut(typo(supprimer_numero($Pile[$SP]['nom']),"TYPO",$connect))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_auteur',$Pile[$SP]['id_auteur'])) .
'" />
</head>

<body class="page_auteur">
<div id="page">


	
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/cimobile/squel_mobiles/iphone/auteur.html\',\'html_7f3c10d4155ad327c321c20f4d286926\',\'\',24,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>


	
<div id="lign-som">
	<div id="lign-droite">
		<div id="centre">
		' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']),"TYPO",$connect)) .
'
		</div>
		<a href="' .
interdire_scripts(generer_url_public('recherche')) .
'">
		<div id="droite">' .
_T('spip:info_rechercher') .
'</div></a>
	</div>
	<a href="javascript:history.back()"><div id="gauche">
	Retour</div></a>
</div>

	
    <div id="conteneur">
    <div id="contenu">
    

		<div class="vcard">
        <div class="cartouche">
            ' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'200','200')) .
'
            <h1 class="' .
classe_boucle_crayon('auteurs','qui',$Pile[$SP]['id_auteur']).' fn">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']),"TYPO",$connect)) .
'</h1>
        </div>

        ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['bio'], $connect))))!=='' ?
		((	'<div class="' .
	classe_boucle_crayon('auteurs','bio',$Pile[$SP]['id_auteur']).' texte note">') . $t1 . '</div>') :
		'') .
'
        ' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="' .
	classe_boucle_crayon('auteurs','hyperlien',$Pile[$SP]['id_auteur']).' hyperlien">' .
	_T('public/spip/ecrire:voir_en_ligne') .
	' : <a href="') . $t1 . (	'" class="url org spip_out">' .
	interdire_scripts(((($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) OR (!is_array($a) AND strlen($a))) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'
		</div>

        
        ' .
(($t1 = BOUCLE_articleshtml_7f3c10d4155ad327c321c20f4d286926($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu articles">
            ' .
		filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, false, '', '', array()) .
		'
            <div id="group">' .
		_T('public/spip/ecrire:articles_auteur') .
		' (' .
		(isset($Numrows['_articles']['grand_total'])
			? $Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']) .
		')</div>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, true, '', '', array())))!=='' ?
				('<div id="pagin">' . $t3 . '</div>') :
				'') .
		'
        </div>
        ')) :
		'') .
'

<div id="group"></div>
        ' .
executer_balise_dynamique('FORMULAIRE_ECRIRE_AUTEUR',
	array($Pile[$SP]['id_auteur'],@$Pile[0]['id_article'],$Pile[$SP]['email']),
	array('plugins/cimobile/squel_mobiles/iphone/auteur.html','html_7f3c10d4155ad327c321c20f4d286926','_principale',70,$GLOBALS['spip_lang'])) .
'

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	_T('public/spip/ecrire:info_notes') .
	'</h2>') . $t1 . '</div>') :
		'') .
'
<br>
</div><!--#contenu-->

        
        ' .
(($t1 = BOUCLE_auteurshtml_7f3c10d4155ad327c321c20f4d286926($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu articles">
            ' .
		filtre_pagination_dist($Numrows["_auteurs"]["grand_total"],
 		'_auteurs',
		isset($Pile[0]['debut_auteurs'])?$Pile[0]['debut_auteurs']:intval(_request('debut_auteurs')),
		20, false, '', '', array()) .
		'
            <div id="group">' .
		_T('public/spip/ecrire:info_auteurs') .
		'</div>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_auteurs"]["grand_total"],
 		'_auteurs',
		isset($Pile[0]['debut_auteurs'])?$Pile[0]['debut_auteurs']:intval(_request('debut_auteurs')),
		20, true, '', '', array())))!=='' ?
				('<div id="pagin">' . $t3 . '</div>') :
				'') .
		'
        </div>
        ')) :
		'') .
'
	
<div id="group">' .
_T('public/spip/ecrire:rubriques') .
'</div>
<br>
</div><!--#conteneur-->

    
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-rubriques') . ', array(\'id_rubrique\' => ' . argumenter_squelette(@$Pile[0]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/cimobile/squel_mobiles/iphone/auteur.html\',\'html_7f3c10d4155ad327c321c20f4d286926\',\'\',95,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
    
<div id="group"></div>


<div id="conteneur">

<div id="ticket">
	
<div class="menu articles">
	
<ul>
		
<a rel="start home" href="' .
interdire_scripts(generer_url_public('sommaire')) .
'"><h4>Accueil</h4></a>

					
</ul>

</div>

</div>

</div><!--#conteneur-->

</div><!--#page-->
</body>
</html>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/iphone/auteur.html
// Temps de compilation total: 120.015 ms
//

function html_7f3c10d4155ad327c321c20f4d286926($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_principalehtml_7f3c10d4155ad327c321c20f4d286926($Cache, $Pile, $doublons, $Numrows, $SP) .
'





');

	return analyse_resultat_skel('html_7f3c10d4155ad327c321c20f4d286926', $Cache, $page, 'plugins/cimobile/squel_mobiles/iphone/auteur.html');
}
?>