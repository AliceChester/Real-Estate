<?php

/*
 * Squelette : squelettes/article.html
 * Date :      Wed, 05 Oct 2011 20:35:54 GMT
 * Compile :   Fri, 28 Oct 2011 17:42:59 GMT
 * Boucles :   _lang, _chapo, _texte, _traductionss, _tradarticle
 */ 

/* BOUCLE articles  */

 function BOUCLE_langhtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_lang';
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
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_lang',1,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
recuperer_fond( 'header' , array('id_article' => $Pile[$SP]['id_article'] ,
	'lang' => $GLOBALS["spip_lang"] ), array('compil'=>array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_lang',2,$GLOBALS['spip_lang'])), ''));
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_chapohtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_chapo';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.surtitre",
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
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_chapo',10,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
interdire_scripts((typo($Pile[$SP]['surtitre'], "TYPO", $connect) ? (	'background-image: url("IMG/fonds/' .
	interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect)) .
	'");'):'background-image: url("IMG/fonds/accueil.png");')) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_textehtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_texte';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.texte",
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
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_texte',28,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<div class="' .
classe_boucle_crayon('articles','texte',$Pile[$SP]['id_article']).' ">
' .
interdire_scripts(cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect)))) .
'
</div>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_traductionsshtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_traductionss',46,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	<div style="position: absolute; right: 13px; top: 11px;">
<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'?lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" rel="alternate" hreflang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'">' .
choisir_traduction(array('en' => '<img src="IMG/fr.gif" alt="French" /> ','fr' => '<img src="IMG/gb.gif" alt="Anglais" />')) .
'</a>
	</div>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_tradarticlehtml_776b5d13ec72d3739f328574f43de380(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','_tradarticle',45,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	' .
BOUCLE_traductionsshtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/article.html
// Temps de compilation total: 9.158 ms
//

function html_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_langhtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'



<style rel="stylesheet" type="text/css">
  <!--
#background {
' .
BOUCLE_chapohtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'
}
-->
</style>

<div id="background">

	<div class="accès">	' .
choisir_traduction(array('fr' => '<a href="http://clients.realestatecaretaking.com/index.php?lang=1"><img class="multi" src="/IMG/acces-client.png" alt="Accès Clients" /></a>
								','en' => '<a href="http://clients.realestatecaretaking.com/index.php?lang=2"><img class="multi" src="/IMG/client-access.png" alt="Client Access" /></a>')) .
'</div>
	<div class="surfacetxt">
		<div id="mcs_container">
			<div class="customScrollBox">
				<div class="container">
					<div class="content">


' .
BOUCLE_textehtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'



						</div>
					</div>
					<div class="dragger_container">
						<div class="dragger"></div>
					</div>
				</div>
			<a href="#" class="scrollUpBtn"></a> <a href="#" class="scrollDownBtn"></a>
		</div></div>

	' .
BOUCLE_tradarticlehtml_776b5d13ec72d3739f328574f43de380($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	
	
</div>

' .
recuperer_fond( 'flooter' , array('id_article' => @$Pile[0]['id_article'] ), array('compil'=>array('squelettes/article.html','html_776b5d13ec72d3739f328574f43de380','',56,$GLOBALS['spip_lang'])), ''));

	return analyse_resultat_skel('html_776b5d13ec72d3739f328574f43de380', $Cache, $page, 'squelettes/article.html');
}
?>