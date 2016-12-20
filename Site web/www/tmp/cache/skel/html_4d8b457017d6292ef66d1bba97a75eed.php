<?php

/*
 * Squelette : squelettes/flooter.html
 * Date :      Sat, 08 Oct 2011 16:13:13 GMT
 * Compile :   Fri, 28 Oct 2011 17:43:00 GMT
 * Boucles :   _pan, _menuartbas, _menurubbas
 */ 

/* BOUCLE articles  */

 function BOUCLE_panhtml_4d8b457017d6292ef66d1bba97a75eed(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('squelettes/flooter.html','html_4d8b457017d6292ef66d1bba97a75eed','_pan',5,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
vide($Pile['vars']['article_global'] = $Pile[$SP]['id_article']));
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE articles  */

 function BOUCLE_menuartbashtml_4d8b457017d6292ef66d1bba97a75eed(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_menuartbas';
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
		 array('squelettes/flooter.html','html_4d8b457017d6292ef66d1bba97a75eed','_menuartbas',13,$GLOBALS['spip_lang']));
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
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</a></li>
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE rubriques  */

 function BOUCLE_menurubbashtml_4d8b457017d6292ef66d1bba97a75eed(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_menurubbas';
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
		 array('squelettes/flooter.html','html_4d8b457017d6292ef66d1bba97a75eed','_menurubbas',12,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
' .
BOUCLE_menuartbashtml_4d8b457017d6292ef66d1bba97a75eed($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette squelettes/flooter.html
// Temps de compilation total: 1.915 ms
//

function html_4d8b457017d6292ef66d1bba97a75eed($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
		
		
		
' .
BOUCLE_panhtml_4d8b457017d6292ef66d1bba97a75eed($Cache, $Pile, $doublons, $Numrows, $SP) .
'

<div id="flooter">
<div class="menu menu-bas">
	<ul>
' .
BOUCLE_menurubbashtml_4d8b457017d6292ef66d1bba97a75eed($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</ul>
</div>
<div class="copyright"><a href="http://realestatecaretaking.com/spip.php?' .
choisir_traduction(array('en' => 'article1','fr' => 'article3')) .
'&cimobile=bberry">' .
choisir_traduction(array('en' => 'Mobile and tablet version','fr' => 'Version mobile et tablette')) .
'</a><br/>
 © COPYRIGHT Real Estate Caretaking - <a class="simple" href="spip.php?article27">Mentions légales</a></div>
</div>
</div>



</td>
</tr>

</tbody>
</table>

</body>
</html>
');

	return analyse_resultat_skel('html_4d8b457017d6292ef66d1bba97a75eed', $Cache, $page, 'squelettes/flooter.html');
}
?>