<?php

/*
 * Squelette : plugins/cimobile/squel_mobiles/bberry/sommaire.html
 * Date :      Wed, 05 Oct 2011 23:40:18 GMT
 * Compile :   Mon, 24 Oct 2011 01:14:46 GMT
 * Boucles :   _texte
 */ 

/* BOUCLE articles  */

 function BOUCLE_textehtml_cb649554af0bd270671162b417713182(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/cimobile/squel_mobiles/bberry/sommaire.html','html_cb649554af0bd270671162b417713182','_texte',4,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
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


//
// Fonction principale du squelette plugins/cimobile/squel_mobiles/bberry/sommaire.html
// Temps de compilation total: 43.794 ms
//

function html_cb649554af0bd270671162b417713182($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
recuperer_fond( 'header' , array('id_article' => '1' ,
	'lang' => htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) ), array('compil'=>array('plugins/cimobile/squel_mobiles/bberry/sommaire.html','html_cb649554af0bd270671162b417713182','',1,$GLOBALS['spip_lang'])), '') .
BOUCLE_textehtml_cb649554af0bd270671162b417713182($Cache, $Pile, $doublons, $Numrows, $SP) .
'
<div style="width: 100%; height: 2px; background: #BB7700;"></div>
<ul><li><a href="' .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		($t1 . '/?cimobile=web') :
		'') .
choisir_traduction(array('en' => '?lang=en','fr' => '?lang=fr')) .
'">' .
choisir_traduction(array('en' => 'Classic version','fr' => 'Version classique')) .
'</a></li></ul>
<div class="copyright">© COPYRIGHT Real Estate Caretaking - <a class="simple" href="spip.php?article27">Mentions légales</a></div>
</div>
</body>

</html>





');

	return analyse_resultat_skel('html_cb649554af0bd270671162b417713182', $Cache, $page, 'plugins/cimobile/squel_mobiles/bberry/sommaire.html');
}
?>