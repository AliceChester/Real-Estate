<?php

/*
 * Squelette : plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Sun, 23 Oct 2011 13:15:16 GMT
 * Boucles :   _champs, _form
 */ 

/* BOUCLE forms_champs  */

 function BOUCLE_champshtml_1bf2eb2a8553baef1a916bce217b36aa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	if (!(is_array($a = (@$Pile[0]['champ']))))
		$in[]= $a;
	else $in = array_merge($in, $a);
	static $table = 'forms_champs';
	static $id = '_champs';
	static $from = array('forms_champs' => 'spip_forms_champs');
	static $type = array();
	static $groupby = array();
	static $select = array("forms_champs.rang",
		"forms_champs.type",
		"forms_champs.titre",
		"forms_champs.champ",
		"forms_champs.id_form",
		"forms_champs.obligatoire",
		"forms_champs.aide",
		"forms_champs.extra_info");
	static $orderby = array('forms_champs.rang');
	$where = 
			array(
			array('=', 'forms_champs.id_form', sql_quote($Pile[$SP]['id_form'],'','int')), (!@$Pile[0]['champ'] ? '' : ((is_array(@$Pile[0]['champ'])) ? sql_in('forms_champs.champ',sql_quote($in)) : 
			array('=', 'forms_champs.champ', sql_quote(@$Pile[0]['champ'])))), 
			array('NOT', 
			array('=', 'forms_champs.type', "'joint'")), 
			array('NOT', 
			array('=', 'forms_champs.saisie', "'non'")));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html','html_1bf2eb2a8553baef1a916bce217b36aa','_champs',10,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['affiche_sondage']),true) ? '':' '))))!=='' ?
		($t1 . (	'
	' .
	((is_array($a = ($Pile["vars"])) ? $a['fieldset'] : "")  ?
			(' ' . (	'
		' .
		(($t3 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'separateur') ? interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)):''))))!=='' ?
				((	((is_array($a = ($Pile["vars"])) ? $a['need_fieldset'] : "") ? '':'</fieldset>') .
			'<fieldset class=\'' .
			interdire_scripts($Pile[$SP]['champ']) .
			'\'><legend>') . $t3 . (	'</legend> ' .
			vide($Pile['vars']['need_fieldset'] = '0'))) :
				'') .
		'
		' .
		((is_array($a = ($Pile["vars"])) ? $a['need_fieldset'] : "")  ?
				(' ' . (	'<fieldset><legend>' .
			interdire_scripts(typo(supprimer_numero($Pile[$SP-1]['titre']),"TYPO",$connect)) .
			'</legend> ' .
			vide($Pile['vars']['need_fieldset'] = '0'))) :
				'') .
		'
	')) :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'separateur') ? '':' '))))!=='' ?
			($t2 . (	'
		<div class=\'spip_form_champ ' .
		interdire_scripts($Pile[$SP]['champ']) .
		'\'>
			' .
		interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'textestatique') ? interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)):'')) .
		'
			' .
		(($t3 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'textestatique') ? '':' '))))!=='' ?
				($t3 . (	'
				' .
			vide($Pile['vars']['afficher'] = '1') .
			'<span class=\'spip_form_label\'>
					' .
			(($t4 = strval(interdire_scripts((match(typo($Pile[$SP]['type'], "TYPO", $connect),'^(select|multiple|mot)') ? '':' '))))!=='' ?
					($t4 . (	'<label for="input-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'">' .
				interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
				'</label>')) :
					'') .
			'
					' .
			(($t4 = strval(interdire_scripts((match(typo($Pile[$SP]['type'], "TYPO", $connect),'^(select|multiple|mot)') ? ' ':''))))!=='' ?
					($t4 . (	'<span class=\'label\'>' .
				interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
				'</span>')) :
					'') .
			'
					' .
			(($t4 = strval(interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? _T('forms:info_obligatoire_02'):''))))!=='' ?
					((	'<span class=\'spip_form_label_obligatoire' .
				(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ']))  ?
						(' ' . 'obligatoire_oublie') :
						'') .
				'\'>
						') . $t4 . '</span>') :
					'') .
			'
					' .
			interdire_scripts((strlen(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) ? ':':'')) .
			'
				</span>
				' .
			(($t4 = strval(interdire_scripts(($Pile[$SP]['aide'] ? '?':''))))!=='' ?
					((	'<span class="formInfo"><a href="' .
				interdire_scripts(generer_url_public('forms_tip',(	'id_form=' .
					$Pile[$SP]['id_form'] .
					'&champ=' .
					interdire_scripts($Pile[$SP]['champ']) .
					'&width=200'))) .
				'" class="jTip" id=\'aide-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'\'>') . $t4 . '</a></span>') :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(forms_label_details(typo($Pile[$SP]['type'], "TYPO", $connect)))))!=='' ?
					('<span class=\'spip_form_label_details\'>' . $t4 . '</span>') :
					'') .
			'
				' .
			vide($Pile['vars']['type'] = 'text') .
			vide($Pile['vars']['class'] = '') .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'date') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['class'] = 'date-picker') .
				vide($Pile['vars']['date-picker'] = '1'))) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'password') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['type'] = 'password') .
				vide($Pile['vars']['afficher'] = '0'))) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'texte') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['afficher'] = '0') .
				forms_textarea(forms_valeur((@$Pile[0]['valeurs']),interdire_scripts($Pile[$SP]['champ']),''),'10','80',interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true)),(	'input-' .
					$Pile[$SP]['id_form'] .
					'-' .
					interdire_scripts($Pile[$SP]['champ'])),interdire_scripts(concat((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo'),' ',interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true)),' ',(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ'])) ? 'champ_obli_oubli':''))),'',interdire_scripts($Pile[$SP]['extra_info'])) .
				'
				')) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'fichier') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['afficher'] = '0') .
				'<input type=\'file\' name=\'' .
				interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
					interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true)) .
				'\' id=\'input-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'\'
						class=\'' .
				interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true)) .
				' ' .
				(($t5 = strval(interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect))))!=='' ?
						($t5 . ' ') :
						'') .
				interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
				(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ']))  ?
						(' ' . ' champ_obli_oubli') :
						'') .
				'\' 
						size=\'40\' />
					' .
				forms_valeur((@$Pile[0]['valeurs']),interdire_scripts($Pile[$SP]['champ']),'') .
				'
				')) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'select') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/forms_champ_select') . ', array(\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette((@$Pile[0]['valeurs'])) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html\',\'html_1bf2eb2a8553baef1a916bce217b36aa\',\'\',27,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
				')) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'multiple') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/forms_champ_multiple') . ', array(\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette((@$Pile[0]['valeurs'])) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html\',\'html_1bf2eb2a8553baef1a916bce217b36aa\',\'\',28,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
				')) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'mot') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/forms_select_mot') . ', array(\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'id_groupe\' => ' . argumenter_squelette(interdire_scripts($Pile[$SP]['extra_info'])) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette((@$Pile[0]['valeurs'])) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html\',\'html_1bf2eb2a8553baef1a916bce217b36aa\',\'\',29,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
				')) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'articles_mot') ? ' ':''))))!=='' ?
					($t4 . (	' ' .
				vide($Pile['vars']['afficher'] = '0') .
				
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('formulaires/forms_select_article_mot') . ', array(\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'id_mot\' => ' . argumenter_squelette(interdire_scripts($Pile[$SP]['extra_info'])) . ',
	\'champ\' => ' . argumenter_squelette($Pile[$SP]['champ']) . ',
	\'valeur\' => ' . argumenter_squelette((@$Pile[0]['valeurs'])) . ',
	\'name\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true))) . ',
	\'crayon_active\' => ' . argumenter_squelette(interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true))) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html\',\'html_1bf2eb2a8553baef1a916bce217b36aa\',\'\',30,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
				')) :
					'') .
			'
				
				' .
			((is_array($a = ($Pile["vars"])) ? $a['afficher'] : "")  ?
					(' ' . (	'
				' .
				vide($Pile['vars']['input'] = (	'<input type="' .
					(is_array($a = ($Pile["vars"])) ? $a['type'] : "") .
					'" name=\'' .
					interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true)) .
					'\' id=\'input-' .
					$Pile[$SP]['id_form'] .
					'-' .
					interdire_scripts($Pile[$SP]['champ']) .
					'\' value="' .
					entites_html(forms_valeur((@$Pile[0]['valeurs']),interdire_scripts($Pile[$SP]['champ']),'')) .
					'" 
						class=\'' .
					(is_array($a = ($Pile["vars"])) ? $a['class'] : "") .
					' ' .
					interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true)) .
					' ' .
					(($t6 = strval(interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect))))!=='' ?
							($t6 . ' ') :
							'') .
					interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
					(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ']))  ?
							(' ' . ' champ_obli_oubli') :
							'') .
					'\' 
						size=\'40\' />
				')) .
				'
				' .
				forms_input_champs((is_array($a = ($Pile["vars"])) ? $a['input'] : ""),$Pile[$SP]['id_form'],interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect)),interdire_scripts($Pile[$SP]['champ']),interdire_scripts($Pile[$SP]['extra_info']),interdire_scripts($Pile[$SP]['obligatoire']),@serialize($Pile[0])) .
				'
				')) :
					'') .
			'
				' .
			(($t4 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'password') ? ' ':''))))!=='' ?
					($t4 . (	'
					<input type="' .
				(is_array($a = ($Pile["vars"])) ? $a['type'] : "") .
				'" name=\'' .
				interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
					interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true)) .
				'\' id=\'input-' .
				$Pile[$SP]['id_form'] .
				'-' .
				interdire_scripts($Pile[$SP]['champ']) .
				'\' value=""
						class=\'' .
				(is_array($a = ($Pile["vars"])) ? $a['class'] : "") .
				' ' .
				interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true)) .
				' ' .
				(($t5 = strval(interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect))))!=='' ?
						($t5 . ' ') :
						'') .
				interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
				(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ']))  ?
						(' ' . ' champ_obli_oubli') :
						'') .
				'\' 
						size=\'40\' />
					' .
				(($t5 = strval(interdire_scripts((strlen($Pile[$SP]['extra_info']) ? ' ':''))))!=='' ?
						($t5 . (	'
					<span class=\'nettoyeur\'> </span></div><div class=\'spip_form_champ ' .
					interdire_scripts($Pile[$SP]['champ']) .
					'\'>
					<span class=\'spip_form_label\'>' .
					interdire_scripts(typo($Pile[$SP]['extra_info'])) .
					'
						' .
					(($t6 = strval(interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? _T('forms:info_obligatoire_02'):''))))!=='' ?
							((	'<span class=\'spip_form_label_obligatoire' .
						(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ']))  ?
								(' ' . 'obligatoire_oublie') :
								'') .
						'\'>
						') . $t6 . '</span>') :
							'') .
					' :
					</span>
					<input type="' .
					(is_array($a = ($Pile["vars"])) ? $a['type'] : "") .
					'" name=\'' .
					interdire_scripts(entites_html(sinon(@$Pile[0][(	'name_' .
						interdire_scripts($Pile[$SP]['champ']))],interdire_scripts($Pile[$SP]['champ'])),true)) .
					'_confirm\' id=\'input-' .
					$Pile[$SP]['id_form'] .
					'-' .
					interdire_scripts($Pile[$SP]['champ']) .
					'-confirm\' value="" 
							class=\'' .
					(is_array($a = ($Pile["vars"])) ? $a['class'] : "") .
					' ' .
					interdire_scripts(entites_html(sinon(@$Pile[0]['crayon_active'],''),true)) .
					' ' .
					(($t6 = strval(interdire_scripts(typo($Pile[$SP]['type'], "TYPO", $connect))))!=='' ?
							($t6 . ' ') :
							'') .
					interdire_scripts((($Pile[$SP]['obligatoire'] == 'oui') ? 'forml':'formo')) .
					(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ']))  ?
							(' ' . ' champ_obli_oubli') :
							'') .
					'\' 
							size=\'40\' />
					')) :
						'') .
				'
				')) :
					'') .
			'

				' .
			(($t4 = strval(forms_valeur((@$Pile[0]['erreur']),interdire_scripts($Pile[$SP]['champ']))))!=='' ?
					('<span class=\'erreur\'>' . $t4 . '</span>') :
					'') .
			'
				<span class=\'nettoyeur\'> </span>
			')) :
				'') .
		'
		</div>
	')) :
			'') .
	'
')) :
		'') .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forms  */

 function BOUCLE_formhtml_1bf2eb2a8553baef1a916bce217b36aa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms';
	static $id = '_form';
	static $from = array('forms' => 'spip_forms');
	static $type = array();
	static $groupby = array();
	static $select = array("forms.id_form",
		"forms.titre",
		"forms.public");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forms.id_form', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id_form']),true)),'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html','html_1bf2eb2a8553baef1a916bce217b36aa','_form',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('forms:sondage_deja_repondu');
	$l2 = _T('public/spip/ecrire:antispam_champ_vide');
	$l3 = _T('public/spip/ecrire:bouton_valider');
	$l4 = _T('public/spip/ecrire:bouton_valider');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<div ' .
(($t1 = strval(interdire_scripts(entites_html(sinon(@$Pile[0]['style'],''),true))))!=='' ?
		('style=\'' . $t1 . '\'') :
		'') .
'>
' .
vide($Pile['vars']['fieldset'] = interdire_scripts((entites_html(sinon(@$Pile[0]['champ'],''),true) ? '0':'1'))) .
vide($Pile['vars']['need_fieldset'] = '1') .
vide($Pile['vars']['date-picker'] = '0') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['affiche_sondage']),true))))!=='' ?
		($t1 . (	'
<fieldset><legend>' .
	interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
	'</legend>
' .
	$l1 .
	'
' .
	(($t2 = strval(interdire_scripts((($Pile[$SP]['public'] == 'oui') ? ' ':''))))!=='' ?
			($t2 . interdire_scripts(Forms_afficher_reponses_sondage($Pile[$SP]['id_form']))) :
			'') .
	'
</fieldset>
')) :
		'') .
'
' .
BOUCLE_champshtml_1bf2eb2a8553baef1a916bce217b36aa($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
((is_array($a = ($Pile["vars"])) ? $a['fieldset'] : "")  ?
		(' ' . (	'
	' .
	((is_array($a = ($Pile["vars"])) ? $a['need_fieldset'] : "") ? '':'</fieldset>') .
	'
')) :
		'') .
'
' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['champ'],''),true) ? '':' '))))!=='' ?
		($t1 . (	'
' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['affiche_sondage']),true) ? '':' '))))!=='' ?
			($t2 . (	'
	' .
		'
	<p style=\'display:none;\'><label for="nobotnobot-' .
		$Pile[$SP]['id_form'] .
		'">' .
		$l2 .
		'</label>
	<input type="text" name="nobotnobot" id="nobotnobot-' .
		$Pile[$SP]['id_form'] .
		'" value="' .
		interdire_scripts(entites_html((@$Pile[0]['nobotnobot']),true)) .
		'" size="10" /></p>
	
	' .
		(($t3 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['affiche_bouton'],'1'),true) ? ' ':''))))!=='' ?
				($t3 . (	'
		<div style=\'text-align:' .
			lang_dir(@$Pile[0]['lang'], 'right','left') .
			'\' class=\'spip_bouton\'>' .
			(($t4 = strval(interdire_scripts((table_valeur(lire_config('forms_et_tables',null,false),'bouton_image') ? '':' '))))!=='' ?
					('<input
		 ' . $t4 . (	' type="submit" name=\'Valider\' 
		 value="' .
				$l3 .
				'" />')) :
					'') .
			(($t4 = strval(interdire_scripts((table_valeur(lire_config('forms_et_tables',null,false),'bouton_image') ? ' ':''))))!=='' ?
					('<input ' . $t4 . (	' 
		 type="image" src=\'' .
				interdire_scripts(((($a = find_in_path('img_pack/bt-forms_bouton_valider.gif')) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(find_in_path('img_pack/bt-forms_bouton_valider.png')))) .
				'\' alt="' .
				$l3 .
				'" />')) :
					'') .
			'
		</div>
	')) :
				'') .
		'
')) :
			'') .
	'
')) :
		'') .
'
<script src="' .
interdire_scripts(url_absolue(find_in_path('javascript/jtip.js'))) .
'" type="text/javascript"></script>
' .
((is_array($a = ($Pile["vars"])) ? $a['date-picker'] : "")  ?
		(' ' . (	'
<script src="' .
	interdire_scripts(url_absolue(find_in_path('javascript/jquery-dom.js'))) .
	'" type="text/javascript"></script>
<script src="' .
	interdire_scripts(url_absolue(find_in_path('javascript/datePicker.js'))) .
	'" type="text/javascript"></script>
')) :
		'') .
'
<script type="text/javascript"><!--
jQuery(\'div.spip_forms input.formo\').bind(\'focus\',function(){jQuery(this).addClass(\'formo-focus\');});
jQuery(\'div.spip_forms input.formo\').bind(\'blur\',function(){jQuery(this).removeClass(\'formo-focus\');});
jQuery(\'div.spip_forms input.forml\').bind(\'focus\',function(){jQuery(this).addClass(\'forml-focus\');});
jQuery(\'div.spip_forms input.forml\').bind(\'blur\',function(){jQuery(this).removeClass(\'forml-focus\');});
' .
((is_array($a = ($Pile["vars"])) ? $a['date-picker'] : "")  ?
		(' ' . (	'
	$.datePicker.setDateFormat(\'dmy\',\'/\');
	' .
	unicode2charset(charset2unicode(recuperer_fond( 'formulaires/date_picker_init' , array(), array('compil'=>array('plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html','html_1bf2eb2a8553baef1a916bce217b36aa','_form',105,$GLOBALS['spip_lang'])), ''),'html')) .
	'
	$(\'input.date-picker\').datePicker({startDate:\'01/01/1900\'});
')) :
		'') .
'
//--></script>
</div>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html
// Temps de compilation total: 51.416 ms
//

function html_1bf2eb2a8553baef1a916bce217b36aa($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_formhtml_1bf2eb2a8553baef1a916bce217b36aa($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_1bf2eb2a8553baef1a916bce217b36aa', $Cache, $page, 'plugins/auto/forms_et_tables_2_0/formulaires/forms_structure.html');
}
?>