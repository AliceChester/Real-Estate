<?php

/*
 * Squelette : ../plugins/auto/forms_et_tables_2_0/fonds/cfg_forms_et_tables.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/forms_et_tables_2_0/fonds/cfg_forms_et_tables.html
// Temps de compilation total: 2.673 ms
//

function html_375975df731d9a2a7de5950d466a51d6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- titre=Forms&amp;tables-->
<!-- icone=img_pack/form-24.gif-->
<!-- descriptif=Configurez quelques parametres-->
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><form method="post" action="' .
self() .
'"><div>' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['_cfg_']),true))) .
'</div>


<fieldset>
<legend>
	' .
_T('forms:cfg_associer_donnees') .
'
</legend>
<p>' .
_T('forms:cfg_associer_donnees_articles') .
'<br />
<input type="radio" name="associer_donnees_articles" value="1" ' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['associer_donnees_articles']),true) ? 'checked':''))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="associer_donnees_articles_1" />
<label for=\'associer_donnees_articles_1\'>' .
_T('forms:cfg_activer') .
'</label><br/>
<input type="radio" name="associer_donnees_articles" value="0" ' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['associer_donnees_articles']),true) ? '':'checked'))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="associer_donnees_articles_0" />
<label for=\'associer_donnees_articles_0\'>' .
_T('forms:cfg_desactiver') .
'</label>
</p>
<p>' .
_T('forms:cfg_associer_donnees_rubriques') .
'<br />
<input type="radio" name="associer_donnees_rubriques" value="1" ' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['associer_donnees_rubriques']),true) ? 'checked':''))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="associer_donnees_rubriques_1" />
<label for=\'associer_donnees_rubriques_1\'>' .
_T('forms:cfg_activer') .
'</label><br/>
<input type="radio" name="associer_donnees_rubriques" value="0" ' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['associer_donnees_rubriques']),true) ? '':'checked'))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="associer_donnees_rubriques_0" />
<label for=\'associer_donnees_rubriques_0\'>' .
_T('forms:cfg_desactiver') .
'</label>
</p>
<p>' .
_T('forms:cfg_associer_donnees_auteurs') .
'<br />
<input type="radio" name="associer_donnees_auteurs" value="1" ' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['associer_donnees_auteurs']),true) ? 'checked':''))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="associer_donnees_auteurs_1" />
<label for=\'associer_donnees_auteurs_1\'>' .
_T('forms:cfg_activer') .
'</label><br/>
<input type="radio" name="associer_donnees_auteurs" value="0" ' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['associer_donnees_auteurs']),true) ? '':'checked'))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="associer_donnees_auteurs_0" />
<label for=\'associer_donnees_auteurs_0\'>' .
_T('forms:cfg_desactiver') .
'</label>
<br/>
</p>

</fieldset>


<fieldset>
<legend>
	' .
_T('forms:cfg_bouton_valider') .
'
</legend>
<p>' .
_T('forms:cfg_bouton_valider_texte') .
'</p>
<div>
<input type="radio" name="bouton_image" value="1" ' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['bouton_image'],'0'),true) ? 'checked':''))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="bouton_image_1" />
<label for=\'bouton_image_1\'>' .
_T('forms:cfg_bouton_type_image') .
'</label><br/>
<input type="radio" name="bouton_image" value="0" ' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['bouton_image'],'0'),true) ? '':'checked'))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="bouton_image_0" />
<label for=\'bouton_image_0\'>' .
_T('forms:cfg_bouton_type_texte') .
'</label>
</div>
</fieldset>


<fieldset>
<legend>
	' .
_T('forms:cfg_inserer_head') .
'
</legend>
<p>' .
_T('forms:cfg_inserer_head_texte') .
'</p>
<div>
<ul>
<li>' .
interdire_scripts(find_in_path('spip_forms.css')) .
'</li>
<li>' .
interdire_scripts(find_in_path('donnee_voir.css')) .
'</li>
<li>' .
interdire_scripts(find_in_path('donnees_tous.css')) .
'</li>
<li>' .
interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
'img_pack/date_picker.css</li>
<li>' .
interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
'img_pack/jtip.css</li>
</ul>
<input type="radio" name="inserer_head" value="1" ' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['inserer_head'],'1'),true) ? 'checked':''))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="inserer_head_1" />
<label for=\'inserer_head_1\'>' .
_T('forms:cfg_activer') .
'</label><br/>
<input type="radio" name="inserer_head" value="0" ' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['inserer_head'],'1'),true) ? '':'checked'))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="inserer_head_0" />
<label for=\'inserer_head_0\'>' .
_T('forms:cfg_desactiver') .
'</label>
</div>
</fieldset>

<div>
<input style="float:' .
lang_dir(@$Pile[0]['lang'], 'right','left') .
';" type="submit" name="_cfg_ok" value="' .
_T('public/spip/ecrire:ok') .
'" class="fondo" />
</div>
</form>');

	return analyse_resultat_skel('html_375975df731d9a2a7de5950d466a51d6', $Cache, $page, '../plugins/auto/forms_et_tables_2_0/fonds/cfg_forms_et_tables.html');
}
?>