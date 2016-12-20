<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/rubriques-links-json.html
 * Date :      Wed, 28 Sep 2011 21:24:10 GMT
 * Compile :   Wed, 02 Jul 2014 17:33:00 GMT
 * Boucles :   _re, _sous_rubriques, _rubriques, _pour, _si
 */ 

/* BOUCLE boucle  */

 function BOUCLE_rehtml_f3d8f59d5f767248ab685ef5131c738b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_sous_rubriques']);
	$t0 = BOUCLE_sous_rubriqueshtml_f3d8f59d5f767248ab685ef5131c738b($Cache, $Pile, $doublons, $Numrows, $SP);
	$Numrows['_sous_rubriques'] = ($save_numrows);
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_sous_rubriqueshtml_f3d8f59d5f767248ab685ef5131c738b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_sous_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/rubriques-links-json.html','html_f3d8f59d5f767248ab685ef5131c738b','_sous_rubriques',11,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
vide($Pile['vars']['cpt'] = plus((is_array($a = ($Pile["vars"])) ? $a['cpt'] : ""),'1')) .
vide($Pile['vars']['item'] = array()) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),interdire_scripts(json_encode(couper(strip_tags(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'30'))))) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),interdire_scripts(json_encode(parametre_url(generer_url_public('rubrique'),'id_rubrique',$Pile[$SP]['id_rubrique']))))) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),$Pile[$SP]['id_rubrique'])) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),(is_array($a = ($Pile["vars"])) ? $a['cpt'] : ""))) .
vide($Pile['vars']['rubs'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['rubs'] : ""),serialize((is_array($a = ($Pile["vars"])) ? $a['item'] : "")))) .
BOUCLE_rehtml_f3d8f59d5f767248ab685ef5131c738b($Cache, $Pile, $doublons, $Numrows, $SP) .
vide($Pile['vars']['cpt'] = moins((is_array($a = ($Pile["vars"])) ? $a['cpt'] : ""),'1')));
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriqueshtml_f3d8f59d5f767248ab685ef5131c738b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	static $where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/rubriques-links-json.html','html_f3d8f59d5f767248ab685ef5131c738b','_rubriques',5,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
vide($Pile['vars']['item'] = array()) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),interdire_scripts(json_encode(couper(strip_tags(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'30'))))) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),interdire_scripts(json_encode(parametre_url(generer_url_public('rubrique'),'id_rubrique',$Pile[$SP]['id_rubrique']))))) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),$Pile[$SP]['id_rubrique'])) .
vide($Pile['vars']['item'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),'0')) .
vide($Pile['vars']['rubs'] = filtre_push((is_array($a = ($Pile["vars"])) ? $a['rubs'] : ""),serialize((is_array($a = ($Pile["vars"])) ? $a['item'] : "")))) .
BOUCLE_sous_rubriqueshtml_f3d8f59d5f767248ab685ef5131c738b($Cache, $Pile, $doublons, $Numrows, $SP));
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE POUR  */

 function BOUCLE_pourhtml_f3d8f59d5f767248ab685ef5131c738b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'pour';
	static $table = 'POUR';
	static $id = '_pour';
	static $from = array('POUR' => 'POUR');
	static $type = array();
	static $groupby = array();
	static $select = array("POUR.valeur");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(
			array('tableau', (is_array($a = ($Pile["vars"])) ? $a['rubs'] : "")));
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/rubriques-links-json.html','html_f3d8f59d5f767248ab685ef5131c738b','_pour',20,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_pour']['compteur_boucle'] = 0;
	$Numrows['_pour']['total'] = @intval(sql_count($result, 'pour'));
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'pour')) {

		$Numrows['_pour']['compteur_boucle']++;
		$t0 .= (
'
	{
		' .
vide($Pile['vars']['item'] = unserialize(forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']))) .
'"titre" : ' .
table_valeur((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),'0') .
',
		"url" : ' .
table_valeur((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),'1') .
',
		"id" : "' .
table_valeur((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),'2') .
'",
		"level" : "' .
table_valeur((is_array($a = ($Pile["vars"])) ? $a['item'] : ""),'3') .
'"
	}' .
(($Numrows['_pour']['compteur_boucle'] != $Numrows['_pour']['total']) ? ',':'') .
'
');
	}
	@sql_free($result, 'pour');
	}
	return $t0;
}



/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_f3d8f59d5f767248ab685ef5131c738b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/ckeditor-spip-plugin/rubriques-links-json.html','html_f3d8f59d5f767248ab685ef5131c738b','_si',3,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
' .
vide($Pile['vars']['rubs'] = array()) .
(($t1 = BOUCLE_rubriqueshtml_f3d8f59d5f767248ab685ef5131c738b($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . '
') :
		'') .
'
[' .
BOUCLE_pourhtml_f3d8f59d5f767248ab685ef5131c738b($Cache, $Pile, $doublons, $Numrows, $SP) .
']
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/rubriques-links-json.html
// Temps de compilation total: 18.839 ms
//

function html_f3d8f59d5f767248ab685ef5131c738b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
BOUCLE_sihtml_f3d8f59d5f767248ab685ef5131c738b($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_f3d8f59d5f767248ab685ef5131c738b', $Cache, $page, 'plugins/ckeditor-spip-plugin/rubriques-links-json.html');
}
?>