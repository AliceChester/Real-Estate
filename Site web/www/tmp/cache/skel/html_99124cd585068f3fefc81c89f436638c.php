<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/iphone/inc/inc-head.html
 * Date :      Mon, 26 Sep 2011 21:51:43 GMT
 * Compile :   Thu, 10 Jul 2014 14:15:52 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/iphone/inc/inc-head.html
// Temps de compilation total: 2.041 ms
//

function html_99124cd585068f3fefc81c89f436638c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
(($t1 = strval(interdire_scripts(find_in_path('apple-touch-icon.png'))))!=='' ?
		('<link rel="apple-touch-icon" href="' . $t1 . '"/>') :
		'') .
'
	
	




' .
(($t1 = strval(interdire_scripts(generer_url_public('backend'))))!=='' ?
		((	'<link rel="alternate" type="application/rss+xml" title="' .
	_T('public/spip/ecrire:syndiquer_site') .
	'" href="') . $t1 . '" />') :
		'') .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('squel_mobiles/iphone/style.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('squel_mobiles/iphone/formulaires.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'





' .
insert_head_css() .
'





' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('squel_mobiles/iphone/habillage.css')))))!=='' ?
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
(($t1 = strval(interdire_scripts(find_in_path('apple-touch-icon.png'))))!=='' ?
		('<link rel="apple-touch-icon" href="' . $t1 . '"/>') :
		'') .
'
	




' .
insert_head_css().pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>




');

	return analyse_resultat_skel('html_99124cd585068f3fefc81c89f436638c', $Cache, $page, 'plugins/cimobile/squel_mobiles/iphone/inc/inc-head.html');
}
?>