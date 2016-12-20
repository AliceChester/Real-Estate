<?php

/*
 * Squelette : plugins/auto/crayons/modeles/uploader_liste.html
 * Date :      Sun, 25 Sep 2011 18:00:08 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:49 GMT
 * Boucles :   _d
 */ 

/* BOUCLE documents  */

 function BOUCLE_dhtml_d1e770ace8dc3f556c646a7944c67b94(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_d';
	static $from = array('documents' => 'spip_documents','L1' => 'spip_documents_liens');
	static $type = array();
	static $groupby = array();
	static $select = array("documents.id_document");
	static $orderby = array('documents.id_document DESC');
	$where = 
			array(
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')));
	static $join = array('L1' => array('documents','id_document'));
	static $limit = '0,10';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/auto/crayons/modeles/uploader_liste.html','html_d1e770ace8dc3f556c646a7944c67b94','_d',31,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$t0 .= (
'
<li>' .

	((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' :
	recuperer_fond('modeles/uploader_item', array('id_document' => $Pile[$SP]['id_document'] ,'lang' => $GLOBALS["spip_lang"] ,'id_document'=>$Pile[$SP]['id_document'],'id'=>$Pile[$SP]['id_document'],'recurs'=>(++$recurs)), array('compil'=>array('plugins/auto/crayons/modeles/uploader_liste.html','html_d1e770ace8dc3f556c646a7944c67b94','_d',32,$GLOBALS['spip_lang']), 'trim'=>true), ''))
 .
'</li>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/auto/crayons/modeles/uploader_liste.html
// Temps de compilation total: 71.040 ms
//

function html_d1e770ace8dc3f556c646a7944c67b94($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<style>
.uploader {border:solid red 1px;}
.uploader.hover {border:dotted red 1px;}
.uploader li {border solid transparent 3px;}
.uploader li.loading {border:dotted red 3px;}
.uploader li.ok {border:solid green 3px;}

#uploader' .
@$Pile[0]['id_article'] .
' {
	position: absolute;
	top: 10px;
	right: -180px;
	width: 170px;
	height: 100%;
	max-height: 600px;
	overflow: auto;
	overflow-x: hidden;
	background: #eee;
	border: solid #ccc 1px;
}

#uploader' .
@$Pile[0]['id_article'] .
'.ferme {
	width: 30px; height: 15px; overflow-x:hide;overflow-y:hide;overflow:hide;
}
</style>


<div id="uploader' .
@$Pile[0]['id_article'] .
'" class="ferme">
<i>Glissez un document ou une image dans cette zone pour l\'ajouter à l\'article.</i>

<ul id="uploader_liste" >
' .
(($t1 = BOUCLE_dhtml_d1e770ace8dc3f556c646a7944c67b94($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
' .
		(($t3 = strval(interdire_scripts('')))!=='' ?
				('<li class="pagination">' . $t3 . '</li>') :
				'') .
		'
')) :
		'') .
'
</ul>


</div>


<script>
// activer l\'uploader
(function($) {
	var url = \'spip.php?action=crayons_upload&type=article&id=' .
@$Pile[0]['id_article'] .
'\';

	$(\'textarea.crayon-active,#uploader' .
@$Pile[0]['id_article'] .
'\')
	.html5Uploader({
		name: \'upss\',
		postUrl: url,
		onClientLoadStart: function(e, file) {
			file.mark = \'up\'+Math.ceil(10000000*Math.random());
			$(\'<li>lecture de \'+file.name+\'...</li>\')
			.addClass(\'loading\')
			.attr(\'id\', file.mark)
			.prependTo(\'#uploader_liste\')
			;
		},
		onClientLoad: function(e, file) {
			$(\'#uploader' .
@$Pile[0]['id_article'] .
'\')
			.removeClass(\'hover\');
		},
		onServerProgress: function(e,file) {
			var percent = \'\';
			if(e.lengthComputable)
				percent = \'\'+Math.ceil(100*e.loaded/e.total)+\'%\';
			$(\'#\'+file.mark)
			.html(\'envoi de \'+file.name+\' vers le serveur... \'+percent);
		},
		onServerReadyStateChange: function(e,file) {
			if (e.target.responseText) {
				// traiter la reponse du serveur
				// todo: la passer en JSON si on veut
				$(\'#\'+file.mark)
				.html(e.target.responseText);
			}
		},
		onServerLoad: function(e,file) {
			$(\'#\'+file.mark)
			.removeClass(\'loading\')
			.addClass(\'ok\');
		},
	})
	.bind("dragenter dragover", function() {
		$(this).addClass(\'hover\');
		$(\'#uploader' .
@$Pile[0]['id_article'] .
'\')
		.removeClass(\'ferme\');
	})
	.bind("dragleave", function() {
		$(this).removeClass(\'hover\');
		$(\'#uploader' .
@$Pile[0]['id_article'] .
'\')
		.addClass(\'ferme\');
	})
	.bind("drop", function(e) {
		$(this)
		.removeClass(\'hover\');
		$(\'#uploader' .
@$Pile[0]['id_article'] .
'\')
		.removeClass(\'ferme\');
	})
	.addClass(\'uploader\')
	;
	$(\'#uploader' .
@$Pile[0]['id_article'] .
'\')
	.hover(function() {
		$(this).removeClass(\'ferme\');
	}, function() {
		$(this).addClass(\'ferme\');
	});

})(cQuery);

</script>

<!--
/*

$(function(){
	var fileTemplate="<div id=\\"{{id}}\\">";
	fileTemplate+="<div class=\\"progressbar\\"></div>";
	fileTemplate+="<div class=\\"preview\\"></div>";
	fileTemplate+="<div class=\\"filename\\">{{filename}}</div>";
	fileTemplate+="</div>";
	function slugify(text){
		text=text.replace(/[^-a-zA-Z0-9,&\\s]+/ig,\'\');
		text=text.replace(/-/gi,"_");
		text=text.replace(/\\s/gi,"-");
		return text;
	}

	$("#dropbox")
	.html5Uploader({
		onClientLoadStart:function(e,file){
			var upload=$("#upload");
			if(upload.is(":hidden")){
				upload.show();
			}
			upload.append(
				fileTemplate
					.replace(/{{id}}/g, slugify(file.name))
					.replace(/{{filename}}/g,file.name)
			);
		},
		onClientLoad:function(e,file){
			$("#"+slugify(file.name))
			.find(".preview")
			.append("<img src=\\""+e.target.result+"\\" alt=\\"\\">");
		},
		onServerLoadStart:function(e,file){
			$("#"+slugify(file.name))
			.find(".progressbar")
			.progressbar({value:0});
		},
		onServerProgress:function(e,file){
			if(e.lengthComputable){
				var percentComplete=(e.loaded/e.total)*100;
				$("#"+slugify(file.name))
				.find(".progressbar")
					.progressbar({value:percentComplete});
			}
		},
		onServerLoad:function(e,file){
			$("#"+slugify(file.name))
			.find(".progressbar")
				.progressbar({value:100});
		}
	});

	$(".download")
	.mousedown(function(){
		$(this).css({
			"background-image":"url(\'images/download-clicked.png\')"
		});
	})
	.mouseup(function(){
		$(this).css({
			"background-image":"url(\'images/download.png\')"
		});
	});


});


*/
-->');

	return analyse_resultat_skel('html_d1e770ace8dc3f556c646a7944c67b94', $Cache, $page, 'plugins/auto/crayons/modeles/uploader_liste.html');
}
?>