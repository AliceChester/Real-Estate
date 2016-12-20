<?php

/*
 * Squelette : ../plugins/auto/crayons/fonds/cfg_crayons.html
 * Date :      Thu, 26 May 2011 07:00:04 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/crayons/fonds/cfg_crayons.html
// Temps de compilation total: 2.023 ms
//

function html_a4f34aa7b716ccf6dbb606811194fc68($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- descriptif=
	<a href="http://www.spip-contrib.net/Les-Crayons" class="spip_out">Cf. documentation</a>
 -->
<!-- titre=' .
_T('crayons:titre_crayons') .
' -->
<!-- icone=images/crayon-24.png -->
<!-- logo=images/crayon-128.png -->

' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><div class="ajax">
' .
executer_balise_dynamique('FORMULAIRE_CONFIGURER_CRAYONS',
	array(),
	array('../plugins/auto/crayons/fonds/cfg_crayons.html','html_a4f34aa7b716ccf6dbb606811194fc68','',9,$GLOBALS['spip_lang'])) .
'
</div>
');

	return analyse_resultat_skel('html_a4f34aa7b716ccf6dbb606811194fc68', $Cache, $page, '../plugins/auto/crayons/fonds/cfg_crayons.html');
}
?>