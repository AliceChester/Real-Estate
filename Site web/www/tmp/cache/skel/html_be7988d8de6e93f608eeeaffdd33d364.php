<?php

/*
 * Squelette : squelettes/sommaire.html
 * Date :      Sun, 25 Sep 2011 21:46:47 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:29 GMT
 * Boucles :   _texte, _traductionss, _tradarticle
 */ 

/* BOUCLE articles  */

 function BOUCLE_textehtml_be7988d8de6e93f608eeeaffdd33d364(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_texte';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.texte",
		"articles.lang",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'articles.id_article', "1"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/sommaire.html','html_be7988d8de6e93f608eeeaffdd33d364','_texte',56,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<h2>Real Estate Caretaking</h2><br/>
' .
interdire_scripts(cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect)))) .
'


');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_traductionsshtml_be7988d8de6e93f608eeeaffdd33d364(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('squelettes/sommaire.html','html_be7988d8de6e93f608eeeaffdd33d364','_traductionss',75,$GLOBALS['spip_lang']));
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

 function BOUCLE_tradarticlehtml_be7988d8de6e93f608eeeaffdd33d364(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'articles.id_article', "1"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/sommaire.html','html_be7988d8de6e93f608eeeaffdd33d364','_tradarticle',74,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	' .
BOUCLE_traductionsshtml_be7988d8de6e93f608eeeaffdd33d364($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/sommaire.html
// Temps de compilation total: 44.155 ms
//

function html_be7988d8de6e93f608eeeaffdd33d364($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
recuperer_fond( 'header' , array('id_article' => '1' ), array('compil'=>array('squelettes/sommaire.html','html_be7988d8de6e93f608eeeaffdd33d364','',2,$GLOBALS['spip_lang'])), '') .
'<?php
include_spip(\'inc/cookie\');
// Nécessaire pour que la fonction spip_setcookie soit définie :
// Elle est dans ecire/inc/cookie.php (ligne 21)

$langues = explode(",",$HTTP_ACCEPT_LANGUAGE);

foreach($langues as $langue) {
	$langue = strtolower(substr(chop($langue),0,2));

	if ($langue == "fr") {
	spip_setcookie(\'spip_lang\', \'fr\');

		header("location:' .
vider_url(urlencode_1738(generer_url_entite('3', 'article', '', '', true))) .
'");
		die();
	} else if ($langue == "en") {
	spip_setcookie(\'spip_lang\', \'en\');

		header("location:' .
vider_url(urlencode_1738(generer_url_entite('1', 'article', '', '', true))) .
'");
		die();
	}
	
//	echo "<li>$langue";
}
spip_setcookie(\'spip_lang\', \'fr\');
header("location:' .
vider_url(urlencode_1738(generer_url_entite('1', 'article', '', '', true))) .
'");


?>





<!--on renvoie vers la rubrique secteur de langue choisie en preference par le navigateur -->




<div id="background" onLoad="iPhoneAlert();BlackBerryAlert();MobileAlert();">

<div class="accès">	' .
choisir_traduction(array('fr' => '<a href="http://clients.realestatecaretaking.com/index.php?lang=1"><img class="multi" src="/IMG/acces-client.png" alt="Accès Clients" /></a></div>
						','en' => '<a href="http://clients.realestatecaretaking.com/index.php?lang=2"><img class="multi" src="/IMG/client-access.png" alt="Client Access" /></a>')) .
'
	<div class="surfacetxt">
		<div id="mcs_container">
			<div class="customScrollBox">
				<div class="container">
					<div class="content">


' .
BOUCLE_textehtml_be7988d8de6e93f608eeeaffdd33d364($Cache, $Pile, $doublons, $Numrows, $SP) .
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
BOUCLE_tradarticlehtml_be7988d8de6e93f608eeeaffdd33d364($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	
	
</div>

' .
recuperer_fond( 'flooter' , array('id_article' => '1' ), array('compil'=>array('squelettes/sommaire.html','html_be7988d8de6e93f608eeeaffdd33d364','',85,$GLOBALS['spip_lang'])), ''));

	return analyse_resultat_skel('html_be7988d8de6e93f608eeeaffdd33d364', $Cache, $page, 'squelettes/sommaire.html');
}
?>