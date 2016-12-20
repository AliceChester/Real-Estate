<?php

/*
 * Squelette : ../tmp/couteau-suisse/f279cb3d0b3b18e9038efa262958198b.html
 * Date :      Wed, 29 Feb 2012 15:34:30 GMT
 * Compile :   Wed, 29 Feb 2012 15:34:29 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../tmp/couteau-suisse/f279cb3d0b3b18e9038efa262958198b.html
// Temps de compilation total: 0.488 ms
//

function html_2b2f175c9c07134828ff04d32989a76c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
var blocs_title_sep = /' .
interdire_scripts(preg_quote(eval('return '.'_BLOC_TITLE_SEP'.';'))) .
'/g;
' .
vide($Pile['vars']['x'] = _T('couteau:bloc_replier')) .
'var blocs_title_def = \'' .
cs_javascript(concat(_T('couteau:bloc_deplier'),interdire_scripts(eval('return '.'_BLOC_TITLE_SEP'.';')),(is_array($a = ($Pile["vars"])) ? $a['x'] : ""))) .
'\';
');

	return analyse_resultat_skel('html_2b2f175c9c07134828ff04d32989a76c', $Cache, $page, '../tmp/couteau-suisse/f279cb3d0b3b18e9038efa262958198b.html');
}
?>