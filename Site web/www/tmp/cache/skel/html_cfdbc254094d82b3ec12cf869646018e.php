<?php

/*
 * Squelette : squelettes-dist/formulaires/inscription.html
 * Date :      Sun, 03 Apr 2011 15:43:55 GMT
 * Compile :   Sat, 12 Dec 2015 12:07:51 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/formulaires/inscription.html
// Temps de compilation total: 1.990 ms
//

function html_cfdbc254094d82b3ec12cf869646018e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_inscription ajax" id="formulaire_inscription">
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
' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['editable']),true))))!=='' ?
		($t1 . (	'
<form method="post" action="' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'">
	' .
		'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><fieldset>
		
		' .
	(($t2 = strval(interdire_scripts((((@$Pile[0]['message_erreur'])) ?'' :' '))))!=='' ?
			($t2 . (	'
		' .
		(($t3 = strval(interdire_scripts((@$Pile[0]['_commentaire']))))!=='' ?
				((	'<legend>' .
			_T('public/spip/ecrire:pass_vousinscrire') .
			'</legend>
		<p class=\'explication\'>') . $t3 . '</p>') :
				'') .
		'
		')) :
			'') .
	'<legend>' .
	_T('public/spip/ecrire:form_forum_identifiants') .
	'</legend>
		<p class=\'explication\'>' .
	_T('public/spip/ecrire:form_forum_indiquer_nom_email') .
	'</p>
		<ul>
			<li class=\'saisie_nom_inscription obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'nom_inscription')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="nom_inscription">' .
	_T('public/spip/ecrire:form_pet_votre_nom') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'nom_inscription'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="nom_inscription" id="nom_inscription" value="' .
	interdire_scripts(entites_html((@$Pile[0]['nom_inscription']),true)) .
	'" size="30" />
			</li>
			<li class=\'saisie_mail_inscription obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'mail_inscription')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="mail_inscription">' .
	_T('public/spip/ecrire:form_pet_votre_email') .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'mail_inscription'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="mail_inscription" id="mail_inscription" value="' .
	interdire_scripts(entites_html((@$Pile[0]['mail_inscription']),true)) .
	'" size="30" />
			</li>
		</ul>
	</fieldset>
	
	<p style="display: none;">
		<label for="nobot">' .
	_T('public/spip/ecrire:antispam_champ_vide') .
	'</label>
		<input type="text" class="text" name="nobot" id="nobot" value="' .
	interdire_scripts(entites_html((@$Pile[0]['nobot']),true)) .
	'" size="10" />
	</p>
	<p class="boutons"><input type="submit" class="submit" value="' .
	_T('public/spip/ecrire:bouton_valider') .
	'" /></p>
 </form>
' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['focus']),true))))!=='' ?
			('<script type="text/javascript"><!--
document.getElementById(\'' . $t2 . '\').focus();
--></script>') :
			'') .
	'
')) :
		'') .
'
</div>
' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['focus'],''),true) ? ' ':''))))!=='' ?
		($t1 . (	'
<div style="text-align: ' .
	lang_dir(@$Pile[0]['lang'], 'right','left') .
	';">
<script type="text/javascript">/*<!' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'CDATA' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'*/
document.write("<a style=\'color: #e86519\' href=\'")
document.write((window.opener) ? "javascript:close()" : "./")
document.write("\'>' .
	_T('public/spip/ecrire:pass_quitter_fenetre') .
	'<" + "/a>");
/*' .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	'>*/</script>
<noscript>
	&#91;<a href=\'./\'>' .
	_T('public/spip/ecrire:pass_retour_public') .
	'</a>&#93;
</noscript>
</div>')) :
		''));

	return analyse_resultat_skel('html_cfdbc254094d82b3ec12cf869646018e', $Cache, $page, 'squelettes-dist/formulaires/inscription.html');
}
?>