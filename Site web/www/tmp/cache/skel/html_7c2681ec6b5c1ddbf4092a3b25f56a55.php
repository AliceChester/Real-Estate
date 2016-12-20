<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/iphone/inc/inc-entete.html
 * Date :      Mon, 26 Sep 2011 21:51:42 GMT
 * Compile :   Thu, 10 Jul 2014 14:15:52 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/iphone/inc/inc-entete.html
// Temps de compilation total: 1.002 ms
//

function html_7c2681ec6b5c1ddbf4092a3b25f56a55($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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

	return analyse_resultat_skel('html_7c2681ec6b5c1ddbf4092a3b25f56a55', $Cache, $page, 'plugins/cimobile/squel_mobiles/iphone/inc/inc-entete.html');
}
?>