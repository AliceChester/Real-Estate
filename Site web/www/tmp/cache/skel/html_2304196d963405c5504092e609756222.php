<?php

/*
 * Squelette : ../prive/contenu/rubrique.html
 * Date :      Sun, 03 Apr 2011 15:42:35 GMT
 * Compile :   Sat, 29 Oct 2011 03:14:24 GMT
 * Boucles :   _afficher_contenu
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_afficher_contenuhtml_2304196d963405c5504092e609756222(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'rubriques';
	static $id = '_afficher_contenu';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.lang",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.texte");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)),'','int')), (!$Pile[0]['statut'] ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../prive/contenu/rubrique.html','html_2304196d963405c5504092e609756222','_afficher_contenu',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<div class="champ contenu_titre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['titre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_titre') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
classe_boucle_crayon('rubriques','titre',$Pile[$SP]['id_rubrique']).' ' .
'titre\'>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</div>
</div>
<div class="champ contenu_descriptif' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['descriptif']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_descriptif') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
classe_boucle_crayon('rubriques','descriptif',$Pile[$SP]['id_rubrique']).' ' .
'descriptif\'>' .
interdire_scripts(propre($Pile[$SP]['descriptif'], $connect)) .
'</div>
</div>
<div class="champ contenu_texte' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['texte']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_texte') .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
classe_boucle_crayon('rubriques','texte',$Pile[$SP]['id_rubrique']).' ' .
'texte\'>' .
interdire_scripts(filtrer('image_graver',filtrer('image_reduire',cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect))),'500','0'))) .
'</div>
</div>
' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="champ contenu_notes">
<div class=\'label\'>' .
	_T('public/spip/ecrire:info_notes') .
	'</div>
<div dir=\'' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'\' class=\'' .
	classe_boucle_crayon('rubriques','notes',$Pile[$SP]['id_rubrique']).' ' .
	'notes\'>') . $t1 . '</div>
</div>') :
		'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../prive/contenu/rubrique.html
// Temps de compilation total: 18.380 ms
//

function html_2304196d963405c5504092e609756222($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_afficher_contenuhtml_2304196d963405c5504092e609756222($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_2304196d963405c5504092e609756222', $Cache, $page, '../prive/contenu/rubrique.html');
}
?>