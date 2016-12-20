<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/bberry/inc/inc-head.html
 * Date :      Mon, 26 Sep 2011 21:51:38 GMT
 * Compile :   Sat, 08 Oct 2016 15:42:09 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/bberry/inc/inc-head.html
// Temps de compilation total: 1.037 ms
//

function html_8fb71655a7d1c920ebfed8f2ff9002b5($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'



<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />





<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />

	
	




' .
(($t1 = strval(interdire_scripts(generer_url_public('backend'))))!=='' ?
		((	'<link rel="alternate" type="application/rss+xml" title="' .
	_T('public/spip/ecrire:syndiquer_site') .
	'" href="') . $t1 . '" />') :
		'') .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('squel_mobiles/bberry/style.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('squel_mobiles/bberry/formulaires.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'





' .
insert_head_css() .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('squel_mobiles/bberry/habillage.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('impression.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="print" />') :
		'') .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('perso.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'






' .
insert_head_css().pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>




');

	return analyse_resultat_skel('html_8fb71655a7d1c920ebfed8f2ff9002b5', $Cache, $page, 'plugins/cimobile/squel_mobiles/bberry/inc/inc-head.html');
}
?>