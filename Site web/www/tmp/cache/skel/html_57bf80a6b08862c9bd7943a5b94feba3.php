<?php

/*
 * Squelette : ../plugins/ckeditor-spip-plugin/formulaires/ckd.html
 * Date :      Wed, 28 Sep 2011 21:24:16 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/ckeditor-spip-plugin/formulaires/ckd.html
// Temps de compilation total: 1.930 ms
//

function html_57bf80a6b08862c9bd7943a5b94feba3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
_T('ckeditor:choix_et_telechargement') .
'</legend>
	<div class=\'cke-div\'>
		<input type="checkbox" name="utilise_upload"' .
interdire_scripts((entites_html((@$Pile[0]['utilise_upload']),true) ? ' checked':'')) .
' /><label for="utilise_upload">' .
_T('ckeditor:utilise_upload') .
'</label><br/>
		<input type="checkbox" name="autorise_parcours"' .
interdire_scripts((entites_html((@$Pile[0]['autorise_parcours']),true) ? ' checked':'')) .
' /><label for="autorise_parcours">' .
_T('ckeditor:autoriser_parcours_dossier_spip') .
'</label><br/>
		<input type="checkbox" name="autorise_telechargement"' .
interdire_scripts((entites_html((@$Pile[0]['autorise_telechargement']),true) ? ' checked':'')) .
' /><label for="autorise_telechargement">' .
_T('ckeditor:autoriser_telechargement_dossier_spip') .
'</label>
		<blockquote class="cke-align-topbottom">
			<input type="checkbox" name="autorise_telechargement_redacteur"' .
interdire_scripts((entites_html((@$Pile[0]['autorise_telechargement_redacteur']),true) ? ' checked':'')) .
' /><label for="autorise_telechargement_redacteur"><?php echo _T(\'ckeditor:autoriser_redacteurs\', array(\'plus\'=>\'\')); ?></label>
		</blockquote>
		<input type="checkbox" name="autorise_mkdir"' .
interdire_scripts((entites_html((@$Pile[0]['autorise_mkdir']),true) ? ' checked':'')) .
' /><label for="autorise_mkdir"><?php echo _T(\'ckeditor:autoriser_mkdir\', array(\'plus\'=> _T(\'ckeditor:kcfinder_ignore\'))); ?></label>
		<blockquote class="cke-align-topbottom">
			<input type="checkbox" name="autorise_mkdir_redacteur"' .
interdire_scripts((entites_html((@$Pile[0]['autorise_mkdir_redacteur']),true) ? ' checked':'')) .
' /><label for="autorise_mkdir_redacteur"><?php echo _T(\'ckeditor:autoriser_redacteurs\', array(\'plus\'=>_T(\'ckeditor:kcfinder_ignore\'))) ; ?></label>
		</blockquote>
		<label for="base_dir"><strong>' .
_T('ckeditor:repertoire_de_base') .
'</strong></label>
		<input type="text" name="base_dir" value="' .
interdire_scripts(entites_html((@$Pile[0]['base_dir']),true)) .
'" />
		<blockquote style=\'margin-left:15px;\'>
			<label for="images_dir"><strong>' .
_T('ckeditor:repertoire_des_images') .
'</strong></label>
			<blockquote>
				<input type="text" name="images_dir" value="' .
interdire_scripts(entites_html((@$Pile[0]['images_dir']),true)) .
'" />
				<br/>
				<label for="images_extensions_autorisees">' .
_T('ckeditor:images_extensions_autorisees') .
'</label>
				<input type="text" name="images_extensions_autorisees" value="' .
interdire_scripts(entites_html((@$Pile[0]['images_extensions_autorisees']),true)) .
'" />
				<span class=\'cke-aide\'><span>' .
_T('ckeditor:extensions_autorisees_descriptif') .
'</span></span>
			</blockquote>
			<label for="flash_dir"><strong>' .
_T('ckeditor:repertoire_des_flash') .
'</strong></label>
			<blockquote>
				<input type="text" name="flash_dir" value="' .
interdire_scripts(entites_html((@$Pile[0]['flash_dir']),true)) .
'" />
				<br/>
				<label for="flash_extensions_autorisees">' .
_T('ckeditor:flash_extensions_autorisees') .
'</label>
				<input type="text" name="flash_extensions_autorisees" value="' .
interdire_scripts(entites_html((@$Pile[0]['flash_extensions_autorisees']),true)) .
'" />
				<span class=\'cke-aide\'><span>' .
_T('ckeditor:extensions_autorisees_descriptif') .
'</span></span>
			</blockquote>
			<label for="files_dir"><strong>' .
_T('ckeditor:repertoire_des_fichiers') .
'</strong></label>
			<blockquote>
				<input type="text" name="files_dir" value="' .
interdire_scripts(entites_html((@$Pile[0]['files_dir']),true)) .
'" />
				<br/>
				<label for="files_extensions_autorisees">' .
_T('ckeditor:files_extensions_autorisees') .
'</label>
				<input type="text" name="files_extensions_autorisees" value="' .
interdire_scripts(entites_html((@$Pile[0]['files_extensions_autorisees']),true)) .
'" />

				<span class=\'cke-aide\'><span>' .
_T('ckeditor:extensions_autorisees_descriptif') .
'</span></span>
			</blockquote>
		</blockquote>
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

	return analyse_resultat_skel('html_57bf80a6b08862c9bd7943a5b94feba3', $Cache, $page, '../plugins/ckeditor-spip-plugin/formulaires/ckd.html');
}
?>