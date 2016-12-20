<?php

/*
 * Squelette : plugins/auto/forms_et_tables_2_0/modeles/form.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Sun, 23 Oct 2011 13:15:15 GMT
 * Boucles :   _f
 */ 

/* BOUCLE forms  */

 function BOUCLE_fhtml_ee408a145254efb5096d966c7ac4412d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms';
	static $id = '_f';
	static $from = array('forms' => 'spip_forms');
	static $type = array();
	static $groupby = array();
	static $select = array("forms.id_form");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forms.id_form', sql_quote($Pile[0]['id_form'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/forms_et_tables_2_0/modeles/form.html','html_ee408a145254efb5096d966c7ac4412d','_f',1,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
' .
invalideur_session($Cache, executer_balise_dynamique('FORMS',
	array($Pile[$SP]['id_form'],@$Pile[0]['id_article'],@$Pile[0]['id_donnee'],@$Pile[0]['id_donnee_liee'],@$Pile[0]['class']),
	array('plugins/auto/forms_et_tables_2_0/modeles/form.html','html_ee408a145254efb5096d966c7ac4412d','_f',2,$GLOBALS['spip_lang']))) .
'
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/forms_et_tables_2_0/modeles/form.html
// Temps de compilation total: 43.414 ms
//

function html_ee408a145254efb5096d966c7ac4412d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_fhtml_ee408a145254efb5096d966c7ac4412d($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_ee408a145254efb5096d966c7ac4412d', $Cache, $page, 'plugins/auto/forms_et_tables_2_0/modeles/form.html');
}
?>