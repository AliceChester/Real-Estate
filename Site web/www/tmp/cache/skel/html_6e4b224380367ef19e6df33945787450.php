<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/modeles/inc-documents-tous.html
 * Date :      Wed, 28 Sep 2011 21:24:26 GMT
 * Compile :   Fri, 15 Nov 2013 11:04:35 GMT
 * Boucles :   _alldoc
 */ 

/* BOUCLE documents  */

 function BOUCLE_alldochtml_6e4b224380367ef19e6df33945787450(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'document';
	$in[]= 'image';
	static $table = 'documents';
	static $id = '_alldoc';
	static $from = array('documents' => 'spip_documents');
	static $type = array();
	static $groupby = array();
	static $select = array("documents.id_document",
		"documents.extension",
		"documents.fichier",
		"documents.titre");
	$orderby = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(documents.mode,' . sql_quote($in) . ')')));
	$where = 
			array(
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), sql_in('documents.mode',sql_quote($in)));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/modeles/inc-documents-tous.html','html_6e4b224380367ef19e6df33945787450','_alldoc',1,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_alldoc']['compteur_boucle'] = 0;
	$Numrows['_alldoc']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut_alldoc']) ? $Pile[0]['debut_alldoc'] : _request('debut_alldoc');
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut_alldoc'] = quete_debut_pagination('id_document',$Pile[0]['@id_document'] = substr($debut_boucle,1),16,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_alldoc']['total']-1)/(16))*(16)));
	$fin_boucle = min(($tout ? $Numrows['_alldoc']['total'] : $debut_boucle + 15), $Numrows['_alldoc']['total'] - 1);
	$Numrows['_alldoc']['grand_total'] = $Numrows['_alldoc']['total'];
	$Numrows['_alldoc']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_alldoc']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_alldoc']['compteur_boucle'] = $debut_boucle;
	
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_alldoc']['compteur_boucle']++;
		if ($Numrows['_alldoc']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_alldoc']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
	<div class=\'fichier\'>
		<div class=\'fichier-apercu\'>
			<a onclick="SelectFile(\'' .
interdire_scripts(parametre_url(url_absolue((match($Pile[$SP]['extension'],'(jpg|gif|png)') ? interdire_scripts(get_spip_doc($Pile[$SP]['fichier'])):extraire_attribut(filtrer('image_graver', filtrer('image_reduire',quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'150','50')),'src'))),'docid',$Pile[$SP]['id_document'])) .
'\');">' .
interdire_scripts((match($Pile[$SP]['extension'],'(jpg|gif|png)') ? interdire_scripts(filtrer('image_graver',filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'150','50'))):filtrer('image_graver',filtrer('image_reduire',quete_logo_document(quete_document($Pile[$SP]['id_document'], ''), '', '', '', 0, 0, ''),'150','50')))) .
'</a>
 		</div>
		<div class=\'fichier-nom\'>' .
interdire_scripts(((($a = typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) OR (!is_array($a) AND strlen($a))) ? $a : interdire_scripts(basename(get_spip_doc($Pile[$SP]['fichier']))))) .
'</div>
	</div>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/modeles/inc-documents-tous.html
// Temps de compilation total: 177.031 ms
//

function html_6e4b224380367ef19e6df33945787450($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_alldochtml_6e4b224380367ef19e6df33945787450($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div id="fichiers">
	' .
		filtre_pagination_dist($Numrows["_alldoc"]["grand_total"],
 		'_alldoc',
		isset($Pile[0]['debut_alldoc'])?$Pile[0]['debut_alldoc']:intval(_request('debut_alldoc')),
		16, false, '', '', array()) .
		'
	<div>
	' .
		(($t3 = strval(interdire_scripts(((entites_html((@$Pile[0]['article']),true)) ?' ' :''))))!=='' ?
				($t3 . (	'<a class=\'ckbutton\' href=\'' .
			interdire_scripts(parametre_url(parametre_url(parametre_url(parametre_url(parametre_url(generer_url_public('select_documents'),'article',interdire_scripts(entites_html((@$Pile[0]['article']),true))),'CKEditor',interdire_scripts(entites_html((@$Pile[0]['CKEditor']),true))),'CKEditorFuncNum',interdire_scripts(entites_html((@$Pile[0]['CKEditorFuncNum']),true))),'langCode',interdire_scripts(entites_html((@$Pile[0]['langCode']),true))),'connect','')) .
			'\' title=\'' .
			_T('ckeditor:documents_article') .
			'\'>' .
			_T('ckeditor:article') .
			'</a>')) :
				'') .
		'
	' .
		(($t3 = strval(interdire_scripts(((entites_html((@$Pile[0]['rubrique']),true)) ?' ' :''))))!=='' ?
				($t3 . (	'<a class=\'ckbutton\' href=\'' .
			interdire_scripts(parametre_url(parametre_url(parametre_url(parametre_url(parametre_url(generer_url_public('select_documents'),'rubrique',interdire_scripts(entites_html((@$Pile[0]['rubrique']),true))),'CKEditor',interdire_scripts(entites_html((@$Pile[0]['CKEditor']),true))),'CKEditorFuncNum',interdire_scripts(entites_html((@$Pile[0]['CKEditorFuncNum']),true))),'langCode',interdire_scripts(entites_html((@$Pile[0]['langCode']),true))),'connect','')) .
			'\' title=\'' .
			_T('ckeditor:documents_rubrique') .
			'\'>' .
			_T('ckeditor:rubrique') .
			'</a>')) :
				'') .
		'
	' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_alldoc"]["grand_total"],
 		'_alldoc',
		isset($Pile[0]['debut_alldoc'])?$Pile[0]['debut_alldoc']:intval(_request('debut_alldoc')),
		16, true, '', '', array())))!=='' ?
				('| ' . $t3 . ' | ') :
				'') .
		'
	</div>
') . $t1 . '
</div>
') :
		((	'
	<div><a class=\'ckbutton\' ref=\'' .
	interdire_scripts(parametre_url(parametre_url(parametre_url(parametre_url(parametre_url(generer_url_public('select_documents'),'article',interdire_scripts(entites_html((@$Pile[0]['article']),true))),'CKEditor',interdire_scripts(entites_html((@$Pile[0]['CKEditor']),true))),'CKEditorFuncNum',interdire_scripts(entites_html((@$Pile[0]['CKEditorFuncNum']),true))),'langCode',interdire_scripts(entites_html((@$Pile[0]['langCode']),true))),'connect','')) .
	'\'>' .
	_T('ckeditor:article') .
	'</a></div>
	' .
	
	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/inc-aucun-document', array('lang' => $GLOBALS["spip_lang"] ,'recurs'=>(++$recurs)), array('compil'=>array('plugins/ckeditor-spip-plugin/modeles/inc-documents-tous.html','html_6e4b224380367ef19e6df33945787450','',20,$GLOBALS['spip_lang']), 'trim'=>true), ''))
))) .
'
');

	return analyse_resultat_skel('html_6e4b224380367ef19e6df33945787450', $Cache, $page, 'plugins/ckeditor-spip-plugin/modeles/inc-documents-tous.html');
}
?>