<?php

/*
 * Squelette : ../plugins/ckeditor-spip-plugin/formulaires/cka.html
 * Date :      Wed, 28 Sep 2011 21:24:15 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/ckeditor-spip-plugin/formulaires/cka.html
// Temps de compilation total: 5.159 ms
//

function html_f442240d35e2fb6b07fd89b2d8d811e7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
_T('ckeditor:config_base') .
'</legend>
	<div class=\'cke-div\'>
		<label for="editmode">' .
_T('ckeditor:mode_edition_defaut') .
'</label>
		<select name="editmode">
			<option value="spip"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['editmode']),true) == 'spip') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:spip_defaut') .
'</option>
			<option value="ckeditor"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['editmode']),true) == 'ckeditor') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:ckeditor_defaut') .
'</option>
			<option value="ckeditor-exclu"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['editmode']),true) == 'ckeditor-exclu') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:ckeditor_exclu') .
'</option>
		</select>
	</div>
	<div class=\'cke-div\'>
		<label for="skin">' .
_T('ckeditor:choisir_skin') .
'</label>
		<select name="skin">
			<option value="kama"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['skin']),true) == 'kama') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Kama</option>
			<option value="office2003"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['skin']),true) == 'office2003') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Office 2003</option>
			<option value="v2"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['skin']),true) == 'v2') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>FCK editor v2</option>
		</select>
	</div>
	<div class=\'cke-div\'>
		<label for="taille">' .
_T('ckeditor:hauteur_editeur') .
'</label>
		<input type="text" name="taille"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['taille']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size=\'5\'/>&nbsp;' .
_T('ckeditor:pixels') .
'
	</div>
	<div class=\'cke-div\'>
		<label for="apercu">' .
_T('ckeditor:utiliser_une_vignette_pour_les_images') .
'</label>
		<input type="text" name="vignette"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['vignette']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size=\'5\'/>&nbsp;' .
_T('ckeditor:pixels') .
'
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_vignette') .
'</span></span>
	</div>
	<div class=\'cke-div\'>
		<input type="checkbox" name="startspellcheck"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['startspellcheck']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:demarrer_correction_ortho') .
'</input>
		<select name="spellchecklang">
			<option value="en_US"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'en_US') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>English</option>
			<option value="en_GB"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'en_GB') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>British English</option>
			<option value="en_CA"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'en_CA') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>English Canadian</option>
			<option value="da_DK"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'da_DK') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Dansk</option>
			<option value="nl_NL"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'nl_NL') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Nederlandse</option>
			<option value="fi_FI"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'fi_FI') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Suomen</option>
			<option value="fr_FR"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'fr_FR') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Français</option>
			<option value="fr_CA"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'fr_CA') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Français Canadien</option>
			<option value="de_DE"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'de_DE') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Deutsch</option>
			<option value="el_GR"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'el_GR') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Ελληνικά</option>
			<option value="it_IT"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'it_IT') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Italiano</option>
			<option value="nb_NO"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'nb_NO') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Norsk</option>
			<option value="pt_PT"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'pt_PT') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Português</option>
			<option value="pt_BR"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'pt_BR') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Português do Brasil</option>
			<option value="es_ES"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'es_ES') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Español</option>
			<option value="sv_SE"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['spellchecklang']),true) == 'sv_SE') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>Svenska</option>
		</select>
	</div>
	<div class="cke-div">
		<input type="checkbox" name="ignoreversion"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['ignoreversion']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:ignore_mauvaise_version') .
'</input><br/>
		<input type="checkbox" name="devtools"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['devtools']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:affiche_les_informations_de_developpement') .
'</input>
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

	return analyse_resultat_skel('html_f442240d35e2fb6b07fd89b2d8d811e7', $Cache, $page, '../plugins/ckeditor-spip-plugin/formulaires/cka.html');
}
?>