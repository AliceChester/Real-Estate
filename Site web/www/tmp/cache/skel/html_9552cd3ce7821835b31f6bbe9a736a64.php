<?php

/*
 * Squelette : ../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_c.html
 * Date :      Wed, 28 Sep 2011 21:24:13 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_c.html
// Temps de compilation total: 1.596 ms
//

function html_9552cd3ce7821835b31f6bbe9a736a64($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- descriptif=<img style="float:right;" src="' .
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
_T('ckeditor:ckeditor_c') .
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
		<a class="cke_selected" href="?exec=cfg&cfg=ckeditor_c">' .
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
		<a href="?exec=cfg&cfg=ckeditor_g">' .
_T('ckeditor:ckeditor_g_light') .
'</a>
		<a href="?exec=cfg&cfg=ckeditor_h">' .
_T('ckeditor:ckeditor_h_light') .
'</a>
</div>

<div class="ajax">
	' .
executer_balise_dynamique('FORMULAIRE_CKC',
	array(),
	array('../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_c.html','html_9552cd3ce7821835b31f6bbe9a736a64','',24,$GLOBALS['spip_lang'])) .
'
</div>
');

	return analyse_resultat_skel('html_9552cd3ce7821835b31f6bbe9a736a64', $Cache, $page, '../plugins/ckeditor-spip-plugin/fonds/cfg_ckeditor_c.html');
}
?>