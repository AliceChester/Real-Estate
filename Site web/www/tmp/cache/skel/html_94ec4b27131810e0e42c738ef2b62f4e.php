<?php

/*
 * Squelette : plugins/auto/spip-bonux/modeles/pagination.html
 * Date :      Tue, 27 Jul 2010 09:39:20 GMT
 * Compile :   Mon, 24 Oct 2011 00:51:50 GMT
 * Boucles :   _pages
 */ 

/* BOUCLE POUR  */

 function BOUCLE_pageshtml_94ec4b27131810e0e42c738ef2b62f4e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'pour';
	static $table = 'POUR';
	static $id = '_pages';
	static $from = array('POUR' => 'POUR');
	static $type = array();
	static $groupby = array();
	static $select = array("POUR.valeur");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(
			array('tableau', (is_array($a = ($Pile["vars"])) ? $a['pages'] : "")));
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/spip-bonux/modeles/pagination.html','html_94ec4b27131810e0e42c738ef2b62f4e','_pages',7,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'pour')) {

		$t0 .= (
'
' .
vide($Pile['vars']['item'] = mult(moins(forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true)))) .
'
' .
interdire_scripts(aoustrong(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true))),mult(moins(forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))),(forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']) == interdire_scripts(entites_html((@$Pile[0]['page_courante']),true))),'lien_pagination','','nofollow')) .
'
' .
(($t1 = strval(((forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']) < (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "")) ? (is_array($a = ($Pile["vars"])) ? $a['separateur'] : ""):'')))!=='' ?
		('<span class=\'sep separateur\'>' . $t1 . '</span>') :
		'') .
'
');
	}
	@sql_free($result, 'pour');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/spip-bonux/modeles/pagination.html
// Temps de compilation total: 77.162 ms
//

function html_94ec4b27131810e0e42c738ef2b62f4e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
interdire_scripts((@$Pile[0]['bloc_ancre'])) .
vide($Pile['vars']['bornes'] = interdire_scripts(filtre_bornes_pagination_dist(entites_html((@$Pile[0]['page_courante']),true),interdire_scripts(entites_html((@$Pile[0]['nombre_pages']),true)),'10'))) .
vide($Pile['vars']['premiere'] = filtre_reset((is_array($a = ($Pile["vars"])) ? $a['bornes'] : ""))) .
vide($Pile['vars']['derniere'] = filtre_end((is_array($a = ($Pile["vars"])) ? $a['bornes'] : ""))) .
vide($Pile['vars']['pages'] = range((is_array($a = ($Pile["vars"])) ? $a['premiere'] : ""),(is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))) .
vide($Pile['vars']['separateur'] = interdire_scripts(entites_html(sinon(@$Pile[0]['separateur'],'|'),true))) .
(($t1 = BOUCLE_pageshtml_94ec4b27131810e0e42c738ef2b62f4e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		(((is_array($a = ($Pile["vars"])) ? $a['premiere'] : "") > '1')  ?
				((	'<a href=\'' .
			interdire_scripts(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),'')) .
			'#' .
			interdire_scripts(entites_html((@$Pile[0]['ancre']),true)) .
			'\' class=\'lien_pagination\' rel=\'nofollow\'>') . '...' . (	'</a> ' .
			(($t4 = strval((is_array($a = ($Pile["vars"])) ? $a['separateur'] : "")))!=='' ?
					('<span class=\'sep separateur\'>' . $t4 . '</span>') :
					''))) :
				'') .
		'
') . $t1 . (	'
' .
		(((is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") < interdire_scripts(entites_html((@$Pile[0]['nombre_pages']),true)))  ?
				((	(($t4 = strval((is_array($a = ($Pile["vars"])) ? $a['separateur'] : "")))!=='' ?
					('<span class=\'sep separateur\'>' . $t4 . '</span>') :
					'') .
			' <a href=\'' .
			interdire_scripts(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),interdire_scripts(mult(moins(entites_html((@$Pile[0]['nombre_pages']),true),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true)))))) .
			'#' .
			interdire_scripts(entites_html((@$Pile[0]['ancre']),true)) .
			'\' class=\'lien_pagination\' rel=\'nofollow\'>') . '...' . '</a>') :
				'') .
		'
')) :
		''));

	return analyse_resultat_skel('html_94ec4b27131810e0e42c738ef2b62f4e', $Cache, $page, 'plugins/auto/spip-bonux/modeles/pagination.html');
}
?>