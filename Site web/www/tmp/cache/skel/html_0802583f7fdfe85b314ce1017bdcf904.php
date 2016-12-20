<?php

/*
 * Squelette : squelettes-dist/plan.html
 * Date :      Sun, 03 Apr 2011 15:43:50 GMT
 * Compile :   Wed, 08 Feb 2012 20:34:20 GMT
 * Boucles :   _articles_racine, _articles, _sous_rubriques, _rubriques, _breves, _sites, _secteurs
 */ 

/* BOUCLE articles  */

 function BOUCLE_articles_racinehtml_0802583f7fdfe85b314ce1017bdcf904(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_racine';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/plan.html','html_0802583f7fdfe85b314ce1017bdcf904','_articles_racine',32,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></li>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articleshtml_0802583f7fdfe85b314ce1017bdcf904(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/plan.html','html_0802583f7fdfe85b314ce1017bdcf904','_articles',47,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                    <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></li>
                    ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE boucle  */

 function BOUCLE_sous_rubriqueshtml_0802583f7fdfe85b314ce1017bdcf904(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_rubriques']);
	$t0 = (($t1 = BOUCLE_rubriqueshtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
        <ul>
            ' . $t1 . '
        </ul>
        ') :
		'');
	$Numrows['_rubriques'] = ($save_numrows);
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriqueshtml_0802583f7fdfe85b314ce1017bdcf904(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/plan.html','html_0802583f7fdfe85b314ce1017bdcf904','_rubriques',41,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            <li>
                <strong><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></strong>
                
                ' .
(($t1 = BOUCLE_articleshtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
                <ul>
                    ' . $t1 . '
                </ul>
                ') :
		'') .
'
                
                ' .
BOUCLE_sous_rubriqueshtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            </li>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breveshtml_0802583f7fdfe85b314ce1017bdcf904(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.id_breve",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/plan.html','html_0802583f7fdfe85b314ce1017bdcf904','_breves',62,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></li>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_siteshtml_0802583f7fdfe85b314ce1017bdcf904(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.nom_site",
		"syndic.id_syndic",
		"syndic.url_site");
	static $orderby = array('syndic.nom_site');
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_secteur', sql_quote($Pile[$SP]['id_secteur'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/plan.html','html_0802583f7fdfe85b314ce1017bdcf904','_sites',72,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
			<li><a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
'">' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a></li>
			');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_secteurshtml_0802583f7fdfe85b314ce1017bdcf904(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_secteurs';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.id_secteur",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('rubriques.titre');
	static $where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/plan.html','html_0802583f7fdfe85b314ce1017bdcf904','_secteurs',27,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
        
        <h2><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></h2>
        
        
        ' .
(($t1 = BOUCLE_articles_racinehtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <h3>' .
		_T('public/spip/ecrire:articles') .
		'</h3>
        <ul>
            ') . $t1 . '
        </ul>
        ') :
		'') .
'
        
        ' .
(($t1 = BOUCLE_rubriqueshtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
        <ul>
            ' . $t1 . '
        </ul>
        ') :
		'') .
'
        
        
        ' .
(($t1 = BOUCLE_breveshtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <h3>' .
		_T('public/spip/ecrire:breves') .
		'</h3>
        <ul>
            ') . $t1 . '
        </ul>
        ') :
		'') .
'
        
        
        ' .
(($t1 = BOUCLE_siteshtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <h3>' .
		_T('public/spip/ecrire:sites_web') .
		'</h3>
        <ul>
            ') . $t1 . '
        </ul>
        ') :
		'') .
'
        
        ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/plan.html
// Temps de compilation total: 142.391 ms
//

function html_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:plan_site') .
' - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/plan.html\',\'html_0802583f7fdfe85b314ce1017bdcf904\',\'\',6,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
<meta name="robots" content="none" />
</head>

<body class="page_plan">
<div id="page">
	
	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/plan.html\',\'html_0802583f7fdfe85b314ce1017bdcf904\',\'\',14,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
	
	
    <div id="conteneur">
    <div id="contenu">
        
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site') .
'</a> &gt; <strong class="on">' .
_T('public/spip/ecrire:plan_site') .
'</strong></div>
    
        <div class="cartouche">
            <h1>' .
_T('public/spip/ecrire:plan_site') .
'</h1>
        </div>
        
        ' .
BOUCLE_secteurshtml_0802583f7fdfe85b314ce1017bdcf904($Cache, $Pile, $doublons, $Numrows, $SP) .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rubriques') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/plan.html\',\'html_0802583f7fdfe85b314ce1017bdcf904\',\'\',90,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/plan.html','html_0802583f7fdfe85b314ce1017bdcf904','',92,$GLOBALS['spip_lang'])) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
	&nbsp;
	</div><!--#extra-->

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes-dist/plan.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/plan.html\',\'html_0802583f7fdfe85b314ce1017bdcf904\',\'\',102,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!--#page-->
</body>
</html>');

	return analyse_resultat_skel('html_0802583f7fdfe85b314ce1017bdcf904', $Cache, $page, 'squelettes-dist/plan.html');
}
?>