<?php

/*
 * Squelette : plugins/auto/forms_et_tables_2_0/formulaires/forms.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Sun, 23 Oct 2011 13:15:15 GMT
 * Boucles :   _joint, _form
 */ 

/* BOUCLE forms_champs  */

 function BOUCLE_jointhtml_f6f20806d17141d6b94b2de375e396be(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms_champs';
	static $id = '_joint';
	static $from = array('forms_champs' => 'spip_forms_champs');
	static $type = array();
	static $groupby = array();
	static $select = array("forms_champs.rang",
		"forms_champs.champ",
		"forms_champs.id_form",
		"forms_champs.titre");
	static $orderby = array('forms_champs.rang');
	$where = 
			array(
			array('=', 'forms_champs.id_form', sql_quote($Pile[$SP]['id_form'],'','int')), 
			array('=', 'forms_champs.type', "'joint'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/forms_et_tables_2_0/formulaires/forms.html','html_f6f20806d17141d6b94b2de375e396be','_joint',37,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['formvisible']),true) ? ' ':''))))!=='' ?
		($t1 . (	'
	' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['formactif']),true))))!=='' ?
			($t2 . (	'
		' .
		(($t3 = strval(interdire_scripts(forms_boite_jointure(entites_html((@$Pile[0]['id_donnee']),true),interdire_scripts($Pile[$SP]['champ']),$Pile[$SP]['id_form']))))!=='' ?
				((	'<span class=\'spip_form_label\'><div class=\'spip_form_champ\'><span class=\'label\'>' .
			interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
			'</span></span>
		') . $t3 . '</div>') :
				'') .
		'
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

 function BOUCLE_formhtml_f6f20806d17141d6b94b2de375e396be(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms';
	static $id = '_form';
	static $from = array('forms' => 'spip_forms');
	static $type = array();
	static $groupby = array();
	static $select = array("forms.id_form",
		"forms.descriptif",
		"forms.type_form",
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
		 array('plugins/auto/forms_et_tables_2_0/formulaires/forms.html','html_f6f20806d17141d6b94b2de375e396be','_form',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<a name=\'form' .
$Pile[$SP]['id_form'] .
'\'></a>
<div class=\'spip_forms form_' .
$Pile[$SP]['id_form'] .
'\'>
<div class=\'spip_descriptif\'>' .
interdire_scripts(propre($Pile[$SP]['descriptif'], $connect)) .
'</div>
' .
(($t1 = strval(interdire_scripts((($Pile[$SP]['type_form'] == 'sondage') ? ' ':''))))!=='' ?
		($t1 . (	' ' .
	(($t2 = strval(interdire_scripts((($Pile[$SP]['public'] == 'oui') ? ' ':''))))!=='' ?
			($t2 . (	'
		<a href=\'' .
		interdire_scripts(parametre_url(generer_url_public('sondage'),'id_form',$Pile[$SP]['id_form'])) .
		'\' class=\'spip_in resultats_sondage\'
		 target="spip_sondage" onclick="javascript:window.open(this.href, \'spip_sondage\', \'scrollbars=yes, resizable=yes, width=450, height=300\'); return false;"
		 onkeypress="javascript:window.open(this.href, \'spip_sondage\', \'scrollbars=yes,resizable=yes, width=450, height=300\'); return false;">' .
		_T('forms:voir_resultats') .
		'</a>
')) :
			''))) :
		'') .
'
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['formok']))))!=='' ?
		('<p class=\'spip_form_ok\'>' . $t1 . (	'
	' .
	(($t2 = strval(interdire_scripts((($Pile[$SP]['type_form'] == 'sondage') ? ' ':''))))!=='' ?
			($t2 . (	'	<a href=\'' .
		interdire_scripts(ancre_url(parametre_url(entites_html((@$Pile[0]['self']),true),'resultats',$Pile[$SP]['id_form']),(	'form' .
			$Pile[$SP]['id_form']))) .
		'\'>' .
		_T('forms:voir_resultats') .
		'</a>')) :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['reponse']),true))))!=='' ?
			('<span class=\'spip_form_ok_confirmation\'>' . $t2 . '</span>') :
			'') .
	'
</p>
' .
	interdire_scripts((@$Pile[0]['message_complementaire'])))) :
		'') .
'
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['erreur_message']))))!=='' ?
		('<p class=\'spip_form_erreur\'>' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval((@$Pile[0]['url_validation'])))!=='' ?
		('<div style=\'background:url(' . $t1 . ');width:1px; height=1px\'></div>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['formvisible']),true) ? ' ':''))))!=='' ?
		($t1 . (	'
	' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['formactif']),true))))!=='' ?
			($t2 . (	'
	<form method=\'post\' action=\'' .
		interdire_scripts(entites_html((@$Pile[0]['self']),true)) .
		'#form' .
		$Pile[$SP]['id_form'] .
		'\'
		enctype=\'multipart/form-data\'>
	')) :
			'') .
	'
		<div>
		' .
	interdire_scripts(form_hidden(entites_html((@$Pile[0]['self']),true))) .
	'
		<input type=\'hidden\' name=\'ajout_reponse\' value=\'' .
	$Pile[$SP]['id_form'] .
	'\' />
		' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['id_donnee']),true))))!=='' ?
			('<input type=\'hidden\' name=\'id_donnee\' value=\'' . $t2 . '\' />') :
			'') .
	'

		<input type=\'hidden\' name=\'retour_form\' value=\'' .
	interdire_scripts(entites_html((@$Pile[0]['url_retour']),true)) .
	'\' />
		' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['pose_cookie']),true) ? ' ':''))))!=='' ?
			($t2 . '<input type=\'hidden\' name=\'ajout_cookie_form\' value=\'oui\' />') :
			'') .
	'
		</div>
			' .
	
'<'.'?php echo recuperer_fond( ' . argumenter_squelette(interdire_scripts(entites_html((@$Pile[0]['class']),true))) . ', array(\'id_form\' => ' . argumenter_squelette($Pile[$SP]['id_form']) . ',
	\'affiche_sondage\' => ' . argumenter_squelette(@$Pile[0]['affiche_sondage']) . ',
	\'erreur\' => ' . argumenter_squelette(@$Pile[0]['erreur']) . ',
	\'valeurs\' => ' . argumenter_squelette((@$Pile[0]['valeurs'])) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/auto/forms_et_tables_2_0/formulaires/forms.html\',\'html_f6f20806d17141d6b94b2de375e396be\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['formactif']),true))))!=='' ?
			($t2 . '
	</form>
	') :
			'') .
	'
	
	' .
	(($t2 = strval(interdire_scripts(calculer_notes())))!=='' ?
			('<div class=\'spip_form_notes\'>' . $t2 . '</div>') :
			'') .
	'
')) :
		'') .
'
' .
(($t1 = BOUCLE_jointhtml_f6f20806d17141d6b94b2de375e396be($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<div id=\'forms_lier_donnees\'>
' . $t1 . '
</div>
') :
		'') .
'
</div>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/forms_et_tables_2_0/formulaires/forms.html
// Temps de compilation total: 27.069 ms
//

function html_f6f20806d17141d6b94b2de375e396be($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_formhtml_f6f20806d17141d6b94b2de375e396be($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_f6f20806d17141d6b94b2de375e396be', $Cache, $page, 'plugins/auto/forms_et_tables_2_0/formulaires/forms.html');
}
?>