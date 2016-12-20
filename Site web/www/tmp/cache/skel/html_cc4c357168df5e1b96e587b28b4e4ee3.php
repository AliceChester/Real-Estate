<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/itwx/header.html
 * Date :      Sat, 08 Oct 2011 14:57:46 GMT
 * Compile :   Fri, 30 Dec 2011 23:14:14 GMT
 * Boucles :   _title, _pan, _traductionss, _tradarticle, _menuart, _menurub
 */ 

/* BOUCLE articles  */

 function BOUCLE_titlehtml_cc4c357168df5e1b96e587b28b4e4ee3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/itwx/header.html','html_cc4c357168df5e1b96e587b28b4e4ee3','_title',6,$GLOBALS['spip_lang']));
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

 function BOUCLE_panhtml_cc4c357168df5e1b96e587b28b4e4ee3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/itwx/header.html','html_cc4c357168df5e1b96e587b28b4e4ee3','_pan',135,$GLOBALS['spip_lang']));
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

 function BOUCLE_traductionsshtml_cc4c357168df5e1b96e587b28b4e4ee3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_traductionss';
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
			array('OR', 
			array('AND', 
			array('=', 'articles.id_trad', 0), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article']))), 
			array('AND', 
			array('>', 'articles.id_trad', 0), 
			array('=', 'articles.id_trad', sql_quote($Pile[$SP]['id_trad'])))), 
			array('!=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/itwx/header.html','html_cc4c357168df5e1b96e587b28b4e4ee3','_traductionss',153,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	
<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'?lang=' .
choisir_traduction(array('en' => 'fr','fr' => 'en')) .
'" rel="alternate" hreflang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'">' .
choisir_traduction(array('en' => '<img src="IMG/fr.gif" alt="French" /> ','fr' => '<img src="IMG/gb.gif" alt="Anglais" />')) .
'</a>

');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_tradarticlehtml_cc4c357168df5e1b96e587b28b4e4ee3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_tradarticle';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_trad",
		"articles.id_article",
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
		 array('plugins/cimobile/squel_mobiles/itwx/header.html','html_cc4c357168df5e1b96e587b28b4e4ee3','_tradarticle',152,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	' .
BOUCLE_traductionsshtml_cc4c357168df5e1b96e587b28b4e4ee3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_menuarthtml_cc4c357168df5e1b96e587b28b4e4ee3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/itwx/header.html','html_cc4c357168df5e1b96e587b28b4e4ee3','_menuart',172,$GLOBALS['spip_lang']));
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

 function BOUCLE_menurubhtml_cc4c357168df5e1b96e587b28b4e4ee3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/itwx/header.html','html_cc4c357168df5e1b96e587b28b4e4ee3','_menurub',171,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
BOUCLE_menuarthtml_cc4c357168df5e1b96e587b28b4e4ee3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/itwx/header.html
// Temps de compilation total: 63.910 ms
//

function html_cc4c357168df5e1b96e587b28b4e4ee3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
choisir_traduction(array('en' => 'Maintain your apartment when abroad ','fr' => 'Suivi et entretien de votre appartement')) .
BOUCLE_titlehtml_cc4c357168df5e1b96e587b28b4e4ee3($Cache, $Pile, $doublons, $Numrows, $SP) .
'</title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="fr" />
	<meta name="description" content="' .
choisir_traduction(array('en' => 'Real Estate Caretaking, Monitoring your apartment','fr' => 'Real Estate Caretaking - Services de surveillance de vos appartement sur Paris ')) .
'" />
	<meta name="keywords" content="Real, estate caretaking, care,realestatecaretaking, paris, france,' .
choisir_traduction(array('en' => 'home, house, Housekeeper, Housekeeping, management, maintenance, services, Property, repairs, renovating, Key, holdings, dwelling, Luxury, Maintenance, servicing, upkeep, help, proprietes, decorating,','fr' => ' maisons, maison, service, immobilier, conciergerie, appartement, gardiennage, Gestion, immeuble, sécurité, agent, propriété, propriétés, entretien, garde, Surveillance, Assistance, Entretien, Maintenance, accueil, aide, particulier, location, décoration, voyage, Entretien, Travaux, bricolage,')) .
'luxe, lux, services, servicen, martine, hillion" />
	<meta name="generator" content="Real Estate Caretaking (http://www.realestatecaretaking.com/)" />
	<meta name="author" content="Martine Hillion"/>
	<meta name="owner" content="http://www.realestatecaretaking.com/"/>
	<meta name="robots" content="index, follow, archive" /> 
	<meta http-equiv="Pragma" content="no-cache" />
	<meta name="google-site-verification" content="mB-opM39Tf7sA5oLGCDU_-Xyvgmf5VO83ysnwFssEOI" />

<link rel="icon" href="IMG/icon.png"/>

<link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<link href=\'http://fonts.googleapis.com/css?family=Nobile\' rel=\'stylesheet\' type=\'text/css\' />
<link href=\'http://fonts.googleapis.com/css?family=Cantarell\' rel=\'stylesheet\' type=\'text/css\' />



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

<style type="text/css" rel="stylesheet">

<!--


a:link { color: #764B00; text-decoration: underline }
a:visited { color: #764B00; text-decoration: underline }
a:hover { color: #BB7700;  text-decoration: underline }		

.menu ul li a:link { color: #b3b3b3; text-decoration: none; }
.menu ul li a:visited { color: #b3b3b3; text-decoration: none; }
.menu ul li a:hover { color: #BB7700;  text-decoration: none; }	

.menu ul li.hover a:link { color: #BB7700; text-decoration: none; }
.menu ul li.hover a:visited { color: #BB7700; text-decoration: none; }
.menu ul li.hover a:hover { color: #BB7700;  text-decoration: none; }

a.simple:link { color: #000; text-decoration: none; }
a.simple:visited { color: #000; text-decoration: none; }
a.simple:hover { color: #000;  text-decoration: underline; }

img		{
		border: none;
		}


		
.center {
text-align: center;
}	
		
		
.menu-top {


text-align: center;
margin-top: 30px;
text-transform: uppercase; 
}


.menu li {
	font-weight: bold;
	color: #CCCCCC;
    display: inline;
    font-family: Cantarell;
    padding-left: 5px;
	font-size: 12px;
}

.menu ul{
margin: 0;
padding: 0;
}

h2 {
font-style: italic;
color: #bb7700;
font-size: 19px;
font-family: Georgia;
margin-bottom:0;
font-weight: normal;
}

li {
 list-style-image : url(IMG/li.jpg);
}

.copyright {
float: left;
position: relative;
text-align: center;
width: 100%;
font-size: 10px;
z-index: 15;
font-family: Cantarell;
}


-->
</style>




' .
insert_head_css().pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>


</head>
<body>


' .
BOUCLE_panhtml_cc4c357168df5e1b96e587b28b4e4ee3($Cache, $Pile, $doublons, $Numrows, $SP) .
'


<div style="margin-top: 50px;" class="center"><a href="' .
choisir_traduction(array('fr' => 'spip.php?article3 ','en' => 'spip.php?article1')) .
'"><img src="IMG/logo3.jpg" alt="Real Estate Caretaking" title="Real Estate Caretaking" /></a></div>

<table style="margin-left: auto; margin-right: auto; width: 300px;">
	<tbody>
		<tr>
			<td>
' .
choisir_traduction(array('fr' => '<a href="http://clients.realestatecaretaking.com/index.php?lang=1"><img class="multi" src="/IMG/acces-client.png" alt="Accès Clients" /></a>
						','en' => '<a href="http://clients.realestatecaretaking.com/index.php?lang=2"><img style="border: none;" class="multi" src="/IMG/client-access.png" alt="Client Access" /></a>')) .
'
</td><td style="texte-align: right; vertical-align: top;">
	' .
BOUCLE_tradarticlehtml_cc4c357168df5e1b96e587b28b4e4ee3($Cache, $Pile, $doublons, $Numrows, $SP) .
'

</td>
</tr>
</tbody>
</table>

						

<div class="menu menu-top">
	<ul>


' .
BOUCLE_menurubhtml_cc4c357168df5e1b96e587b28b4e4ee3($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</ul>
</div>		
');

	return analyse_resultat_skel('html_cc4c357168df5e1b96e587b28b4e4ee3', $Cache, $page, 'plugins/cimobile/squel_mobiles/itwx/header.html');
}
?>