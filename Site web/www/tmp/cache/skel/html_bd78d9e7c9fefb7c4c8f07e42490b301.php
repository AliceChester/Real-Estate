<?php

/*
 * Squelette : ../prive/cfg.html
 * Date :      Sun, 03 Apr 2011 15:42:31 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:34 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../prive/cfg.html
// Temps de compilation total: 1.830 ms
//

function html_bd78d9e7c9fefb7c4c8f07e42490b301($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cfg_link cfg_exec\'>' .
(($t1 = strval(interdire_scripts((tester_url_ecrire(($f = interdire_scripts(@$Pile[0]['script']))) ?generer_url_ecrire($f)  : ""))))!=='' ?
		('<a href="' . $t1 . (	'"><img
	src="' .
	interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
	'/cfg-16.png" width="16" height="16"
	alt="' .
	_T('public/spip/ecrire:icone_configuration_site') .
	' ' .
	interdire_scripts(typo(supprimer_numero(@$Pile[0]['nom']),"TYPO",$connect)) .
	'"
	title="' .
	_T('public/spip/ecrire:icone_configuration_site') .
	' ' .
	interdire_scripts(typo(supprimer_numero(@$Pile[0]['nom']),"TYPO",$connect)) .
	'" /></a>')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_bd78d9e7c9fefb7c4c8f07e42490b301', $Cache, $page, '../prive/cfg.html');
}
?>