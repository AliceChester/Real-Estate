<?php

/*
 * Squelette : plugins/auto/crayons/controleurs/article_texte.html
 * Date :      Fri, 20 May 2011 12:00:08 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:49 GMT
 * Boucles :   _a
 */ 

/* BOUCLE articles  */

 function BOUCLE_ahtml_4f1b10c460e70f63596bc281ab5667a8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_a';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.texte",
		"articles.id_article",
		"articles.lang",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'],'','int')), 
			array('REGEXP', 'articles.statut', "'.'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/crayons/controleurs/article_texte.html','html_4f1b10c460e70f63596bc281ab5667a8','_a',7,$GLOBALS['spip_lang']));
	if ($result) {
	lang_select($GLOBALS['spip_lang']);
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		lang_select_public($Pile[$SP]['lang'], '', $Pile[$SP]['titre']);
		$t0 .= (
'
<textarea class="crayon-active" name="' .
interdire_scripts(entites_html((@$Pile[0]['name_texte']),true)) .
'"
 style="width:' .
interdire_scripts(entites_html((@$Pile[0]['largeur']),true)) .
'px; height:' .
interdire_scripts(entites_html((@$Pile[0]['hauteur']),true)) .
'px;' .
interdire_scripts(entites_html((@$Pile[0]['style']),true)) .
'">
' .
entites_html($Pile[$SP]['texte']) .
'</textarea>

' .
interdire_scripts((lire_config('crayons/upload',null,false) ? 
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/uploader_liste', array('id_article' => $Pile[$SP]['id_article'] ,'lang' => $GLOBALS["spip_lang"] ,'id_article'=>$Pile[$SP]['id_article'],'id'=>$Pile[$SP]['id_article'],'recurs'=>(++$recurs)), array('compil'=>array('plugins/auto/crayons/controleurs/article_texte.html','html_4f1b10c460e70f63596bc281ab5667a8','_a',0,$GLOBALS['spip_lang']), 'trim'=>true), ''))
:'')) .
'
');
	}
	lang_select();
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/crayons/controleurs/article_texte.html
// Temps de compilation total: 10.230 ms
//

function html_4f1b10c460e70f63596bc281ab5667a8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
BOUCLE_ahtml_4f1b10c460e70f63596bc281ab5667a8($Cache, $Pile, $doublons, $Numrows, $SP) .
'

');

	return analyse_resultat_skel('html_4f1b10c460e70f63596bc281ab5667a8', $Cache, $page, 'plugins/auto/crayons/controleurs/article_texte.html');
}
?>