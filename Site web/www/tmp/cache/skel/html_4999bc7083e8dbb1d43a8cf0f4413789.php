<?php

/*
 * Squelette : squelettes-dist/formulaires/oubli.html
 * Date :      Sun, 03 Apr 2011 15:43:56 GMT
 * Compile :   Thu, 14 May 2015 09:42:06 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette squelettes-dist/formulaires/oubli.html
// Temps de compilation total: 1.079 ms
//

function html_4999bc7083e8dbb1d43a8cf0f4413789($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_oubli">
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(((@$Pile[0]['editable']) ? ' ':''))))!=='' ?
		($t1 . (	'
<form id="oubli_form" action="' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'" method="post">
	
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
	_T('public/spip/ecrire:pass_nouveau_pass') .
	'</legend>
		<ul>
			<li class="saisie_oubli obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'oubli')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'">
				<label for="oubli">' .
	_T('public/spip/ecrire:form_pet_votre_email') .
	'</label>
				' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'oubli')))!=='' ?
			('<span class=\'erreur\'>' . $t2 . '</span>') :
			'') .
	'
				<input type=\'text\' class=\'text\' name=\'oubli\' id=\'oubli\' value="' .
	(@$Pile[0]['oubli']) .
	'" />
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
	_T('public/spip/ecrire:pass_ok') .
	'" /></p>
</form>
<script type=\'text/javascript\'>/*<!' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'CDATA' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'*/
 document.getElementById(\'oubli\').focus()
/*' .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	'>*/</script>
')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_4999bc7083e8dbb1d43a8cf0f4413789', $Cache, $page, 'squelettes-dist/formulaires/oubli.html');
}
?>