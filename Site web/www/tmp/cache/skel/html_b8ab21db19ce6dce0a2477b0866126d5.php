<?php

/*
 * Squelette : squelettes-dist/forum.html
 * Date :      Sun, 03 Apr 2011 15:43:48 GMT
 * Compile :   Tue, 03 May 2016 05:28:42 GMT
 * Boucles :   _ariane_site, _contexte_site, _ariane_rubrique, _contexte_rubrique, _ariane_breve, _contexte_breve, _ariane_article, _contexte_article, _contexte_forum, _article, _breve, _rubrique, _syndic, _forum_parent
 */ 

/* BOUCLE hierarchie  */

 function BOUCLE_ariane_sitehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = '';
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_ariane_site';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_ariane_site',45,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_contexte_sitehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_contexte_site';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
		"syndic.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_syndic', sql_quote($Pile[0]['id_syndic'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_contexte_site',44,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            ' .
BOUCLE_ariane_sitehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site') .
'">' .
interdire_scripts(couper(typo(supprimer_numero(@$Pile[0]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE hierarchie  */

 function BOUCLE_ariane_rubriquehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = '';
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_ariane_rubrique';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_ariane_rubrique',38,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_contexte_rubriquehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_contexte_rubrique';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_contexte_rubrique',37,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            ' .
BOUCLE_ariane_rubriquehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_ariane_brevehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_ariane_breve';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_ariane_breve',31,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_contexte_brevehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_contexte_breve';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_rubrique",
		"breves.id_breve",
		"breves.titre",
		"breves.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_breve', sql_quote($Pile[0]['id_breve'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_contexte_breve',30,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            ' .
BOUCLE_ariane_brevehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE hierarchie  */

 function BOUCLE_ariane_articlehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_ariane_article';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_ariane_article',23,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_contexte_articlehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_contexte_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.titre",
		"articles.id_rubrique",
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
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_contexte_article',22,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            ' .
BOUCLE_ariane_articlehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(couper(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect),'80')) .
'</a>
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_contexte_forumhtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_contexte_forum';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_forum', sql_quote($Pile[0]['id_forum'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_contexte_forum',56,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'">' .
interdire_scripts(couper(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)),'80')) .
'</a>
            ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articlehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.titre",
		"articles.date",
		"articles.texte",
		"articles.descriptif",
		"articles.chapo",
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
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_article',77,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            ' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','100')) .
'
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></h3>
            <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_article',77,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1) :
		'') .
'</small>
            ' .
(($t1 = strval(interdire_scripts(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))!=='' ?
		('<div class="introduction">' . $t1 . '</div>') :
		'') .
'
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_brevehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breve';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_breve",
		"breves.titre",
		"breves.date_heure AS date",
		"breves.texte",
		"breves.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_breve', sql_quote($Pile[0]['id_breve'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_breve',84,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            ' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_breve', 'ON', $Pile[$SP]['id_breve'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','100')) .
'
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></h3>
            <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</small>
            ' .
(($t1 = strval(interdire_scripts(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect))))!=='' ?
		('<div class="introduction">' . $t1 . '</div>') :
		'') .
'
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriquehtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_rubrique',91,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></h3>
            ' .
(($t1 = strval(interdire_scripts(cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect))))))!=='' ?
		('<div class="texte">' . $t1 . '</div>') :
		'') .
'
            ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_syndichtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_syndic';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
		"syndic.url_site",
		"syndic.nom_site",
		"syndic.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_syndic', sql_quote($Pile[0]['id_syndic'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_syndic',96,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            <h3><a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site') .
'">' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a></h3>
            ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
		('<div class="texte">' . $t1 . '</div>') :
		'') .
'
            ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forums  */

 function BOUCLE_forum_parenthtml_b8ab21db19ce6dce0a2477b0866126d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forum_parent';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_forum', sql_quote($Pile[0]['id_forum'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','_forum_parent',71,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:par_auteur');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'">' .
interdire_scripts(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></h3>
            <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(typo(supprimer_numero($Pile[$SP]['nom']),"TYPO",$connect))))!=='' ?
		((	', ' .
	$l1 .
	' ') . $t1) :
		'') .
'</small>
            ' .
(($t1 = strval(interdire_scripts(lignes_longues(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect)))))!=='' ?
		('<div class="introduction">' . $t1 . '</div>') :
		'') .
'
            ');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/forum.html
// Temps de compilation total: 102.038 ms
//

function html_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
_T('public/spip/ecrire:poster_message') .
' - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/forum.html\',\'html_b8ab21db19ce6dce0a2477b0866126d5\',\'\',5,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
<meta name="robots" content="none" />
</head>

<body class="page_forum">
<div id="page">

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/forum.html\',\'html_b8ab21db19ce6dce0a2477b0866126d5\',\'\',13,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	
    <div id="conteneur">
    <div id="contenu">
    
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site') .
'</a>
    
            ' .
(($t1 = BOUCLE_contexte_articlehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . '
            ') :
		((	'
    
            ' .
	(($t2 = BOUCLE_contexte_brevehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((	'
    
            ' .
		(($t3 = BOUCLE_contexte_rubriquehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				$t3 :
				((	'
    
            ' .
			(($t4 = BOUCLE_contexte_sitehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					$t4 :
					('
    
            ')) .
			'
            '))) .
		'
            '))) .
	'
            '))) .
'
    
            ' .
BOUCLE_contexte_forumhtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
'
    
            &gt; <strong class="on">' .
_T('public/spip/ecrire:poster_message') .
'</strong>
            
        </div><!--#hierarchie-->

        <div class="cartouche">
            <h1>' .
_T('public/spip/ecrire:poster_message') .
'</h1>
        </div>

        <div class="menu articles">
            <h2>' .
_T('public/spip/ecrire:en_reponse') .
'</h2>
        
            ' .
(($t1 = BOUCLE_forum_parenthtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
            
            ' .
	BOUCLE_articlehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            ' .
	BOUCLE_brevehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            ' .
	BOUCLE_rubriquehtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            ' .
	BOUCLE_syndichtml_b8ab21db19ce6dce0a2477b0866126d5($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            '))) .
'
        
        </div>

        ' .
executer_balise_dynamique('FORMULAIRE_FORUM',
	array(@$Pile[0]['id_rubrique'],@$Pile[0]['id_forum'],@$Pile[0]['id_article'],@$Pile[0]['id_breve'],@$Pile[0]['id_syndic'],@$Pile[0]['ajouter_mot'],@$Pile[0]['ajouter_groupe'],@$Pile[0]['afficher_texte']),
	array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','',105,$GLOBALS['spip_lang'])) .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rubriques') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/forum.html\',\'html_b8ab21db19ce6dce0a2477b0866126d5\',\'\',114,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/forum.html','html_b8ab21db19ce6dce0a2477b0866126d5','',116,$GLOBALS['spip_lang'])) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
	&nbsp;
	</div><!--#extra-->

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes-dist/forum.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/forum.html\',\'html_b8ab21db19ce6dce0a2477b0866126d5\',\'\',126,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!--#page-->
</body>
</html>
');

	return analyse_resultat_skel('html_b8ab21db19ce6dce0a2477b0866126d5', $Cache, $page, 'squelettes-dist/forum.html');
}
?>