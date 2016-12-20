<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/articles-links-json.html
 * Date :      Wed, 28 Sep 2011 21:24:06 GMT
 * Compile :   Wed, 02 Jul 2014 17:33:01 GMT
 * Boucles :   _articles, _si
 */ 

/* BOUCLE articles  */

 function BOUCLE_articleshtml_4fbfabdf5a88e82c131cbaa9caa79eb6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('num', 'articles.titre DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true)),'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/articles-links-json.html','html_4fbfabdf5a88e82c131cbaa9caa79eb6','_articles',4,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval(sql_count($result));
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles']['compteur_boucle']++;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	{ 
		"titre": ' .
interdire_scripts(json_encode(couper(strip_tags(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'30'))) .
', 
		"url": ' .
interdire_scripts(json_encode(parametre_url(generer_url_public('article'),'id_article',$Pile[$SP]['id_article']))) .
',
		"id": ' .
json_encode($Pile[$SP]['id_article']) .
'
	}' .
(($Numrows['_articles']['compteur_boucle'] != $Numrows['_articles']['total']) ? ',':'') .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_4fbfabdf5a88e82c131cbaa9caa79eb6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/ckeditor-spip-plugin/articles-links-json.html','html_4fbfabdf5a88e82c131cbaa9caa79eb6','_si',3,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
[' .
BOUCLE_articleshtml_4fbfabdf5a88e82c131cbaa9caa79eb6($Cache, $Pile, $doublons, $Numrows, $SP) .
']
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/articles-links-json.html
// Temps de compilation total: 7.613 ms
//

function html_4fbfabdf5a88e82c131cbaa9caa79eb6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
BOUCLE_sihtml_4fbfabdf5a88e82c131cbaa9caa79eb6($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_4fbfabdf5a88e82c131cbaa9caa79eb6', $Cache, $page, 'plugins/ckeditor-spip-plugin/articles-links-json.html');
}
?>