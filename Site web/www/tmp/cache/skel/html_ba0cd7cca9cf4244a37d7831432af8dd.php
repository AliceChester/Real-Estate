<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/spip-styles.html
 * Date :      Wed, 28 Sep 2011 21:24:11 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:50 GMT
 * Boucles :   _si
 */ 

/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_ba0cd7cca9cf4244a37d7831432af8dd(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'condition';
	static $table = 'CONDITION';
	static $id = '_si';
	static $from = array('CONDITION' => 'CONDITION');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
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
		 array('plugins/ckeditor-spip-plugin/spip-styles.html','html_ba0cd7cca9cf4244a37d7831432af8dd','_si',3,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_si']['total'] = @intval(array_shift(sql_fetch($result, 'condition')));
	$SP++;
	// RESULTATS
	
	$t0 = str_repeat('
<?php
	include_spip(\'inc/ckeditor_cfgtools\') ;
	include_spip(\'inc/ckeditor_lire_config\') ;
	include_spip(\'inc/ckeditor_constantes\') ;
	echo parse_spipcss(ckeditor_lire_config(\'styles\', _CKE_STYLES_DEF)) ;
?>
', $Numrows['_si']['total']);
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/spip-styles.html
// Temps de compilation total: 36.952 ms
//

function html_ba0cd7cca9cf4244a37d7831432af8dd($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-type: text/css' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
BOUCLE_sihtml_ba0cd7cca9cf4244a37d7831432af8dd($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_ba0cd7cca9cf4244a37d7831432af8dd', $Cache, $page, 'plugins/ckeditor-spip-plugin/spip-styles.html');
}
?>