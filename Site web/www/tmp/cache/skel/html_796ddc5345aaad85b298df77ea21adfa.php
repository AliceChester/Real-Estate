<?php

/*
 * Squelette : squelettes/header.html
 * Date :      Wed, 02 Jul 2014 17:24:44 GMT
 * Compile :   Wed, 02 Jul 2014 17:25:31 GMT
 * Boucles :   _title, _pan, _menuart, _menurub
 */ 

/* BOUCLE articles  */

 function BOUCLE_titlehtml_796ddc5345aaad85b298df77ea21adfa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_title';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.titre",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/header.html','html_796ddc5345aaad85b298df77ea21adfa','_title',7,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'- ' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)));
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_panhtml_796ddc5345aaad85b298df77ea21adfa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_pan';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.lang",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/header.html','html_796ddc5345aaad85b298df77ea21adfa','_pan',96,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'

' .
vide($Pile['vars']['article_global'] = $Pile[$SP]['id_article']) .
vide($Pile['vars']['lang'] = htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])));
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_menuarthtml_796ddc5345aaad85b298df77ea21adfa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_menuart';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('num');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/header.html','html_796ddc5345aaad85b298df77ea21adfa','_menuart',118,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                                <li class="' .
choixsiegal($Pile[$SP]['id_article'],(is_array($a = ($Pile["vars"])) ? $a['article_global'] : ""),'hover','no') .
'"><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a></li>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_menurubhtml_796ddc5345aaad85b298df77ea21adfa(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_menurub';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array('=', 'rubriques.id_parent', 0));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/header.html','html_796ddc5345aaad85b298df77ea21adfa','_menurub',117,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
BOUCLE_menuarthtml_796ddc5345aaad85b298df77ea21adfa($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/header.html
// Temps de compilation total: 4.829 ms
//

function html_796ddc5345aaad85b298df77ea21adfa($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'">
<?php $lalangue = \'' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'\'; ?>
<head>


<title>Real Estate Caretaking - ' .
choisir_traduction(array('en' => 'Maintain your apartment when abroad','fr' => 'Suivi et entretien de votre appartement')) .
BOUCLE_titlehtml_796ddc5345aaad85b298df77ea21adfa($Cache, $Pile, $doublons, $Numrows, $SP) .
'</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="fr" />
	<meta name="description" content="' .
choisir_traduction(array('en' => 'Home management in Paris: services, regular inspections, repairs, renovations, maintenance  and upkeep.','fr' => 'Home management, gestion d’appartement parisien : services, visites régulières, entretien et rénovation.')) .
'" />
	<meta name="keywords" content="' .
choisir_traduction(array('en' => 'Paris, home services, apartment, home management,management, property, Maintenance, housekeeping, works, repairs, Assistance, renovation, renovating, decoration, luxery, concierge, assistance, rental, Real estate, martine, hillion, France','fr' => 'Paris, Services, home services, appartement, maison, immobilier, home management, conciergerie, gestion, propriété, propriétés, entretien, Surveillance, Travaux, réparation, Assistance, Entretien, Maintenance, accueil, aide, particulier, location, décoration, entretien, luxe, Real estate, martine, hillion, France')) .
'" />
	<meta name="generator" content="Real Estate Caretaking (http://www.realestatecaretaking.com/)" />
	<meta name="author" content="Martine Hillion"/>
	<meta name="owner" content="http://www.realestatecaretaking.com/"/>
	<meta name="robots" content="index, follow, archive" /> 
	<meta http-equiv="Pragma" content="no-cache" />
	<meta name="google-site-verification" content="mB-opM39Tf7sA5oLGCDU_-Xyvgmf5VO83ysnwFssEOI" />

<link rel="icon" href="IMG/icon.png"/>

<link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>' .
insert_head_css().pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>' .
'
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.mousewheel.min.js"></script>

<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />
<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />
<link rel="stylesheet" href="style.css" type="text/css" />
<!--[if lte IE 7]><link rel="stylesheet" href="style_ie7.css" type="text/css" /><![endif]-->
<!--[if lte IE 6]><link rel="stylesheet" href="style_ie6.css" type="text/css" /><![endif]-->

<script type="text/javascript">
$(window).load(function() {
	mCustomScrollbars();
});

function mCustomScrollbars(){
	/* 
	malihu custom scrollbar function parameters: 
	1) scroll type (values: "vertical" or "horizontal")
	2) scroll easing amount (0 for no easing) 
	3) scroll easing type 
	4) extra bottom scrolling space for vertical scroll type only (minimum value: 1)
	5) scrollbar height/width adjustment (values: "auto" or "fixed")
	6) mouse-wheel support (values: "yes" or "no")
	7) scrolling via buttons support (values: "yes" or "no")
	8) buttons scrolling speed (values: 1-20, 1 being the slowest)
	*/
	$("#mcs_container").mCustomScrollbar("vertical",300,"easeOutCirc",1.05,"auto","yes","yes",15); 
}

/* function to fix the -10000 pixel limit of jquery.animate */
$.fx.prototype.cur = function(){
    if ( this.elem[this.prop] != null && (!this.elem.style || this.elem.style[this.prop] == null) ) {
      return this.elem[ this.prop ];
    }
    var r = parseFloat( jQuery.css( this.elem, this.prop ) );
    return typeof r == \'undefined\' ? 0 : r;
}

/* function to load new content dynamically */
function LoadNewContent(id,file){
	$("#"+id+" .customScrollBox .content").load(file,function(){
		mCustomScrollbars();
	});
}
</script>
<script type="text/javascript" src="scripts/jquery.mCustomScrollbar.js"></script>


<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://realestatecaretaking.com/piwik/" : "http://realestatecaretaking.com/piwik/");
document.write(unescape("%3Cscript src=\'" + pkBaseURL + "piwik.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://realestatecaretaking.com/piwik/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->





</head>
<body>

<h3 style="position: absolute; text-indent: -1000em;">' .
choisir_traduction(array('en' => 'Home management in Paris: services, regular inspections, repairs, renovations, maintenance  and upkeep.','fr' => 'Home management, gestion d’appartement parisien : services, visites régulières, entretien et rénovation.')) .
' martine, hillion, paris, france,' .
choisir_traduction(array('en' => 'Monitoring your apartment home house Housekeeper Housekeeping management maintenance services Property repairs renovating Key holdings dwelling Luxury Maintenance servicing upkeep help proprietes decorating ','fr' => 'Services de surveillance de vos appartement sur Paris, maisons  maison service. immobilier conciergerie appartement gardiennage Gestion immeuble sécurité agent propriété propriétés entretien garde Surveillance Assistance Entretien Maintenance accueil aide particulier location décoration voyage Entretien Travaux bricolage ')) .
' luxe, lux ! services servicen... </h3>

' .
BOUCLE_panhtml_796ddc5345aaad85b298df77ea21adfa($Cache, $Pile, $doublons, $Numrows, $SP) .
'
<div id="back-line"></div>



<table width="100%" style="height: 100%; width: 100%; border-collapse: collapse; text-align: center;">
<tbody>
<tr>
<td valign="middle" style="height: 100%; padding: 0; vertical-align: middle;">

<div id="globbing">
<h2 class="logo"><a href="' .
choisir_traduction(array('fr' => 'spip.php?article3 ','en' => 'spip.php?article1')) .
'"><img src="IMG/logo3.jpg" alt="Real Estate Caretaking" title="Real Estate Caretaking" /></a></h2>
<div class="menu menu-top">
	<ul>


' .
BOUCLE_menurubhtml_796ddc5345aaad85b298df77ea21adfa($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</ul>
</div>		

');

	return analyse_resultat_skel('html_796ddc5345aaad85b298df77ea21adfa', $Cache, $page, 'squelettes/header.html');
}
?>