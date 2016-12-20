<?php

/*
 * Squelette : plugins/auto/crayons/crayons.js.html
 * Date :      Fri, 20 May 2011 12:00:06 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:33 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/crayons/crayons.js.html
// Temps de compilation total: 14.290 ms
//

function html_96eb3f11941b0e9d409f3a16f3690786($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<'.'?php header("' . 'Content-Type: text/javascript' . '"); ?'.'>' .
((@$Pile[0]['debug_crayons']) ? '<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>':'<?php header("X-Spip-Cache: 604800"); ?>'.'<?php header("Cache-Control: max-age=604800"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>') .
'

/* cQuery est jQuery, renommee pour eviter tout conflit */

' .
interdire_scripts(pack_cQuery(find_in_path('js/jquery.js'))) .
'

cQuery.noConflict();

' .
interdire_scripts(pack_cQuery(find_in_path('js/jquery.form.js'))) .
'

' .
interdire_scripts(pack_cQuery(find_in_path('js/jquery.px.js'))) .
'

' .
interdire_scripts(pack_cQuery(find_in_path('js/crayons.js'))) .
'

' .
interdire_scripts(pack_cQuery(find_in_path('js/resizehandle.js'))) .
'

' .
interdire_scripts(pack_cQuery(find_in_path('js/jquery.html5uploader.min.js'))) .
'

' .
(($t1 = strval(interdire_scripts((match(lire_config('crayons',null,false),'s:11:"yellow_fade";s:2:"on";') ? ' ':''))))!=='' ?
		($t1 . (	'
	' .
	interdire_scripts(pack_cQuery(find_in_path('js/crayons-fade.js'))) .
	'
')) :
		'') .
'


' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['callback']),true))))!=='' ?
		($t1 . '();') :
		''));

	return analyse_resultat_skel('html_96eb3f11941b0e9d409f3a16f3690786', $Cache, $page, 'plugins/auto/crayons/crayons.js.html');
}
?>