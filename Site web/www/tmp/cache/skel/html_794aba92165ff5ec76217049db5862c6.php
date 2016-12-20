<?php

/*
 * Squelette : plugins/auto/forms_et_tables_2_0/forms_styles.css.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:33 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/forms_et_tables_2_0/forms_styles.css.html
// Temps de compilation total: 142.414 ms
//

function html_794aba92165ff5ec76217049db5862c6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 604800"); ?>'.'<?php header("Cache-Control: max-age=604800"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css' . '"); ?'.'>' .
forms_ajoute_styles((($c = find_in_path('spip_forms.css')) ? spip_file_get_contents($c) : "")) .
'
' .
(($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('donnee_voir.css'))))) ? spip_file_get_contents($c) : "") .
'
' .
(($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('donnees_tous.css'))))) ? spip_file_get_contents($c) : "") .
'
' .
(($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('img_pack/date_picker.css'))))) ? spip_file_get_contents($c) : "") .
'
' .
(($c = find_in_path(interdire_scripts(url_absolue_css(find_in_path('img_pack/jtip.css'))))) ? spip_file_get_contents($c) : ""));

	return analyse_resultat_skel('html_794aba92165ff5ec76217049db5862c6', $Cache, $page, 'plugins/auto/forms_et_tables_2_0/forms_styles.css.html');
}
?>