<?php

/*
 * Squelette : ../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_g.html
 * Date :      Wed, 28 Sep 2011 21:24:14 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   _si
 */ 

/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_3e8fbd9bc03203ae71146c215c1970bc(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array(($test=interdire_scripts((((filtre_info_plugin_dist("ITERATEURS", "est_actif")) OR (version_compare(spip_version(),'2.2.0','>='))) ?' ' :'')))?array('tableau','1:1'):'');
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_g.html','html_3e8fbd9bc03203ae71146c215c1970bc','_si',26,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
	' .
executer_balise_dynamique('FORMULAIRE_CKG',
	array(),
	array('../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_g.html','html_3e8fbd9bc03203ae71146c215c1970bc','_si',27,$GLOBALS['spip_lang'])) .
'
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette ../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_g.html
// Temps de compilation total: 5.327 ms
//

function html_3e8fbd9bc03203ae71146c215c1970bc($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- interpreter=non -->
<!-- descriptif=<img style="float:right;" src="' .
interdire_scripts(find_in_path('images/ckspip-logo.png')) .
'" />' .
_T('ckeditor:page_config_ckeditor') .
(($t1 = strval(ckversion('')))!=='' ?
		('<code>SVN : r' . $t1 . '</code>') :
		'') .
'
 -->
<!-- titre=' .
_T('ckeditor:visuel') .
' -->
<!-- nom=ckeditor -->
<!-- autoriser=webmestre -->
<!-- refus=' .
_T('cfg:refus_configuration_webmestre') .
' -->
<!-- boite=' .
_T('ckeditor:ckeditor_g') .
' -->
<!-- onglet=ckeditor -->


' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><div id="cke_onglets">
		<a href="?exec=cfg&cfg=ckeditor">' .
_T('ckeditor:ckeditor_light') .
'</a>
		<a href="?exec=cfg&cfg=ckeditor_b">' .
_T('ckeditor:ckeditor_b_light') .
'</a>
		<a href="?exec=cfg&cfg=ckeditor_c">' .
_T('ckeditor:ckeditor_c_light') .
'</a>
		<a href="?exec=cfg&cfg=ckeditor_d">' .
_T('ckeditor:ckeditor_d_light') .
'</a>
		<a href="?exec=cfg&cfg=ckeditor_e">' .
_T('ckeditor:ckeditor_e_light') .
'</a>
		<a href="?exec=cfg&cfg=ckeditor_f">' .
_T('ckeditor:ckeditor_f_light') .
'</a>
		<a class="cke_selected" href="?exec=cfg&cfg=ckeditor_g">' .
_T('ckeditor:ckeditor_g_light') .
'</a>
		<a href="?exec=cfg&cfg=ckeditor_h">' .
_T('ckeditor:ckeditor_h_light') .
'</a>
</div>


<div>
' .
(($t1 = BOUCLE_sihtml_3e8fbd9bc03203ae71146c215c1970bc($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	_T('ckeditor:plugins_necessitent_iterateurs') .
	'
'))) .
'
</div>
');

	return analyse_resultat_skel('html_3e8fbd9bc03203ae71146c215c1970bc', $Cache, $page, '../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_g.html');
}
?>