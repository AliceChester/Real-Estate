<?php

/*
 * Squelette : squelettes/auteur.html
 * Date :      Sun, 12 Jun 2011 11:43:26 GMT
 * Compile :   Sun, 23 Oct 2011 15:51:20 GMT
 * Boucles :   _chapo, _articles, _traductionss, _tradarticle, _principale
 */ 

/* BOUCLE articles  */

 function BOUCLE_chapohtml_dc158b8634dbb66f351e7538048dfe2d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_chapo',8,$GLOBALS['spip_lang']));
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

 function BOUCLE_articleshtml_dc158b8634dbb66f351e7538048dfe2d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.popularite",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.popularite DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('<', 'articles.date', sql_quote(quete_date_postdates())), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_articles',32,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_articles']['compteur_boucle'] = 0;
	$Numrows['_articles']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_articles']) ? $Pile[0]['debut_articles'] : _request('debut_articles');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_articles'] = quete_debut_pagination('id_article',$Pile[0]['@id_article'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_articles']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_articles']['total'] : $debut_boucle + 9), $Numrows['_articles']['total'] - 1);
	$Numrows['_articles']['grand_total'] = $Numrows['_articles']['total'];
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_articles']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_articles']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
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

 function BOUCLE_traductionsshtml_dc158b8634dbb66f351e7538048dfe2d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_traductionss',66,$GLOBALS['spip_lang']));
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

 function BOUCLE_tradarticlehtml_dc158b8634dbb66f351e7538048dfe2d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'articles.id_article', sql_quote(@$Pile[0]['id_article'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_tradarticle',65,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
	' .
BOUCLE_traductionsshtml_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE auteurs  */

 function BOUCLE_principalehtml_dc158b8634dbb66f351e7538048dfe2d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_principale';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.id_auteur",
		"auteurs.nom");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('<=', 'L2.date', sql_quote(quete_date_postdates())), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', sql_quote($Pile[0]['id_auteur'],'','int')));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_principale',2,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:articles_auteur');
	$l2 = _T('public/spip/ecrire:info_notes');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'


<style rel="stylesheet" type="text/css">
  <!--
#background {
' .
BOUCLE_chapohtml_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons, $Numrows, $SP) .
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
    
        

        
            <h2 class="' .
classe_boucle_crayon('auteurs','qui',$Pile[$SP]['id_auteur']).' fn">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']),"TYPO",$connect)) .
'</h2>



        ' .
(($t1 = BOUCLE_articleshtml_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        
            ' .
		filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, false, '', '', array()) .
		'
            <h2>' .
		$l1 .
		' (' .
		(isset($Numrows['_articles']['grand_total'])
			? $Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']) .
		')</h2><br/>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
        
        ')) :
		'') .
'

       

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	$l2 .
	'</h2>') . $t1 . '</div>') :
		'') .
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
BOUCLE_tradarticlehtml_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	
	
</div>

' .
recuperer_fond( 'flooter' , array('lang' => $GLOBALS["spip_lang"] ), array('compil'=>array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','_principale',76,$GLOBALS['spip_lang'])), ''));
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/auteur.html
// Temps de compilation total: 292.819 ms
//

function html_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
recuperer_fond( 'header' , array('lang' => '1' ), array('compil'=>array('squelettes/auteur.html','html_dc158b8634dbb66f351e7538048dfe2d','',1,$GLOBALS['spip_lang'])), '') .
BOUCLE_principalehtml_dc158b8634dbb66f351e7538048dfe2d($Cache, $Pile, $doublons, $Numrows, $SP) .
'

');

	return analyse_resultat_skel('html_dc158b8634dbb66f351e7538048dfe2d', $Cache, $page, 'squelettes/auteur.html');
}
?>