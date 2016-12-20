<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/spiplinks-json.html
 * Date :      Wed, 28 Sep 2011 21:24:11 GMT
 * Compile :   Wed, 02 Jul 2014 17:33:00 GMT
 * Boucles :   _si
 */ 

/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_1a5d5dee661482eae41cb8494ce3c9a7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'condition';
	static $table = 'CONDITION';
	static $id = '_si';
	static $from = array('CONDITION' => 'CONDITION');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(($test=interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['statut'] : "") < '2'))))?array('tableau','1:1'):'');
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/spiplinks-json.html','html_1a5d5dee661482eae41cb8494ce3c9a7','_si',3,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('ckeditor:type_article');
	$l2 = _T('ckeditor:label_section');
	$l3 = _T('ckeditor:label_article');
	$l4 = _T('ckeditor:type_breve');
	$l5 = _T('ckeditor:label_section');
	$l6 = _T('ckeditor:label_breve');
	$l7 = _T('ckeditor:type_section');
	$l8 = _T('ckeditor:label_section');
	$l9 = _T('ckeditor:type_mot');
	$l10 = _T('ckeditor:label_groupe_mots');
	$l11 = _T('ckeditor:label_mot');
	$l12 = _T('ckeditor:type_auteur');
	$l13 = _T('ckeditor:label_auteur');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
{
	"article":{
		"label":"' .
$l1 .
'",
		"selectCategorie":' .
interdire_scripts(json_encode(generer_url_public('rubriques-links-json'))) .
',
		"nomCategorie":"' .
$l2 .
'",
		"selectItem":' .
interdire_scripts(json_encode(concat(generer_url_public('articles-links-json'),'&id_rubrique='))) .
',
		"nomItem":"' .
$l3 .
'"
	},

	"breve":{
		"label":"' .
$l4 .
'",
		"selectCategorie":' .
interdire_scripts(json_encode(generer_url_public('rubriques-links-json'))) .
',
		"nomCategorie":"' .
$l2 .
'",
		"selectItem":' .
interdire_scripts(json_encode(concat(generer_url_public('breves-links-json'),'&id_rubrique='))) .
',
		"nomItem":"' .
$l6 .
'"
	},

	"rubrique":{
		"label":"' .
$l7 .
'",
		"selectCategorie":' .
interdire_scripts(json_encode(generer_url_public('rubriques-links-json'))) .
',
		"nomCategorie":"' .
$l2 .
'"
	},

	"mot":{
		"label":"' .
$l9 .
'",
		"selectCategorie":' .
interdire_scripts(json_encode(generer_url_public('groupemots-links-json'))) .
',
		"nomCategorie":"' .
$l10 .
'",
		"selectItem":' .
interdire_scripts(json_encode(concat(generer_url_public('mots-links-json'),'&id_groupe='))) .
',
		"nomItem":"' .
$l11 .
'"
	},

	"auteur":{
		"label":"' .
$l12 .
'",
		"selectCategorie":' .
interdire_scripts(json_encode(generer_url_public('auteurs-links-json'))) .
',
		"nomCategorie":"' .
$l13 .
'"
	}
}
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/spiplinks-json.html
// Temps de compilation total: 62.522 ms
//

function html_1a5d5dee661482eae41cb8494ce3c9a7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-type: application/json' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
BOUCLE_sihtml_1a5d5dee661482eae41cb8494ce3c9a7($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_1a5d5dee661482eae41cb8494ce3c9a7', $Cache, $page, 'plugins/ckeditor-spip-plugin/spiplinks-json.html');
}
?>