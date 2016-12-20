<?php

/*
 * Squelette : plugins/auto/crayons/vues/article_texte.html
 * Date :      Tue, 27 Jul 2010 09:43:18 GMT
 * Compile :   Fri, 28 Oct 2011 16:50:14 GMT
 * Boucles :   _a
 */ 

/* BOUCLE articles  */

 function BOUCLE_ahtml_a87a230a7c5b5c25d50fc04280a88c18(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_a';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.texte",
		"articles.lang",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')), 
			array('REGEXP', 'articles.statut', "'.'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/crayons/vues/article_texte.html','html_a87a230a7c5b5c25d50fc04280a88c18','_a',15,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
((is_array($a = ($Pile["vars"])) ? $a['r'] : "") ? (	interdire_scripts(filtrer('image_graver',filtrer('image_reduire',cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect))),(is_array($a = ($Pile["vars"])) ? $a['r'] : ""),'0'))) .
	'
'):(	interdire_scripts(filtrer('image_graver',filtrer('image_reduire',cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect))),'500','0'))) .
	'
')) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/crayons/vues/article_texte.html
// Temps de compilation total: 4.195 ms
//

function html_a87a230a7c5b5c25d50fc04280a88c18($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>
' .
vide($Pile['vars']['r'] = interdire_scripts(match(match(entites_html((@$Pile[0]['class']),true),'\\bimagereduire\\.\\d+\\b'),'\\b\\d+\\b'))) .
'

' .
BOUCLE_ahtml_a87a230a7c5b5c25d50fc04280a88c18($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<small>' . $t1 . '</small>') :
		'') .
'
');

	return analyse_resultat_skel('html_a87a230a7c5b5c25d50fc04280a88c18', $Cache, $page, 'plugins/auto/crayons/vues/article_texte.html');
}
?>