<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/ckspip_convert.html
 * Date :      Wed, 28 Sep 2011 21:24:09 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:50 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/ckspip_convert.html
// Temps de compilation total: 1.434 ms
//

function html_7b9529627b5465246d1f9fbb7d7f164a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-type: text/plain' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<?php
	include_spip(\'inc/autoriser\');
	if (autoriser(\'ecrire\')) {
		include_spip("inc/ckeditor_tools") ;

		if ($_POST[\'text_area\'] && $_POST[\'cvt\']) {

			if ($GLOBALS[\'meta\'][\'charset\'] && ($GLOBALS[\'meta\'][\'charset\'] != \'utf-8\')) {
				$_POST[\'text_area\'] = iconv(\'utf-8\', $GLOBALS[\'meta\'][\'charset\'].\'//TRANSLIT//IGNORE\', $_POST[\'text_area\']) ;
			}

			switch ($_POST[\'cvt\']) {
				case \'spip2html\':
					$result = ckeditor_spip2html($_POST[\'text_area\']) ;
					if (!$_POST[\'fix\'] && preg_match("~\\s*<p>.*?</p>\\s*~s", $result, $m) && ($m[0] == $result)) {
						echo preg_replace("~^\\s*<p>(.*?)</p>\\s*$~s", "$1", $result) ;
					} else {
						echo $result ;
					}
					break ;
				case \'html2spip\':
					echo ckeditor_html2spip($_POST[\'text_area\']) ;
					break ;
				case \'none\':
					echo $_POST[\'text_area\'] ;
					break ;
				default:
					echo _T(\'ckeditor:err_conversion\')."\\n".$_POST[\'text_area\'] ;
			}
		}
	}
?>
');

	return analyse_resultat_skel('html_7b9529627b5465246d1f9fbb7d7f164a', $Cache, $page, 'plugins/ckeditor-spip-plugin/ckspip_convert.html');
}
?>