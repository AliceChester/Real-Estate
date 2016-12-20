<?php

/*
 * Squelette : squelettes-dist/rubrique.html
 * Date :      Sun, 03 Apr 2011 15:43:52 GMT
 * Compile :   Sun, 23 Oct 2011 13:46:29 GMT
 * Boucles :   _ariane, _m2, _miniplan, _sous_rubriques, _articles, _documents_joints, _breves, _syndic, _sites, _mots, _principale
 */ 

/* BOUCLE hierarchie  */

 function BOUCLE_arianehtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $id = '_ariane';
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
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_ariane',26,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
' &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80')) .
'</a>');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE boucle  */

 function BOUCLE_m2html_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_miniplan']);
	$t0 = (($t1 = BOUCLE_miniplanhtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
                    <ul>
                        ' . $t1 . '
                    </ul>
                    ') :
		'');
	$Numrows['_miniplan'] = ($save_numrows);
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_miniplanhtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_miniplan';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
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
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_miniplan',64,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                        <li>
                            <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a>
                            ' .
BOUCLE_m2html_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
                        </li>
                        ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_sous_rubriqueshtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_sous_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
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
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_sous_rubriques',55,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                <li>
                    <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a>

                    
                    ' .
(($t1 = BOUCLE_miniplanhtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
                    <ul>
                        ' . $t1 . '
                    </ul>
                    ') :
		'') .
'

                </li>
                ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_articleshtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
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
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_articles',37,$GLOBALS['spip_lang']));
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
                <li>
                    ' .
filtrer('image_graver',filtrer('image_reduire',(strlen($logo=
((!is_array($l = quete_logo('id_article', 'ON', $Pile[$SP]['id_article'],'', 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')))?'<a href="' .vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) . '">' . $logo . '</a>':''),'150','100')) .
'
                    <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a></h3>
                    <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(recuperer_fond('modeles/lesauteurs', array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true, 'compil'=>array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_articles',42,$GLOBALS['spip_lang'])), '')))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur') .
	' ') . $t1) :
		'') .
'</small>
                </li>
                ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE documents  */

 function BOUCLE_documents_jointshtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'documents';
	static $id = '_documents_joints';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet=\'article\')
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet=\'breve\')
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet=\'rubrique\')
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet=\'forum\')
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = \'publie\' AND aa.date<='.sql_quote(quete_date_postdates()).') OR bb.statut = \'publie\' OR rr.statut = \'publie\' OR ff.statut=\'publie\')', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_documents_joints',85,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:bouton_telecharger');
	$l2 = _T('public/spip/ecrire:info_document');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (
'
                <li>
                    <strong><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
'" title="' .
$l1 .
'" type="' .
interdire_scripts($Pile[$SP]['mime_type']) .
'">' .
interdire_scripts(((($a = traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) OR (!is_array($a) AND strlen($a))) ? $a : $l2)) .
'</a></strong>
                    <small>(' .
interdire_scripts($Pile[$SP]['type_document']) .
(($t1 = strval(interdire_scripts(taille_en_octets($Pile[$SP]['taille']))))!=='' ?
		(' &ndash; ' . $t1) :
		'') .
')</small>
                    ' .
interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))) .
'
                </li>
                ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breveshtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.id_breve",
		"breves.date_heure AS date",
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
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_breves',101,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_breves']['compteur_boucle'] = 0;
	$Numrows['_breves']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_breves']) ? $Pile[0]['debut_breves'] : _request('debut_breves');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_breves'] = quete_debut_pagination('id_breve',$Pile[0]['@id_breve'] = substr($debut_boucle,1),5,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_breves']['total']-1)/(5))*(5)));
	$fin_boucle = min(($tout ? $Numrows['_breves']['total'] : $debut_boucle + 4), $Numrows['_breves']['total'] - 1);
	$Numrows['_breves']['grand_total'] = $Numrows['_breves']['total'];
	$Numrows['_breves']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_breves']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_breves']['compteur_boucle'] = $debut_boucle;
	
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_breves']['compteur_boucle']++;
		if ($Numrows['_breves']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_breves']['compteur_boucle']-1 > $fin_boucle) break;
		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
                <li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a></li>
                ');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndic_articles  */

 function BOUCLE_syndichtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_syndic';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array("syndic_articles.id_syndic_article");
	static $select = array("syndic_articles.date",
		"syndic_articles.url",
		"syndic_articles.titre");
	static $orderby = array('syndic_articles.date DESC');
	$where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('=', 'syndic_articles.id_syndic', sql_quote($Pile[$SP]['id_syndic'],'','int')), 
			array('<', 'LEAST((UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(syndic_articles.date))/86400,
	TO_DAYS(NOW())-TO_DAYS(syndic_articles.date),
	DAYOFMONTH(NOW())-DAYOFMONTH(syndic_articles.date)+30.4368*(MONTH(NOW())-MONTH(syndic_articles.date))+365.2422*(YEAR(NOW())-YEAR(syndic_articles.date)))', "180"), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '0,3';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_syndic',122,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
                        <li><a href="' .
vider_url($Pile[$SP]['url']) .
'" class="spip_out">' .
interdire_scripts(safehtml($Pile[$SP]['titre'])) .
'</a></li>
                        ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_siteshtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
		"syndic.date",
		"syndic.nom_site",
		"syndic.url_site");
	static $orderby = array('syndic.nom_site');
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_sites',115,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
                <li>
					<a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) .
'</a>
                    ' .
(($t1 = BOUCLE_syndichtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
                    <ul>
                        ' . $t1 . '
                    </ul>
                    ') :
		'') .
'
                </li>
                ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE mots  */

 function BOUCLE_motshtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_mots',157,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" rel="tag">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</a></li>
                ');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_principalehtml_9851671fc63546ec3c1322f67adf9e7f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_principale';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.descriptif",
		"rubriques.date");
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
		 array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_principale',4,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
(($t1 = strval(interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)))) .
'</title>
' .
(($t1 = strval(interdire_scripts(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], $Pile[$SP]['texte'], intval('150'), $connect)))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/rubrique.html\',\'html_9851671fc63546ec3c1322f67adf9e7f\',\'\',10,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<link rel="alternate" type="application/rss+xml" title="' .
_T('public/spip/ecrire:syndiquer_rubrique') .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_rubrique',$Pile[$SP]['id_rubrique'])) .
'" />
</head>

<body class="page_rubrique">
<div id="page">

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/rubrique.html\',\'html_9851671fc63546ec3c1322f67adf9e7f\',\'\',19,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

	
    <div id="conteneur">
    <div id="contenu">
    
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site') .
'</a>' .
BOUCLE_arianehtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(couper(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

        <div class="cartouche">
            ' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'200','200')) .
'
            <h1 class="' .
classe_boucle_crayon('rubriques','titre',$Pile[$SP]['id_rubrique']).' ">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</h1>
            ' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		((	'<p><small>' .
	_T('public/spip/ecrire:dernier_ajout') .
	' : ') . $t1 . '.</small></p>') :
		'') .
'
        </div>

        ' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, cs_nettoie(cs_decoupe(propre(cs_onglets($Pile[$SP]['texte']),$connect)))))))!=='' ?
		((	'<div class="' .
	classe_boucle_crayon('rubriques','texte',$Pile[$SP]['id_rubrique']).' chapo">') . $t1 . '</div>') :
		'') .
'

        
        ' .
(($t1 = BOUCLE_articleshtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu articles">
            ' .
		filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, false, '', '', array()) .
		'
            <h2>' .
		_T('public/spip/ecrire:articles_rubrique') .
		'</h2>
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
        </div>
        ')) :
		((	'

        
        ' .
	(($t2 = BOUCLE_sous_rubriqueshtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
        <div class="menu rubriques">
            <h2>' .
			_T('public/spip/ecrire:sous_rubriques') .
			'</h2>
            <ul>
                ') . $t2 . '
            </ul>
            </div>
        ') :
			'') .
	'

        '))) .
'


        
        ' .
(($t1 = BOUCLE_documents_jointshtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu" id="documents_joints">
            <h2>' .
		_T('public/spip/ecrire:titre_documents_joints') .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'

        
        ' .
(($t1 = BOUCLE_breveshtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            ' .
		filtre_pagination_dist($Numrows["_breves"]["grand_total"],
 		'_breves',
		isset($Pile[0]['debut_breves'])?$Pile[0]['debut_breves']:intval(_request('debut_breves')),
		5, false, '', '', array()) .
		'
            <h2>' .
		_T('public/spip/ecrire:breves') .
		'</h2>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_breves"]["grand_total"],
 		'_breves',
		isset($Pile[0]['debut_breves'])?$Pile[0]['debut_breves']:intval(_request('debut_breves')),
		5, true, '', '', array())))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
        </div>
        ')) :
		'') .
'

        
        ' .
(($t1 = BOUCLE_siteshtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            <h2>' .
		_T('public/spip/ecrire:sur_web') .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'

        
        ' .
executer_balise_dynamique('FORMULAIRE_SITE',
	array($Pile[$SP]['id_rubrique']),
	array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_principale',136,$GLOBALS['spip_lang'])) .
'

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	_T('public/spip/ecrire:info_notes') .
	'</h2>') . $t1 . '</div>') :
		'') .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-rubriques') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/rubrique.html\',\'html_9851671fc63546ec3c1322f67adf9e7f\',\'\',147,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array('squelettes-dist/rubrique.html','html_9851671fc63546ec3c1322f67adf9e7f','_principale',149,$GLOBALS['spip_lang'])) .
'

    </div><!--#navigation-->
    
    
    <div id="extra">

        
        ' .
(($t1 = BOUCLE_motshtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            <h2>' .
		_T('public/spip/ecrire:mots_clefs') .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'
        
    </div><!--#extra-->

	
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc-pied') . ', array(\'skel\' => ' . argumenter_squelette('squelettes-dist/rubrique.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'squelettes-dist/rubrique.html\',\'html_9851671fc63546ec3c1322f67adf9e7f\',\'\',171,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

</div><!--#page-->
</body>
</html>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes-dist/rubrique.html
// Temps de compilation total: 378.332 ms
//

function html_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 3600"); ?>' .
BOUCLE_principalehtml_9851671fc63546ec3c1322f67adf9e7f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_9851671fc63546ec3c1322f67adf9e7f', $Cache, $page, 'squelettes-dist/rubrique.html');
}
?>