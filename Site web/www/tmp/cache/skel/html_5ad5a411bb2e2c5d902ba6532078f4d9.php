<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/bberry/inc/inc-entete.html
 * Date :      Mon, 26 Sep 2011 21:51:37 GMT
 * Compile :   Sat, 08 Oct 2016 15:42:09 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/bberry/inc/inc-entete.html
// Temps de compilation total: 0.921 ms
//

function html_5ad5a411bb2e2c5d902ba6532078f4d9($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div id="entete">

<a rel="start home" href="' .
interdire_scripts(generer_url_public('sommaire')) .
'" title="' .
_T('public/spip/ecrire:accueil_site') .
'" class="accueil">
<p align="center">' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_syndic', 'ON', "'0'",'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'200','0'))))!=='' ?
		($t1 . ' ') :
		'') .
'</p></a>

</div>

');

	return analyse_resultat_skel('html_5ad5a411bb2e2c5d902ba6532078f4d9', $Cache, $page, 'plugins/cimobile/squel_mobiles/bberry/inc/inc-entete.html');
}
?>