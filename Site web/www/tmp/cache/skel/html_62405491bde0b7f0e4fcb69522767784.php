<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/select_documents.html
 * Date :      Wed, 28 Sep 2011 21:24:10 GMT
 * Compile :   Fri, 15 Nov 2013 11:04:34 GMT
 * Boucles :   _t2, _t1, _si
 */ 

/* BOUCLE CONDITION  */

 function BOUCLE_t2html_62405491bde0b7f0e4fcb69522767784(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'condition';
	static $table = 'CONDITION';
	static $id = '_t2';
	static $from = array('CONDITION' => 'CONDITION');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(($test=interdire_scripts((entites_html(sinon(@$Pile[0]['rubrique'],'XXX'),true) == 'XXX')))?array('tableau','1:1'):'');
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/select_documents.html','html_62405491bde0b7f0e4fcb69522767784','_t2',22,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('modeles/inc-documents-articles') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'plugins/ckeditor-spip-plugin/select_documents.html\',\'html_62405491bde0b7f0e4fcb69522767784\',\'\',23,$GLOBALS[\'spip_lang\']),"ajax"=>true), _request("connect"));
?'.'>
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}



/* BOUCLE CONDITION  */

 function BOUCLE_t1html_62405491bde0b7f0e4fcb69522767784(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'condition';
	static $table = 'CONDITION';
	static $id = '_t1';
	static $from = array('CONDITION' => 'CONDITION');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(($test=interdire_scripts((entites_html((@$Pile[0]['type']),true) == 'tout')))?array('tableau','1:1'):'');
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/select_documents.html','html_62405491bde0b7f0e4fcb69522767784','_t1',19,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
	' .

'<'.'?php echo recuperer_fond( ' . argumenter_squelette('modeles/inc-documents-tous') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'plugins/ckeditor-spip-plugin/select_documents.html\',\'html_62405491bde0b7f0e4fcb69522767784\',\'\',20,$GLOBALS[\'spip_lang\']),"ajax"=>true), _request("connect"));
?'.'>
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}



/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_62405491bde0b7f0e4fcb69522767784(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'condition';
	static $table = 'CONDITION';
	static $id = '_si';
	static $from = array('CONDITION' => 'CONDITION');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(($test=interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['statut'] : "") < '2'))))?array('tableau','1:1'):'');
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/select_documents.html','html_62405491bde0b7f0e4fcb69522767784','_si',3,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
<!DOCTYPE html PUBLIC \'-//W3C//DTD XHTML 1.0 Strict//EN\' \'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\'>
<html>
	<head>
		<title>' .
_T('ckeditor:selection_document_spip') .
'</title>
		<script type="text/javascript">  
			function SelectFile(url) {  
				var parent_window = (window.parent == window) ? window.opener : window.parent ;  
				parent_window.CKEDITOR.tools.callFunction( <?php echo intval(_request(\'CKEditorFuncNum\')); ?>, url, \'\');  
				window.close();  
			}  
		</script>  
		<link rel="stylesheet" type="text/css" href="' .
interdire_scripts(find_in_path('css/filebrowser.css')) .
'" />
	</head>
<body>
	<form name=\'selectdoc\' action=\'#\' method=\'post\'>
' .
(($t1 = BOUCLE_t1html_62405491bde0b7f0e4fcb69522767784($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	(($t2 = BOUCLE_t2html_62405491bde0b7f0e4fcb69522767784($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((	'
	' .
		
'<'.'?php echo recuperer_fond( ' . argumenter_squelette('modeles/inc-documents-rubriques') . ', array_merge('.var_export($Pile[0],1).',array(\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')), array("compil"=>array(\'plugins/ckeditor-spip-plugin/select_documents.html\',\'html_62405491bde0b7f0e4fcb69522767784\',\'\',25,$GLOBALS[\'spip_lang\']),"ajax"=>true), _request("connect"));
?'.'>
'))) .
	'
'))) .
'
	</form>
</body>
</html>
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/select_documents.html
// Temps de compilation total: 142.077 ms
//

function html_62405491bde0b7f0e4fcb69522767784($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 10"); ?>' .
'<'.'?php header("' . (	'Content-type: text/html' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
BOUCLE_sihtml_62405491bde0b7f0e4fcb69522767784($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_62405491bde0b7f0e4fcb69522767784', $Cache, $page, 'plugins/ckeditor-spip-plugin/select_documents.html');
}
?>