<?php

/*
 * Squelette : ../tmp/couteau-suisse/6b9c24135074d79e08dfeb8be2087606.html
 * Date :      Wed, 29 Feb 2012 15:34:30 GMT
 * Compile :   Wed, 29 Feb 2012 15:34:29 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../tmp/couteau-suisse/6b9c24135074d79e08dfeb8be2087606.html
// Temps de compilation total: 1.437 ms
//

function html_150605752914ae2ff092c3a0eae88fde($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'.blocs_titre {
	background:transparent url(' .
interdire_scripts(url_absolue(eval('return '.'_DIR_IMG_PACK'.';'))) .
'triangle-bas.gif) no-repeat scroll left center;
	font-weight:normal;
	line-height:1.2em;
	margin-top:4px;
	padding:0pt 0pt 0pt 20px;
	margin-bottom:0.1em;
	clear:left;
	cursor:pointer;
}

.blocs_replie {
	background:transparent url(' .
interdire_scripts(url_absolue(eval('return '.'_DIR_IMG_PACK'.';'))) .
'triangle.gif) no-repeat scroll left center;
}

.blocs_title{
	display:none;
}');

	return analyse_resultat_skel('html_150605752914ae2ff092c3a0eae88fde', $Cache, $page, '../tmp/couteau-suisse/6b9c24135074d79e08dfeb8be2087606.html');
}
?>