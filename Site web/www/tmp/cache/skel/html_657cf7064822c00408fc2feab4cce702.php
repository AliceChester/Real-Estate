<?php

/*
 * Squelette : ../plugins/auto/crayons/formulaires/configurer_crayons.html
 * Date :      Mon, 26 Sep 2011 10:00:12 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/crayons/formulaires/configurer_crayons.html
// Temps de compilation total: 5.876 ms
//

function html_657cf7064822c00408fc2feab4cce702($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- autoriser=configurer -->
<!-- refus=' .
_T('cfg:refus_configuration_administrateur') .
' -->
<!-- nom=crayons -->

<div class="formulaire_spip formulaire_cfg formulaire_' .
interdire_scripts(@$Pile[0]['form']) .
'">

<h3 class=\'titrem\'>' .
interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',find_in_path('images/crayon-24.png'),'24')),'class','cadre-icone'),'alt','')) .
_T('crayons:titre_config_crayons') .
'</h3>

' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'

<form method="post" action="' .
interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
'">
<div>
' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><ul>


' .
vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),'barretypo')) .
'<li class="editer_barretypo' .
(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
	<label for="barretypo">' .
_T('crayons:label_barre_typo') .
'</label>
	' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
		('<span class=\'erreur_message\'>' . $t1 . '</span>') :
		'') .
'
	<div class="choix">
		<input type="checkbox" name="barretypo" class="checkbox"  value=\'on\' id=\'barretypo\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['barretypo']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
		<label for=\'barretypo\'>' .
_T('crayons:label_activer_barre_typo') .
'</label>
		' .
(($t1 = strval(interdire_scripts(((version_compare(filtre_info_plugin_dist("porte_plume", "version"),'1.5','>=')) ?' ' :''))))!=='' ?
		($t1 . (($t2 = strval(interdire_scripts((((((eval('return '.'PORTE_PLUME_PUBLIC'.';')) ?'' :' ')) OR (interdire_scripts((((lire_config('barre_outils_public',null,false) == 'non')) ?' ' :'')))) ?' ' :''))))!=='' ?
			('<p class="attention">' . $t2 . (	_T('crayons:activation_barre_impossible') .
		'</p>')) :
			'')) :
		'') .
'
	</div>
</li>


' .
vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),'msgNoChange')) .
'<li class="editer_messages' .
(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
	<label>' .
_T('crayons:label_message') .
'</label>
	' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
		('<span class=\'erreur_message\'>' . $t1 . '</span>') :
		'') .
'
	<div class="choix">
		<input type="checkbox" name="msgNoChange" class="checkbox" value=\'on\' id=\'msgNoChange\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['msgNoChange']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
		<label for=\'msgNoChange\'>' .
_T('crayons:label_msg_no_change') .
'</label>
	</div>
	<div class="choix">
		<input type="checkbox" name="msgAbandon" class="checkbox" value=\'on\' id=\'msgAbandon\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['msgAbandon']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
		<label for=\'msgAbandon\'>' .
_T('crayons:label_msg_abandon') .
'</label>
	</div>
</li>


' .
vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),'filet')) .
'<li class="editer_effets' .
(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
	<label>' .
_T('crayons:label_effets') .
'</label>
	' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
		('<span class=\'erreur_message\'>' . $t1 . '</span>') :
		'') .
'
	<div class="choix">
		<input type="checkbox" name="filet" class="checkbox" value=\'on\' id=\'filet\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['filet']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
		<label for=\'filet\'>' .
_T('crayons:label_filet') .
'</label>
	</div>
	<div class="choix">
		<input type="checkbox" name="yellow_fade" class="checkbox" value=\'on\' id=\'yellow_fade\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['yellow_fade']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
		<label for=\'yellow_fade\'>' .
_T('crayons:label_yellow_fade') .
'</label>
	</div>
	<div class="choix">
		<input type="checkbox" name="clickhide" class="checkbox" value=\'on\' id=\'clickhide\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['clickhide']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
		<label for=\'clickhide\'>' .
_T('crayons:label_clickhide') .
'</label>
	</div>
</li>


' .
vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),'reduire_logo')) .
'<li class="editer_reduire_logo' .
(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
	<label>' .
_T('crayons:label_reduire_logo') .
'</label>
	' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
		('<span class=\'erreur_message\'>' . $t1 . '</span>') :
		'') .
'
	<p class=\'explication\'>' .
_T('crayons:explication_reduire_logo') .
'</p>
	<input type="text" name="reduire_logo" class="text" size="3" id=\'reduire_logo\' value="' .
interdire_scripts(intval(entites_html((@$Pile[0]['reduire_logo']),true))) .
'" />
</li>

<li class="fieldset fieldset_crayons_prive">
	<h3 class="legend">' .
_T('crayons:legend_editer_prive') .
'</h3>
	<ul>
		' .
vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),'espaceprive')) .
'<li class="editer_reduire_logo' .
(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
			<label>' .
_T('crayons:label_espaceprive') .
'</label>
			' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
		('<span class=\'erreur_message\'>' . $t1 . '</span>') :
		'') .
'
			<div class="choix">
				<input type="checkbox" name="espaceprive" class="checkbox"  value=\'on\' id=\'espaceprive\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['espaceprive']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
				<label for=\'espaceprive\'>' .
_T('crayons:label_activer_crayons_prive') .
'</label>
			</div>
		</li>
		' .
vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),'exec_autorise')) .
'<li class="editer_exec_autorise' .
(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
			<label>' .
_T('crayons:label_exec_autorise') .
'</label>
			' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
		('<span class=\'erreur_message\'>' . $t1 . '</span>') :
		'') .
'
			<p class=\'explication\'>' .
_T('crayons:explication_exec_autorise') .
'</p>
			<input type="text" name="exec_autorise" class="text"  id=\'exec_autorise\' value="' .
interdire_scripts(attribut_html(entites_html((@$Pile[0]['exec_autorise']),true))) .
'" />
		</li>
	</ul>
</li>


<li class="fieldset fieldset_crayons_upload experimental">
	<h3 class="legend">UPLOAD de documents</h3>
	<ul>
		<li class="editer_reduire_logo' .
(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
		(' ' . ' ' . 'erreur') :
		'') .
'">
			<label>exp&#233;rimental</label>
			' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
		('<span class=\'erreur_message\'>' . $t1 . '</span>') :
		'') .
'
			<div class="choix">
				<input type="checkbox" name="upload" class="checkbox"  value=\'on\' id=\'upload\'' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['upload']),true)) ?' ' :''))))!=='' ?
		(' ' . $t1 . 'checked="checked"') :
		'') .
' />
				<label for=\'upload\'>Autoriser l\'ajout de documents par glisser/d&#233;poser sur le crayon article.texte</label>
			</div>
		</li>
	</ul>
</li>


</ul>
<p class="boutons">
	<input type="submit" name="_cfg_ok" value="' .
_T('public/spip/ecrire:bouton_enregistrer') .
'" class="submit" />
</p>
</div>
</form>
</div>
');

	return analyse_resultat_skel('html_657cf7064822c00408fc2feab4cce702', $Cache, $page, '../plugins/auto/crayons/formulaires/configurer_crayons.html');
}
?>