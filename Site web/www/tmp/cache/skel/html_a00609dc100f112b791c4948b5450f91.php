<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/ckeditor4spip.js.html
 * Date :      Wed, 28 Sep 2011 21:24:07 GMT
 * Compile :   Sun, 23 Oct 2011 13:13:33 GMT
 * Boucles :   _options, _si
 */ 

/* BOUCLE POUR  */

 function BOUCLE_optionshtml_a00609dc100f112b791c4948b5450f91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'pour';
	static $table = 'POUR';
	static $id = '_options';
	static $from = array('POUR' => 'POUR');
	static $type = array();
	static $groupby = array();
	static $select = array("POUR.valeur");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(
			array('tableau', interdire_scripts(ck_enliste(lire_config('ckeditor/contextes',null,false),'1'))));
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('plugins/ckeditor-spip-plugin/ckeditor4spip.js.html','html_a00609dc100f112b791c4948b5450f91','_options',279,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'pour')) {

		$t0 .= (
'<option value="' .
table_valeur(forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']),'0') .
'">' .
replace(table_valeur(forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']),'1'),'(\\.|#)') .
'</option>');
	}
	@sql_free($result, 'pour');
	}
	return $t0;
}



/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_a00609dc100f112b791c4948b5450f91(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/ckeditor-spip-plugin/ckeditor4spip.js.html','html_a00609dc100f112b791c4948b5450f91','_si',2,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('ckeditor:loading');
	$l2 = _T('ckeditor:use_spip_editor');
	$l3 = _T('ckeditor:loading');
	$l4 = _T('ckeditor:use_ckeditor');
	$l5 = _T('ckeditor:spipification');
	$l6 = _T('ckeditor:version_preferee');
	$l7 = _T('ckeditor:use_ckeditor');
	$l8 = _T('ckeditor:use_spip_editor');
	$l9 = _T('ckeditor:changer_de_contexte');
	$l10 = _T('ckeditor:sans_contexte');
	$l11 = _T('public/spip/ecrire:bouton_enregistrer');
	$l12 = _T('public/spip/ecrire:bouton_enregistrer');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
var ckeDataProcessor;

var sansConversion = ' .
interdire_scripts(((lire_config('ckeditor/conversion',null,false) == 'aucune') ? 'true':'false')) .
' ;
if (sansConversion) {
	spipDataProcessor={
		toDataFormat:function(html, fixForBody){
			if(fixForBody) {
				return ckeDataProcessor.toDataFormat(html,fixForBody).replace(/<head[^>]*>(.|\\r|\\n)*<\\/head>/, \'\').replace(/[\\r\\n\\s]*<body[^>]*>[\\r\\n\\s]*/, \'\').replace(/[\\r\\n\\s]*<\\/body>[\\r\\n\\s]*/, \'\');
			} else {
				return ckeDataProcessor.toDataFormat(html,fixForBody) ;
			}
		},
		toHtml:function(data, fixForBody){
			if(fixForBody) {
				return \'<html><head><title></title></head><body>\'+ckeDataProcessor.toHtml(data.replace(/<html>/,\'\').replace(/<\\/html>/, \'\'),fixForBody)+\'</body></html>\' ;
			} else {
				return ckeDataProcessor.toHtml(data,fixForBody);
			}
		}
	};
} else {
	spipDataProcessor={
		toDataFormat:function(html, fixForBody){
			return $.ajax({url:CKEDITOR.spipurl+\'?page=ckspip_convert\',data:{text_area:html.replace(/<span\\s+data-scayt[^>]*>\\s*(.*?)\\s*<\\/span>/g,\'$1\'),cvt:\'html2spip\',fix:fixForBody},global:false,type:\'POST\',dataType:\'text\',async:false}).responseText;
		},
		toHtml:function(data, fixForBody){
			return $.ajax({url:CKEDITOR.spipurl+\'?page=ckspip_convert\',data:{text_area:data.replace(/<span\\s+data-scayt[^>]*>\\s*(.*?)\\s*<\\/span>/g,\'$1\'),cvt:\'spip2html\',fix:fixForBody},global:false,type:\'POST\',dataType:\'text\',async:false}).responseText;
		}
	};
}

function htmldecode(s){
	return $(\'<div/>\').html(s).text();
}

function HideSpipUI(editor_id){
	if($(editor_id).size()==0){return;}
	var crayon=editor_id.match(/^(#crayon_\\d+)\\s/);
	if(crayon) {
		stack[editor_id].crborder=$(crayon[1]+\' .formulaire_spip\').css(\'border\');
		stack[editor_id].crbg=$(crayon[1]+\' .formulaire_spip\').css(\'background-color\');
		$(crayon[1]+\' .formulaire_spip\')
			.css(\'border\',\'none\')
			.css(\'background-color\',\'white\');
	}
	var item=$(editor_id).parents().find(\'.edition\');
	if (editor_id.match(/^#formulaire_forum\\s/)) {
		stack[editor_id].fobd=item.css(\'border\');
		stack[editor_id].fobg=item.css(\'background\');
		item.css(\'border\',\'none\');
		item.css(\'background\',\'none\');
	}
	item
		.find(\'.spip_barre\').css(\'display\',\'none\').end()
		.find(\'.explication\').css(\'display\',\'none\').end()
		.find(\'.markItUpHeader\').css(\'display\',\'none\').end()
		.find(\'.markItUpTabs\').css(\'display\',\'none\').end()
		.find(\'.markItUpPreview\').css(\'display\',\'none\').end()
		.find(\'.markItUpFooter\').css(\'display\',\'none\');
}

function ShowSpipUI(editor_id){
	if($(editor_id).size()==0){return;}
	if (! stack[editor_id].nobarre) {
		$(editor_id).removeClass(\'no_barre\') ;
		barrebouilles_editor(editor_id) ;
		stack[editor_id].nobarre = false ;
	}
	var item=$(editor_id).parents().find(\'.edition\');
	if (editor_id.match(/^#formulaire_forum\\s/)) {
		item.css(\'border\',stack[editor_id].fobd);
		item.css(\'background\',stack[editor_id].fobg);
	}
	var crayon=editor_id.match(/^(#crayon_\\d+)\\s/);
    if(crayon) {
		$(crayon[1]+\' .formulaire_spip\')
			.css(\'border\',stack[editor_id].crborder)
			.css(\'background-color\',stack[editor_id].crbg);
	}
	if(item.find(\'.markItUpTabs .previsuVoir\').hasClass(\'on\')){
		item.find(\'.markItUpTabs\').css(\'display\',\'\').end()
			.find(\'.markItUpPreview\').css(\'display\',\'block\').end()
			.find(\'.markItUpEditor\').css(\'display\',\'none\');
	}else{
		item.find(\'.spip_barre\').css(\'display\',\'\').end()
			.find(\'.explication\').css(\'display\',\'\').end()
			.find(\'.markItUpHeader\').css(\'display\',\'\').end()
			.find(\'.markItUpTabs\').css(\'display\',\'\').end()
			.find(\'.markItUpFooter\').css(\'display\',\'\').end()
			.find(\'.markItUpEditor\').css(\'display\',\'block\').end()
			.find(\'.markItUpPreview\').css(\'display\',\'none\');
	}
}
' .
'
var stack=[];

function SpipEditor2CKEditor(editor_id){
	if ($(editor_id).size()==0) {return;}
	$(\'#swapeditor_\'+stack[editor_id].ndx)
		.attr(\'disabled\',true)
		.attr(\'title\',htmldecode(\'' .
$l1 .
'\'))
		.find(\'img\')
			.attr(\'src\',\'' .
interdire_scripts(url_absolue(find_in_path('images/searching.gif'))) .
'\');
	$(editor_id).attr(\'disabled\',true);
	var EdConfig={};$.extend(EdConfig,CKEDITOR.ckConfig) ;
	EdConfig.toolbar=\'Spip\'+stack[editor_id].tb;
	HideSpipUI(editor_id);
	$(editor_id).ckeditor(function(){
		stack[editor_id].n=\'#\'+this.container.getId();
' .
'
		stack[editor_id].dw=$(\'.cadre-formulaire-editer\').width()-$(stack[editor_id].n).width() ;
		
		var cke=$(editor_id).ckeditorGet() ;

		cke.on(\'resize\', function(e) {
			$(\'.cadre-formulaire-editer\').width($(stack[editor_id].n).width()+stack[editor_id].dw);
		});

		contexteChange(editor_id);
		$(editor_id).attr(\'disabled\',\'\');
		$(\'#swapeditor_\'+stack[editor_id].ndx)
			.attr(\'title\',htmldecode(\'' .
$l2 .
'\'))
			.find(\'img\')
				.attr(\'src\',\'' .
interdire_scripts(url_absolue(find_in_path('images/ckeditor_spip.png'))) .
'\')
			.end()
			.attr(\'disabled\',\'\');
		cke.setReadOnly(false);
	},EdConfig);
}

function barrebouilles_editor(editor_id){ 
// basée sur \'barrebouilles\' du fichier : porte_plume/porte_plume_start.js.html
// (c) Matthieu Marcillaud
	// fonction generique appliquee aux classes CSS :
	// inserer_barre_forum, inserer_barre_edition, inserer_previsualisation
	if ($(editor_id).hasClass(\'inserer_barre_forum\'))
		$(editor_id).barre_outils(\'forum\');
	if ($(editor_id).hasClass(\'inserer_barre_edition\'))
		$(editor_id).barre_outils(\'edition\');
	if ($(editor_id).hasClass(\'inserer_previsualisation\'))
		$(editor_id).barre_previsualisation();
	// fonction specifique aux formulaires de SPIP :
	// barre de forum
	if ($(editor_id).hasClass(\'textarea_forum\'))
		$(editor_id).barre_outils(\'forum\');
	if($(editor_id).attr(\'name\').match(/^(texte|\\w+_texte)$/)) {
		if (!editor_id.match(/\\b#formulaire_forum\\b/)) {
			$(editor_id).barre_outils(\'edition\').barre_previsualisation();
		}
		' .
(($t1 = strval(interdire_scripts((((lire_config('forums_afficher_barre',null,false) == 'non')) ?'' :' '))))!=='' ?
		($t1 . '
		else {
			$(editor_id).barre_outils(\'forum\');
		}') :
		'') .
'
	}
}

function CKEditor2SpipEditor(editor_id){
	if($(editor_id).size()==0){return;}
	$(\'#swapeditor_\'+stack[editor_id].ndx)
		.attr(\'disabled\',true)
		.attr(\'title\',htmldecode(\'' .
$l1 .
'\'))
		.find(\'img\')
			.attr(\'src\',\'' .
interdire_scripts(url_absolue(find_in_path('images/searching.gif'))) .
'\');
	$(editor_id)
		.attr(\'disabled\',true)
		.css(\'display\',\'block\')
		.ckeditorGet().destroy();
	ShowSpipUI(editor_id);
	$(\'#swapeditor_\'+stack[editor_id].ndx)
		.attr(\'title\',htmldecode(\'' .
$l4 .
'\'))
		.find(\'img\')
			.attr(\'src\',\'' .
interdire_scripts(url_absolue(find_in_path('images/ckeditor.png'))) .
'\')
		.end()
		.attr(\'disabled\',\'\');
	$(editor_id)
		.attr(\'disabled\',\'\');
}

function SwapEditor(editor_id){
	if($(editor_id).size()==0){return;}
	try{
		CKEditor2SpipEditor(editor_id);
	}catch(e){
		SpipEditor2CKEditor(editor_id);
	}
}

function contexteChange(editor_id){
	if($(editor_id).size()==0){return;}
	if($("#contexte_"+stack[editor_id].ndx).length){
		var contexte=$("#contexte_"+stack[editor_id].ndx).val().match(/^([\\.#])(.*)$/);
		if(stack[editor_id].ctx){
			if(stack[editor_id].ctx[1]=="#"){' .
'
				$(stack[editor_id].n+\' iframe\').contents().find(\'body\').attr(\'id\',\'\');
			}else{
				$(stack[editor_id].n+\' iframe\').contents().find(\'body\').removeClass(stack[editor_id].ctx[2]);
			}
		}
		stack[editor_id].ctx=contexte;
		if(contexte){
			if(contexte[1]=="#"){' .
'
				$(stack[editor_id].n+\' iframe\').contents().find(\'body\').attr(\'id\', contexte[2]);
			}else{' .
'
				$(stack[editor_id].n+\' iframe\').contents().find(\'body\').addClass(contexte[2]);
			}
		}
	}
}

function cke_crayon_submit(editor_id){
	if($(editor_id).size()==0){return;}
	try{' .
'
		$(editor_id).ckeditorGet().updateElement();
	}catch(e){ /* rien */ }
	$(this).parents(\'.formulaire_crayon\').submit();
}

function fullInitCKEDITOR(editor_ids){
	if(!editor_ids)editor_ids=[["textarea[name=texte]","Full"]];
	initCKEDITOR();
	CKEDITOR.ckConfig.on={
		\'pluginsLoaded\':function(ev){ckeDataProcessor=ev.editor.dataProcessor;ev.editor.dataProcessor=spipDataProcessor;}
	};
	if (!CKEDITOR.fullInitDone) {
		CKEDITOR.on(\'dialogDefinition\',function(ev){
			var dialogName=ev.data.name,
				dialogDefinition=ev.data.definition;
			if(dialogName===\'about\'){
				var aboutTab=dialogDefinition.getContents(\'tab1\');
				aboutTab.add({
					\'type\':\'html\',
					\'html\':\'<div style="padding:0 10px 10px 10px;">' .
$l5 .
'</div>\'
				});
			}
			var advTab=dialogDefinition.getContents(\'advanced\');
			if(advTab){
				var advClasses=advTab.get(\'advCSSClasses\');
				if(advClasses){
					advClasses[\'default\']=\'spip\';
				}
			}
		});
		for(var plugin in CKEDITOR.ckConfig.loadExtraPlugins){
			CKEDITOR.plugins.addExternal(plugin, CKEDITOR.ckConfig.loadExtraPlugins[plugin]);
		}
		CKEDITOR.fullInitDone=true;
	}
	for(var id in editor_ids){
		var editor_id=editor_ids[id][0], editor_tb=editor_ids[id][1], crayon=editor_ids[id][2];
			
' .
(($t1 = strval(interdire_scripts(((lire_config('ckeditor/ignoreversion',null,false)) ?'' :' '))))!=='' ?
		($t1 . (	'
		if(CKEDITOR.version<CKEDITOR.ckpreferedversion){
			var pref=\'' .
	$l6 .
	'\';
			$(editor_id).after(
				\'<div class="erreur_message">\'+pref.replace(/%2/,CKEDITOR.ckpreferedversion).replace(/%1/,CKEDITOR.version)+\'</div>\'
			);
		}
')) :
		'') .
'
		var ndx=$(\'[id^=cke_cpt_]\').size(),buttons=\'\';
		while ($(\'[id=cke_cpt_\'+ndx+\']\').size()>0) { ndx++ ; }
		stack[editor_id]={\'n\':null,\'w\':null,\'wr\':null,\'ctx\':null,\'crayons\':0,\'ndx\':ndx,\'tb\':editor_tb};
		stack[editor_id].nobarre = ($(editor_id).hasClass(\'no_barre\') || CKEDITOR.ckeditmode == \'spip\') ;
		if (! stack[editor_id].nobarre)
			$(editor_id).addClass(\'no_barre\'); // on fait en sorte de désactiver l\'affichage du porte plume avant qu\'il n\'entre en scène ...

		$(editor_id).after(\'<span id="cke_cpt_\'+ndx+\'"></span>\');
		
		if(CKEDITOR.ckeditmode!=\'ckeditor-exclu\'){
			buttons=buttons +
				\'<button style="margin-right:15px;width:40px;height:24px;" type="button" id="swapeditor_\'+ndx+\'" onclick="javascript:SwapEditor(\\\'\'+editor_id+\'\\\');" title="\' 
				+htmldecode(CKEDITOR.ckeditmode==\'spip\'?\'' .
$l4 .
'\':\'' .
$l2 .
'\') 
				+\'"><img src="' .
interdire_scripts(url_absolue(find_in_path('images/ckeditor.png'))) .
'"/></button>\';
		}


' .
(($t1 = BOUCLE_optionshtml_a00609dc100f112b791c4948b5450f91($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'		buttons=buttons+\'<span style="padding-right:5px;">' .
		$l9 .
		'</span>\'
			+\'<select id="contexte_\'+ndx+\'" name="contexte_\'+ndx+\'" onchange="contexteChange(\\\'\'+editor_id+\'\\\');" style="width:33%;"><option value="" selected>' .
		$l10 .
		'</option>') . $t1 . '</select>\';') :
		'') .
';
		if(buttons)
			$(editor_id).before(\'<div id="cke_buttons_\'+ndx+\'" style="clear:both;width:100%;height:24px;margin:2px 0 5px 0;padding:0;"><a name="cke_buttons_ancre_\'+ndx+\'"></a>\'+buttons+\'</div>\');

' .
'
		if(crayon){
			$(\'#\'+crayon+\' .crayon-submit\')
				.after(\'<button id="save" style=\\\'background:url("' .
interdire_scripts(url_absolue(find_in_path('images/ok.png'))) .
'") no-repeat scroll left top transparent;\\\' onclick="javascript:return cke_crayon_submit(\\\'\'+editor_id+\'\\\');" title="' .
$l11 .
'">' .
$l11 .
'</button>\')
				.remove();' .
'
		}

	}
	if(CKEDITOR.ckeditmode!=\'spip\'){
		for(var id in editor_ids){
			SpipEditor2CKEditor(editor_ids[id][0]);
		}
	}

	$("div[ondblclick^=barre_inserer]").each(function(){
		var spip_dblclick=$(this).attr(\'ondblclick\'),
			str_dblclick=""+spip_dblclick;
			params=str_dblclick.match(/barre_inserer\\(\\s*"(.*)"\\s*,\\s*\\$\\("(.*)"\\)/);
		if((params!=null) && params[1] && params[2]){' .
'
			var insert_text=params[1],insert_html=null,
				doc=insert_text.match(/^(<|&lt;|&#60;|\\u003c)([a-zA-Z]*)(\\d*)(.*)(>|&gt;|&#62;|\\u003e)$/);
			if(doc){
				var doc_url=$.trim($.ajax({
						url: CKEDITOR.spipurl+\'?page=ckdoc&id=\'+doc[3],
						async: false,' .
'
						dataType:\'text\'
					}).responseText),
					alignement=doc[4].match(/(.*)\\|(left|center|right)(|\\|(.*))/),style=\'\',align=\'\';
				if(alignement){
					if(alignement[2]==\'left\'){
						align=" align=\'left\'";
					}else if(alignement[2]==\'right\'){
						align=" align=\'right\'";
					}else if(alignement[2]==\'center\'){
						align=" align=\'middle\'";
						style="display:block;margin-left:auto;margin-right:auto;";
					}
				}
				if(CKEDITOR.ckConfig.vignette>0){
					style=style+"max-width:"+CKEDITOR.ckConfig.vignette+"px;max-height:"+CKEDITOR.ckConfig.vignette+"px;";
				}
				style=(style?" style=\'"+style+"\'":\'\');
				insert_html="<img src=\'"+doc_url+"?docid="+doc[3]+"&doctype="+doc[2]+"\' alt=\'"+doc[2]+doc[3]+doc[4]+"\'"+align+style+" />";
			}
			$(this)
				.attr(\'ondblclick\',null)
				.dblclick(function(){
					try{
						if(insert_html){
							$(params[2]).ckeditorGet().insertHtml(insert_html);
						}else if(insert_text){
							$(params[2]).ckeditorGet().insertText(insert_text);
						}
					}catch(e){
						spip_dblclick();
					}
				});
		}
	});
}
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/ckeditor4spip.js.html
// Temps de compilation total: 352.761 ms
//

function html_a00609dc100f112b791c4948b5450f91($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-type: text/javascript' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
BOUCLE_sihtml_a00609dc100f112b791c4948b5450f91($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_a00609dc100f112b791c4948b5450f91', $Cache, $page, 'plugins/ckeditor-spip-plugin/ckeditor4spip.js.html');
}
?>