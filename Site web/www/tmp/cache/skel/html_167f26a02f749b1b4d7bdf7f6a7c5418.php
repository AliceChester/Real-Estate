<?php

/*
 * Squelette : ../plugins/ckeditor-spip-plugin/formulaires/ckb.html
 * Date :      Wed, 28 Sep 2011 21:24:16 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/ckeditor-spip-plugin/formulaires/ckb.html
// Temps de compilation total: 0.629 ms
//

function html_167f26a02f749b1b4d7bdf7f6a7c5418($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- titre=Configuration de CKEDITOR  -->
<!-- nom=ckeditor -->
<!-- depot=metapack -->
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
		('<p class="formulaire_message">' . $t1 . '</p>') :
		'') .
'
<form method="post" action="' .
interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
'"><div>
		' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><fieldset>
	<legend>' .
_T('ckeditor:config_barres_outils') .
'</legend>
	<div class=\'cke-div\'>
	<center>
	<a href="#" onclick="javascript:return selectAllTools(true);">' .
_T('ckeditor:selection_tout') .
'</a> |
	<a href="#" onclick="javascript:return selectAllTools(false);">' .
_T('ckeditor:selection_aucun') .
'</a> |
	<a href="#" onclick="javascript:return selectAllTools(\'inverse\');">' .
_T('ckeditor:selection_inverse') .
'</a>
	</center>
	<?php
	include_spip(\'inc/ckeditor_lire_config\') ;
	include_spip(\'inc/ckeditor_tools\') ;
	include_spip("inc/toolbars") ;
	$html2spip = ckeditor_lire_config(\'html2spip_limite\', _CKE_HTML2SPIP_LIMITE_DEF) ;
	foreach($GLOBALS[\'toolbars\'] as $toolbar) {
		echo "<div style=\\"float:left;border:1px solid #bbb; padding:3px; margin:3px;\\">" ;
		$cp=0;
		foreach($toolbar as $tool => $item) {
			if ($html2spip && !$item[2]) { 
				$disabled = \' disabled="disabled"\' ; 
				$style = \' style="color:gray;" title="\'._T(\'ckeditor:desactive_car_zappe_par_html2spip\').\'"\' ; 
			} else { 
				$disabled = \'\' ; 
				$style = \' style="color:black;"\' ;
			}
			if (!ckeditor_tweaks_actifs(\'smileys\') && ($tool == \'Smiley\')) continue ;
			echo "<input type=\\"checkbox\\" name=\\"tool_$tool\\"" ;
			if (ckeditor_lire_config("tool_$tool", $item[1])) {
				echo " checked" ;
			}
			echo " class=\\"toolbar_tool\\"$disabled><a onclick=\\"javascript:clickontool();\\" title=\\""._T(\'ckeditor:tool_\'.$tool)."\\"$style>" ;
			if (isset($item[3]) && ($icon = find_in_path(sprintf("images/icons/icon-%02d.png",$item[3])))) {
				echo "<img src=\'$icon\' alt=\'"._T(\'ckeditor:tool_\'.$tool)."\'/>" ;
			} else {
				echo _T(\'ckeditor:tool_\'.$tool) ;
			}
			echo "</a></input>\\n" ;
		}
		echo "</div>\\n" ;
	}
?>
	</div>
<script type=\'text/javascript\'>
function selectAllTools(select) {
	$(\'.toolbar_tool\').each( function() {
		$(this).attr(\'checked\', (select == \'inverse\' ? ! $(this).attr(\'checked\') : select) ) ; 
	} );
	return false;
}
function clickontool() {
	alert(this);
}
</script>
</fieldset>
	<div class=\'cke-div\'>
		<input type="submit" name="_cfg_ok" value="' .
_T('ckeditor:ok') .
'" />
		<input type="submit" name="_cfg_delete" value="' .
_T('ckeditor:supprimer') .
'" />
		<input type="submit" name="_cfg_reset_toolbars" value="' .
_T('ckeditor:reset_toolbars') .
'" />
	</div>


</div></form>
');

	return analyse_resultat_skel('html_167f26a02f749b1b4d7bdf7f6a7c5418', $Cache, $page, '../plugins/ckeditor-spip-plugin/formulaires/ckb.html');
}
?>