<?php

/*
 * Squelette : prive/formulaires/inc-logo_auteur.html
 * Date :      Sun, 03 Apr 2011 15:42:40 GMT
 * Compile :   Mon, 24 Oct 2011 17:02:03 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette prive/formulaires/inc-logo_auteur.html
// Temps de compilation total: 7.514 ms
//

function html_15ed755e991496478da2bf98b992bb82($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-type:text/html;charset=' .
	interdire_scripts(entites_html((@$Pile[0]['charset']),true))) . '"); ?'.'>' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_auteur', 'ON', @$Pile[0]['id_auteur'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'100','80')) .
'
');

	return analyse_resultat_skel('html_15ed755e991496478da2bf98b992bb82', $Cache, $page, 'prive/formulaires/inc-logo_auteur.html');
}
?>