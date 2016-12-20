<?php

/*
 * Squelette : plugins/auto/forms_et_tables_2_0/modeles/form_reponse_email_admin.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Tue, 13 Dec 2011 14:16:40 GMT
 * Boucles :   _champs, _form, _reponses
 */ 

/* BOUCLE forms_champs  */

 function BOUCLE_champshtml_6d15c9905e0f03008aaaa27ada507869(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms_champs';
	static $id = '_champs';
	static $from = array('forms_champs' => 'spip_forms_champs');
	static $type = array();
	static $groupby = array();
	static $select = array("forms_champs.rang",
		"forms_champs.titre",
		"forms_champs.champ",
		"forms_champs.id_form",
		"forms_champs.type");
	static $orderby = array('forms_champs.rang');
	$where = 
			array(
			array('=', 'forms_champs.id_form', sql_quote($Pile[$SP]['id_form'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/forms_et_tables_2_0/modeles/form_reponse_email_admin.html','html_6d15c9905e0f03008aaaa27ada507869','_champs',9,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
' .
interdire_scripts(supprimer_tags(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
' : ' .
supprimer_tags(forms_calcule_les_valeurs('forms_champs', $Pile[$SP-2]['id_donnee'], $Pile[$SP]['champ'], $Pile[$SP]['id_form'] , ',')) .
' ' .
(($t1 = strval(interdire_scripts(((typo($Pile[$SP]['type'], "TYPO", $connect) == 'fichier') ? ' ':''))))!=='' ?
		($t1 . (	'	' .
	(($t2 = strval(interdire_scripts(((entites_html((@$Pile[0]['mail_admin']),true) == 'oui') ? ' ':''))))!=='' ?
			($t2 . (	' ' .
		interdire_scripts((tester_url_ecrire('forms_telecharger') ?generer_url_ecrire('forms_telecharger',(	'id_donnee=' .
			$Pile[$SP-2]['id_donnee'] .
			'&champ=' .
			interdire_scripts($Pile[$SP]['champ'])))  : "")))) :
			'') .
	' ')) :
		''));
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forms  */

 function BOUCLE_formhtml_6d15c9905e0f03008aaaa27ada507869(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms';
	static $id = '_form';
	static $from = array('forms' => 'spip_forms');
	static $type = array();
	static $groupby = array();
	static $select = array("forms.id_form",
		"forms.texte",
		"forms.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forms.id_form', sql_quote($Pile[$SP]['id_form'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/forms_et_tables_2_0/modeles/form_reponse_email_admin.html','html_6d15c9905e0f03008aaaa27ada507869','_form',2,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('forms:formulaire');
	$l2 = _T('forms:reponse_retrovez');
	$l3 = _T('forms:reponse_envoyee');
	$l4 = _T('forms:reponse_depuis');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
interdire_scripts(supprimer_tags(cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect))))) .
'
' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['mail_admin']),true) == 'oui') ? ' ':''))))!=='' ?
		($t1 . (	'
' .
	$l1 .
	' ' .
	interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
	'
' .
	$l2 .
	' ' .
	interdire_scripts((tester_url_ecrire('forms_reponses') ?generer_url_ecrire('forms_reponses',(	'id_form=' .
		$Pile[$SP]['id_form']))  : "")))) :
		'') .
'
' .
$l3 .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP-1]['date']))) .
'
' .
$l4 .
' ' .
interdire_scripts(url_absolue($Pile[$SP-1]['url'])) .
'
' .
BOUCLE_champshtml_6d15c9905e0f03008aaaa27ada507869($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forms_donnees  */

 function BOUCLE_reponseshtml_6d15c9905e0f03008aaaa27ada507869(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms_donnees';
	static $id = '_reponses';
	static $from = array('forms_donnees' => 'spip_forms_donnees');
	static $type = array();
	static $groupby = array();
	static $select = array("forms_donnees.id_donnee",
		"forms_donnees.id_form",
		"forms_donnees.date",
		"forms_donnees.url");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forms_donnees.id_donnee', sql_quote($Pile[0]['id_donnee'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/forms_et_tables_2_0/modeles/form_reponse_email_admin.html','html_6d15c9905e0f03008aaaa27ada507869','_reponses',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
' .
BOUCLE_formhtml_6d15c9905e0f03008aaaa27ada507869($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/forms_et_tables_2_0/modeles/form_reponse_email_admin.html
// Temps de compilation total: 6.442 ms
//

function html_6d15c9905e0f03008aaaa27ada507869($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_reponseshtml_6d15c9905e0f03008aaaa27ada507869($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_6d15c9905e0f03008aaaa27ada507869', $Cache, $page, 'plugins/auto/forms_et_tables_2_0/modeles/form_reponse_email_admin.html');
}
?>