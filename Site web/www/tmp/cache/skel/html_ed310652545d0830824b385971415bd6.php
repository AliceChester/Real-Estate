<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/modeles/inc-aucun-document.html
 * Date :      Wed, 28 Sep 2011 21:24:26 GMT
 * Compile :   Fri, 15 Nov 2013 11:04:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/modeles/inc-aucun-document.html
// Temps de compilation total: 0.159 ms
//

function html_ed310652545d0830824b385971415bd6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div style=\'margin:15px;\'>
	<h3>' .
_T('ckeditor:aucun_document') .
'</h3>
    ' .
_T('ckeditor:aucun_document_descriptif') .
'
    <div style=\'width:100%;text-align:center;\'><button onclick=\'window.close();\'>' .
_T('public/spip/ecrire:fermer_page') .
'</button></div>
</div>
');

	return analyse_resultat_skel('html_ed310652545d0830824b385971415bd6', $Cache, $page, 'plugins/ckeditor-spip-plugin/modeles/inc-aucun-document.html');
}
?>