<?php

/*
 * Squelette : ../plugins/ckeditor-spip-plugin/formulaires/cke.html
 * Date :      Wed, 28 Sep 2011 21:24:17 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/ckeditor-spip-plugin/formulaires/cke.html
// Temps de compilation total: 1.970 ms
//

function html_9f5efd8a1d794854f394979b7b5f3bf7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
	'</div>' .
'<div class=\'avertissement\'>' .
_T('ckeditor:avertissement_css') .
'</div>
<fieldset>
	<legend>' .
_T('ckeditor:configuration_styles') .
'</legend>
	<div class=\'cke-div\'>
		<label for="formats"><strong>' .
_T('ckeditor:formats') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_formats') .
'</span></span>
		<br/>
		<input type="text" name="formats"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['formats']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' style="width:100%;"/>
		<label for="formatsclass"><strong>' .
_T('ckeditor:class_des_formats') .
'</strong></label>
		<input type="text" name="formatsclass"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['formatsclass']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' style="width:100%;"/>
	</div>
	<div class=\'cke-div\'>
		<label for="styles"><strong>' .
_T('ckeditor:styles') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_styles') .
'</span></span>
		<br/>
		<blockquote><textarea name="styles" rows="10" cols="50">' .
interdire_scripts(entites_html((@$Pile[0]['styles']),true)) .
'</textarea></blockquote>
	 </div>
</fieldset>
<fieldset>
	<legend>' .
_T('ckeditor:configuration_des_couleurs') .
'</legend>
	<div class=\'cke-div\'>
		<label for="liste_couleurs"><strong>' .
_T('ckeditor:listes_des_couleurs_presentees') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_couleurs') .
'</span></span>
		<br/>
		<blockquote><textarea name="liste_couleurs" rows="4" cols="50">' .
interdire_scripts(entites_html((@$Pile[0]['liste_couleurs']),true)) .
'</textarea></blockquote>
		<input name="autres_couleurs" type="checkbox"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['autres_couleurs']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked') :
		'') .
'/>
		<label for="autres_couleurs"><strong>' .
_T('ckeditor:autoriser_autres_couleurs') .
'</strong></label>
	</div>
</fieldset>
<fieldset>
	<legend>' .
_T('ckeditor:configuration_des_polices') .
'</legend>
	 <div class=\'cke-div\'>
		 <label for="fontsizes"><strong>' .
_T('ckeditor:tailles_de_police') .
'</strong></label>
		 <span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_fontsizes') .
'</span></span>
		 <br/>
		 <blockquote><textarea name="fontsizes" rows="4" cols="50">' .
interdire_scripts(entites_html((@$Pile[0]['fontsizes']),true)) .
'</textarea></blockquote>
	</div>
	<div class=\'cke-div\'>
		<label for="webfonts"><strong>' .
_T('ckeditor:liste_google_webfonts') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_webfonts') .
'</span></span>
		<br/>
		<input type="text" name="webfonts"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['webfonts']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' style="width:100%;"/>
		<input type="checkbox" name="fontkit"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['fontkit']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
' />
		<label for="fontkit"><strong>' .
_T('ckeditor:utilise_fontkit') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_fontkit') .
'</span></span>
		<br/>
		<input type="checkbox" name="insertcsspublic"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['insertcsspublic']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
' />
		<label for="insertcsspublic"><strong>' .
_T('ckeditor:inserer_la_css_public') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_inserer_la_css') .
'</span></span>
		<br/>
		<input type="checkbox" name="insertcssprive"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['insertcssprive']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
' />
		<label for="insertcssprive"><strong>' .
_T('ckeditor:inserer_la_css_prive') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_inserer_la_css') .
'</span></span>
	</div>
</fieldset>
	<div class=\'cke-div\'>
		<input type="submit" name="_cfg_ok" value="' .
_T('ckeditor:ok') .
'" />
		<input type="submit" name="_cfg_delete" value="' .
_T('ckeditor:supprimer') .
'" />
	</div>


</div></form>
');

	return analyse_resultat_skel('html_9f5efd8a1d794854f394979b7b5f3bf7', $Cache, $page, '../plugins/ckeditor-spip-plugin/formulaires/cke.html');
}
?>