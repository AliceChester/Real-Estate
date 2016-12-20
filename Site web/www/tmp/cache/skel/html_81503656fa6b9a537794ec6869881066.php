<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/bberry/inc/inc-rubriques.html
 * Date :      Mon, 26 Sep 2011 21:51:38 GMT
 * Compile :   Sat, 08 Oct 2016 15:42:09 GMT
 * Boucles :   _menu_rubrique_invisible, _rubriques
 */ 

/* BOUCLE rubriques  */

 function BOUCLE_menu_rubrique_invisiblehtml_81503656fa6b9a537794ec6869881066(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_menu_rubrique_invisible';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'L2.titre', "'invisible'"), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/bberry/inc/inc-rubriques.html','html_81503656fa6b9a537794ec6869881066','_menu_rubrique_invisible',3,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		$t0 .= '
';
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriqueshtml_81503656fa6b9a537794ec6869881066(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/bberry/inc/inc-rubriques.html','html_81503656fa6b9a537794ec6869881066','_rubriques',6,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
			
			<li>

			<a href="' .
interdire_scripts(generer_url_public('rubrique',(	'id_rubrique=' .
	$Pile[$SP]['id_rubrique']))) .
'"' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>
			' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'
			</a>	
		</B_articles>

   
		</B_test_expose_article>
		</li>
	
		');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/bberry/inc/inc-rubriques.html
// Temps de compilation total: 68.999 ms
//

function html_81503656fa6b9a537794ec6869881066($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="listwhite boutonwhite">

' .
BOUCLE_menu_rubrique_invisiblehtml_81503656fa6b9a537794ec6869881066($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
(($t1 = BOUCLE_rubriqueshtml_81503656fa6b9a537794ec6869881066($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('

	<ul>
	
		' . $t1 . '

	
	</ul>

') :
		'') .
'<br></div>



');

	return analyse_resultat_skel('html_81503656fa6b9a537794ec6869881066', $Cache, $page, 'plugins/cimobile/squel_mobiles/bberry/inc/inc-rubriques.html');
}
?>