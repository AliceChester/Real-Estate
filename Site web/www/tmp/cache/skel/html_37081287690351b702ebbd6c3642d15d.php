<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/bberry/rubrique.html
 * Date :      Mon, 26 Sep 2011 21:51:24 GMT
 * Compile :   Sat, 08 Oct 2016 15:42:09 GMT
 * Boucles :   _articles, _re, _test_expose, _sous_rubriques, _rubriques, _documents_joints, _breves, _syndic, _sites, _mots, _principale
 */ 

/* BOUCLE articles  */

 function BOUCLE_articleshtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_articles',79,$GLOBALS['spip_lang']));
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
                                       
<a href="' .
interdire_scripts(generer_url_public('article',(	'id_article=' .
	$Pile[$SP]['id_article']))) .
'"><h3>' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</h3></a>
                                   
</li>
                
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE boucle  */

 function BOUCLE_rehtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_sous_rubriques']);
	$t0 = (($t1 = BOUCLE_sous_rubriqueshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			
<ul>
				
' . $t1 . '
			
</ul>
			
') :
		'');
	$Numrows['_sous_rubriques'] = ($save_numrows);
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_test_exposehtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_test_expose';
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
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_parent'],'','int')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_test_expose',138,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? ' ' : '');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_sous_rubriqueshtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_sous_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_parent",
		"rubriques.id_rubrique",
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
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_sous_rubriques',134,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (($t1 = BOUCLE_test_exposehtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
					
<li><a href="' .
		interdire_scripts(generer_url_public('rubrique',(	'id_rubrique=' .
			$Pile[$SP]['id_rubrique']))) .
		'"' .
		(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
				(' class="' . 'on' . '"') :
				'') .
		'>' .
		interdire_scripts(couper(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80')) .
		'</a>' .
		BOUCLE_rehtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP) .
		'	</li>
				
')) :
		'');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_rubriqueshtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_rubriques';
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
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'],'','int')), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_rubriques',113,$GLOBALS['spip_lang']));
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
'><h3>' .
interdire_scripts(couper(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80')) .
'</h3></a>

			
     
     
</B_articles>

   
</B_test_expose_article>

' .
(($t1 = BOUCLE_sous_rubriqueshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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



/* BOUCLE documents  */

 function BOUCLE_documents_jointshtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_documents_joints',164,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('public/spip/ecrire:info_document');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (
'
                
		<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
'" type="' .
interdire_scripts($Pile[$SP]['mime_type']) .
'"><h3>
			' .
interdire_scripts(((($a = traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) OR (!is_array($a) AND strlen($a))) ? $a : $l1)) .
'
			<small>(<span>' .
interdire_scripts($Pile[$SP]['type_document']) .
(($t1 = strval(interdire_scripts(taille_en_octets($Pile[$SP]['taille']))))!=='' ?
		(' &ndash; ' . $t1) :
		'') .
'</span>)</small>
			' .
interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))) .
'
		</h3></a></li>
                
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE breves  */

 function BOUCLE_breveshtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.id_breve",
		"breves.titre",
		"breves.date_heure AS date",
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
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_breves',192,$GLOBALS['spip_lang']));
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
                
<li><a href="' .
interdire_scripts(generer_url_public('breve',(	'id_breve=' .
	$Pile[$SP]['id_breve']))) .
'"><h3>' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(' &ndash; ' . $t1) :
		'') .
'</h3></a></li>
				
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndic_articles  */

 function BOUCLE_syndichtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_syndic';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic_articles.date",
		"L1.url_site",
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
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_syndic',234,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
                        
<li><a href="' .
calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
'" class="spip_out"><h3>' .
interdire_scripts(safehtml($Pile[$SP]['titre'])) .
'</h3></a></li>
                        
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE syndication  */

 function BOUCLE_siteshtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_sites',219,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_sites']['compteur_boucle'] = 0;
	$Numrows['_sites']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_sites']) ? $Pile[0]['debut_sites'] : _request('debut_sites');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_sites'] = quete_debut_pagination('id_syndic',$Pile[0]['@id_syndic'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_sites']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_sites']['total'] : $debut_boucle + 9), $Numrows['_sites']['total'] - 1);
	$Numrows['_sites']['grand_total'] = $Numrows['_sites']['total'];
	$Numrows['_sites']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_sites']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_sites']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_sites']['compteur_boucle']++;
		if ($Numrows['_sites']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_sites']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
                
<li>
					
<a href="' .
interdire_scripts(generer_url_public('site',(	'id_syndic=' .
	$Pile[$SP]['id_syndic']))) .
'"><h3>' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) .
'</h3></a>
                    
' .
(($t1 = BOUCLE_syndichtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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

 function BOUCLE_motshtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote(@$Pile[0]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_mots',278,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
                
<li><a href="' .
interdire_scripts(generer_url_public('mot',(	'id_mot=' .
	$Pile[$SP]['id_mot']))) .
'" rel="tag"><h3>' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect))) .
'</h3></a></li>
            
');
	}
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_principalehtml_37081287690351b702ebbd6c3642d15d(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_principale',7,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-head') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/cimobile/squel_mobiles/bberry/rubrique.html\',\'html_37081287690351b702ebbd6c3642d15d\',\'\',20,$GLOBALS[\'spip_lang\'])), _request("connect"));
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

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-entete') . ', array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/cimobile/squel_mobiles/bberry/rubrique.html\',\'html_37081287690351b702ebbd6c3642d15d\',\'\',38,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>




	
<div id="lign-som">
	<div id="lign-droite">
		<div id="centre">
		' .
interdire_scripts(couper(traiter_doublons_documents($doublons, typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)),'80')) .
'
		</div>
		<div id="droite"><div class="button"> 
		<a href="' .
interdire_scripts(generer_url_public('recherche')) .
'">' .
_T('spip:info_rechercher') .
'</a>

		</div></div>
	</div>
	<div id="back"><div id="gauche">
	<a href="javascript:history.back()">Retour</a>
	</div></div>
</div>


<div class="cartouche">
            
' .
filtrer('image_graver',filtrer('image_reduire',
((!is_array($l = quete_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']), 0))) ? '':
 ("<img class=\"spip_logos\" alt=\"\" src=\"$l[0]\"" . $l[2] .  ($l[1] ? " onmouseover=\"this.src='$l[1]'\" onmouseout=\"this.src='$l[0]'\"" : "") . ' />')),'150','150')) .
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

      
<br class="nettoyeur" />  


        
' .
(($t1 = BOUCLE_articleshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        
<div id="group">' .
		_T('public/spip/ecrire:articles') .
		'</div>
<div class="menu articles">
            
' .
		filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, false, '', '', array()) .
		'
                       
<ul>
                
') . $t1 . (	'
            
</ul>
            
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_articles"]["grand_total"],
 		'_articles',
		isset($Pile[0]['debut_articles'])?$Pile[0]['debut_articles']:intval(_request('debut_articles')),
		10, true, '', '', array())))!=='' ?
				('<div id="pagin">' . $t3 . '</div>') :
				'') .
		'
        
</div>
        
')) :
		'') .
'

        





        
' .
(($t1 = BOUCLE_rubriqueshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'

<div id="group">' .
		_T('public/spip/ecrire:sous_rubriques') .
		'</div> 
<div class="menu articles">
     
<ul>

') . $t1 . '

	
</ul>

</div>

') :
		'') .
'        



        
' .
(($t1 = BOUCLE_documents_jointshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        
<div class="menu articles">
	
<div id="group">' .
		_T('public/spip/ecrire:titre_documents_joints') .
		'</div>
            
<ul>
                
') . $t1 . '
            
</ul>
        
</div>
        
') :
		'') .
'

        


        
' .
(($t1 = BOUCLE_breveshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        
<div id="group">' .
		_T('public/spip/ecrire:breves') .
		'</div>		
<div class="menu articles">
            
' .
		filtre_pagination_dist($Numrows["_breves"]["grand_total"],
 		'_breves',
		isset($Pile[0]['debut_breves'])?$Pile[0]['debut_breves']:intval(_request('debut_breves')),
		5, false, '', '', array()) .
		'
                      
<ul>
                
') . $t1 . (	'
           
</ul>
            
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_breves"]["grand_total"],
 		'_breves',
		isset($Pile[0]['debut_breves'])?$Pile[0]['debut_breves']:intval(_request('debut_breves')),
		5, true, '', '', array())))!=='' ?
				('<div id="pagin">' . $t3 . '</div>') :
				'') .
		'
       
</div>
        
')) :
		'') .
'

        


        
' .
(($t1 = BOUCLE_siteshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        
<div id="group">' .
		_T('public/spip/ecrire:sur_web') .
		'</div>		
<div class="menu articles">
   
' .
		filtre_pagination_dist($Numrows["_sites"]["grand_total"],
 		'_sites',
		isset($Pile[0]['debut_sites'])?$Pile[0]['debut_sites']:intval(_request('debut_sites')),
		10, false, '', '', array()) .
		'
          
<ul>
                
') . $t1 . (	'
            
</ul>
  
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_sites"]["grand_total"],
 		'_sites',
		isset($Pile[0]['debut_sites'])?$Pile[0]['debut_sites']:intval(_request('debut_sites')),
		10, true, '', '', array())))!=='' ?
				('<div id="pagin">' . $t3 . '</div>') :
				'') .
		'
        
</div>
        
')) :
		'') .
'

  


        
' .
executer_balise_dynamique('FORMULAIRE_SITE',
	array($Pile[$SP]['id_rubrique']),
	array('plugins/cimobile/squel_mobiles/bberry/rubrique.html','html_37081287690351b702ebbd6c3642d15d','_principale',264,$GLOBALS['spip_lang'])) .
'

        

' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	_T('public/spip/ecrire:info_notes') .
	'</h2>') . $t1 . '</div>') :
		'') .
'

	


    
<div id="conteneur">


  
' .
(($t1 = BOUCLE_motshtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
   
<div id="group">' .
		_T('public/spip/ecrire:mots_clefs') .
		'</div>
   
<div class="menu articles">
                   
<ul>
            
') . $t1 . '
            
</ul>
        
</div>
        
') :
		'') .
'
</div><!--#conteneur-->
    


<div id="conteneur"> 
<div id="group">' .
_T('public/spip/ecrire:rubriques') .
'</div>
<br>
</div><!--#conteneur-->

   
  
' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('inc/inc-rubriques') . ', array(\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '), array("compil"=>array(\'plugins/cimobile/squel_mobiles/bberry/rubrique.html\',\'html_37081287690351b702ebbd6c3642d15d\',\'\',308,$GLOBALS[\'spip_lang\'])), _request("connect"));
?'.'>

<div id="group"></div>


<div class="hfeed" id="conteneur">
  	
<div id="ticket">
	
<div class="menu aticles">
	
<ul>
		
<a rel="contents" href="' .
interdire_scripts(generer_url_public('sommaire')) .
'"><h4>ACCUEIL</h4></a>

					
</ul>

</div>
		

</div><!--#conteneur-->
	
		

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
// Fonction principale du squelette plugins/cimobile/squel_mobiles/bberry/rubrique.html
// Temps de compilation total: 289.305 ms
//

function html_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 3600"); ?>' .
BOUCLE_principalehtml_37081287690351b702ebbd6c3642d15d($Cache, $Pile, $doublons, $Numrows, $SP) .
'





');

	return analyse_resultat_skel('html_37081287690351b702ebbd6c3642d15d', $Cache, $page, 'plugins/cimobile/squel_mobiles/bberry/rubrique.html');
}
?>