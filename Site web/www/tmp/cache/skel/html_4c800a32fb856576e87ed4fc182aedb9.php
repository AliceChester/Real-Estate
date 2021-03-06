<?php

/*
 * Squelette : ../plugins/auto/couteau_suisse/exec/admin_couteau_suisse_head.html
 * Date :      Tue, 27 Jul 2010 09:37:12 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:47 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette ../plugins/auto/couteau_suisse/exec/admin_couteau_suisse_head.html
// Temps de compilation total: 3.439 ms
//

function html_4c800a32fb856576e87ed4fc182aedb9($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<style type=\'text/css\'>

' .
(($t1 = strval(interdire_scripts(((eval('return '.'defined(\'_SPIP19300\')'.';')) ?'' :' '))))!=='' ?
		($t1 . (	'
	div.cadre-info a { background:none; padding:0; border:0; }
	div.cadre-info { margin-bottom:1em; }
	div.cadre-padding form{ padding:0; margin:0; }
	div.cadre-padding .titrem { background-color:#EEEEEE; color:#000000; }
')) :
		'') .
'
div.cadre_padding form { padding:0; margin:0; }
' .
(($t1 = strval(interdire_scripts(((eval('return '.'defined(\'_SPIP20100\')'.';')) ?' ' :''))))!=='' ?
		($t1 . (	'
	#contenu .cadre_padding .titrem { background-color:#EEEEEE !important; color:#000000 !important; padding:2px !important; }
	#contenu .cadre_padding { padding:6px !important; }
')) :
		'') .
'
.cs_hidden { display:none; }

div.cs-cadre{ padding:0.5em; margin:1px; width=100%; border:1px solid #666666; }
div.cs-cadre h3 { margin:0.2em 0; border-bottom:1px solid #666666; }
div.cs_infos { overflow:hidden; }
div.cs_infos p { margin:0.3em 1em 0.3em 0; padding:0; }
div.cs_infos h3.titrem { border-bottom:solid 1px; font-weight:bold; display:block; }
div.cs_infos legend { font-weight:bold; }
div.cs_infos fieldset {	margin:.8em 4em .5em 4em; }
div.cs_infos fieldset fieldset { border:0; margin:0 0 0 4em; padding:0.3em; }
div.cs_infos fieldset>div { margin:0; }
div.cs_infos sup { font-size:85%; font-variant:normal; vertical-align:super; }
div.cs_infos hr { border:0; border-top:1px solid #67707F; }
div.cs_infos img { border:0; }
div.cs_infos div.cs_bouton { margin-top: 0; text-align: right; }
div.cs_infos div.cs_modif_ok { font-weight:bold; color:green; margin:0.4em; text-align:center; }
div.cs_infos div.cs_menu_outil { text-align:right; font-size:85%; margin-bottom:0.8em; }
div.cs_infos div.cs_details_outil { font-size:85%; margin-top:0.8em; border-top:solid 1px; }
div.cs_infos fieldset ul { margin:0; padding:0; }
div.cs_infos fieldset ul li { list-style:none; display:inline; }

div.cs_action_rapide { border:1px dotted; margin-bottom:1em; padding-bottom:0.4em; background-color:#F' .
'0EEEE; }
div.cs_action_rapide select.ar_select { width:auto; display:inline; }
div.cs_action_rapide .ar_edit_info { font-size:85%; font-style:italic; }

.cs_raccourcis {
	list-style-type:none; padding:0; margin: 0; list-style-image: none; list-style-position: outside;
}
.cs_raccourcis b { color:darkRed; }

.conteneur {
	clear:both;
	width:100%;
	margin:0.8em 0 0 0;
	padding:0;
}

a.cs_href {
	font-weight:normal;
}
a.outil_on {
	font-weight:bold;
	border:1px dotted;
}
div.cs_liste {
	float:left;
	width:45%;
}

div.cs_outils {
	clear:both;
	float:none;
	width:100%;
}

div.cs_actifs {
	float:right;
}
div.cs_toggle {
	float:left;
	width:9.6%; /* pour IE6 */
	text-align:center;
	margin:50px 0 0 0;
}

div.categorie {
	margin-top:.6em;
	padding:2px;
	font-weight:bold;
	display:block;
	cursor:pointer;
}
div.categorie span {
	font-size:85%;
}
div.categorie span.light {
	font-weight:normal;
}

.cs_sobre {
	background:transparent none repeat scroll 0% !important;
	border:medium none !important;
	color:#000099 !important;
	display:inline;
	font-size:100%;
	font-weight:normal !important;
	margin:0pt !important;
	padding:0pt !important;
	cursor:pointer;
	text-align:left;
	width:180px;
}

.cs_droite {
	text-align:right;
}
/* classes de description */
.q1 { margin:0 2em; }
.q2 { margin-left:2em; }
.q3 { font-size:85%; }

</style>

<script type="text/javascript"><!--
var cs_selected, cs_descripted;

function set_selected() {
	cs_selected = new Array();
	jQuery(\'a.outil_on\').each( function(i){
		cs_selected[i] = this.id;
	});
	if(cs_selected.length) {
			jQuery(\'div.cs_toggle div\').show();
			jQuery(\'#cs_toggle_p\').html(\'(\'+cs_selected.length+\')\');
		} else jQuery(\'div.cs_toggle div\').hide();
}

function set_categ(id) {
	nb = jQuery(\'#\'+id+\' a.outil_on\').length;
	if(nb>0) jQuery(\'#\'+id).prev().children().removeClass(\'light\');
		else jQuery(\'#\'+id).prev().children().addClass(\'light\');
}

function outils_toggle() {
	if(cs_selected.length>1) {
		msg="' .
cs_javascript(_T('couteauprive:outils_permuter_gras2')) .
'";
		msg=msg.replace(/@nb@/, cs_selected.length);
	} else {
		msg="' .
cs_javascript(_T('couteauprive:outil_permuter')) .
'";
		msg=msg.replace(/@text@/, jQuery(\'a.outil_on\').text());
	}
	if(!confirm(msg)) return false;
	jQuery(\'#cs_selection\').attr(\'value\', cs_selected.join(\',\'));
	jQuery(\'#cs_infos\').html(\'\');
	jQuery(\'.cs_patience\').css(\'display\',\'block\');
	document.csform.submit();
}

// clic sur un outil (fonction egalement utilisee par l\'outil \'maj_auto\')
function cs_href_click(this_, force) {
	var this_id = this_.id.replace(/^href_/,\'\');
	// on s\'en va si l\'outil est deja affiche
	if(!force && cs_descripted==this_id) return false;
	cs_descripted=this_id;
	// on charge la nouvelle description
	jQuery(\'#cs_infos\')
		.css(\'opacity\', \'0.5\')
		.parent()
		.prepend(ajax_image_searching)
		.load(\'' .
interdire_scripts(parametre_url((tester_url_ecrire('charger_description_outil') ?generer_url_ecrire('charger_description_outil')  : ""),'source',interdire_scripts(entites_html((@$Pile[0]['exec']),true)),'&')) .
'&outil=\'+this_id);
	// annulation du clic
	return false;
}

if(window.jQuery) jQuery(function(){
	// decalage a supprimer sur FF2
	if(jQuery.browser.mozilla) jQuery(\'input.cs_sobre\').css(\'margin-left\',\'-3px\');
	
	jQuery(\'div.sous_liste\').each(cs_Categorie2);
	if(window.location.search.match(/cmd=pack/)!=null) 
		jQuery("div.cs_aide a["+cs_sel_jQuery+"href*=\'cmd=pack\']")
			.click( function() { window.location.reload(true); return false; });
	jQuery("div.cs_aide a["+cs_sel_jQuery+"href*=\'cmd=install\']").click( function() { 
		msg="' .
cs_javascript(_T('couteauprive:pack_installer')) .
'\\n\\n' .
cs_javascript(_T('couteauprive:cs_reset2')) .
'";
		return window.confirm(msg.replace(/@pack@/,jQuery(this).text())); 
	});
	jQuery("div.cs_aide a["+cs_sel_jQuery+"href*=\'cmd=resetall\']").click( function() { 
		msg="' .
cs_javascript(_T('couteauprive:cs_reset')) .
'\\n\\n' .
cs_javascript(_T('couteauprive:cs_reset2')) .
'";
		return window.confirm(msg); 
	});

	jQuery(\'div.cs_liste script\').remove();
	// clic sur un titre de categorie
	jQuery(\'div.categorie\').click( function() {
		jQuery(this).children().toggleClass(\'cs_hidden\');
		next = jQuery(this).next();
		next.toggleClass(\'cs_hidden\');
		cs_EcrireCookie(next[0].id, \'+\'+next[0].className, dixans);
		// annulation du clic
		return false;
	})
	.dblclick(function(){
		id = \'#\'+this.nextSibling.id;
		a = jQuery(id+\' a.outil_on\').length;
		b = jQuery(id+\' a.cs_href\').length;
		if(a==b) jQuery(id+\' a.outil_on\').removeClass(\'outil_on\');
		else jQuery(id+\' a.cs_href\').addClass(\'outil_on\');
		jQuery(this).children().addClass(\'cs_hidden\');
		next = jQuery(this).next();
		next.removeClass(\'cs_hidden\');
		cs_EcrireCookie(next[0].id, \'+\'+next[0].className, dixans);
		set_selected();
		set_categ(this.nextSibling.id);
		return false;
	});

	// clic sur un outil
	jQuery(\'a.cs_href\').click( function() {
		jQuery(this).toggleClass(\'outil_on\');
		set_selected();
		set_categ(this.parentNode.id);
		return cs_href_click(this, false);
	})
	.dblclick(function(){
		jQuery(\'a.outil_on\').removeClass(\'outil_on\');
		jQuery(\'div.categorie span\').addClass(\'light\');
		jQuery(this).addClass(\'outil_on\');
		set_selected();
		set_categ(this.parentNode.id);
		outils_toggle();
		return false;
	});
	
	// clic sur le bouton de permutation
	jQuery(\'#cs_toggle_a\').click( function() {
		outils_toggle();
		// annulation du clic
		return false;
	});

	// clic sur le bouton de reset
	jQuery(\'#cs_reset_a\').click( function() {
		jQuery(\'a.outil_on\').removeClass(\'outil_on\');
		jQuery(\'div.cs_toggle div\').hide();
		jQuery(\'div.categorie span\').addClass(\'light\');
		// annulation du clic
		return false;
	});

	// clic sur le bouton \'tous les actifs\'	
	jQuery(\'#cs_tous_a\').click( function() {
		jQuery(\'div.cs_actifs a.cs_href\').addClass(\'outil_on\');
		jQuery(\'div.categorie span\').removeClass(\'light\');
		set_selected();
		// annulation du clic
		return false;
	});

	// masquage/demasquage des blocs <variable> liees a des checkbox
	input_init.apply(document);

	// verifier la version du CS
	jQuery(\'span.cs_version\').load(\'' .
interdire_scripts(parametre_url(parametre_url((tester_url_ecrire('cs_version') ?generer_url_ecrire('cs_version')  : ""),'version',interdire_scripts((@$Pile[0]['cs_version'])),'&'),'force',interdire_scripts((@$Pile[0]['force'])),'&')) .
'\');
	// afficher la boite rss, si elle existe
	jQuery(\'div.cs_boite_rss\').load(\'' .
interdire_scripts(parametre_url((tester_url_ecrire('cs_boite_rss') ?generer_url_ecrire('cs_boite_rss')  : ""),'force',interdire_scripts((@$Pile[0]['force'])),'&')) .
'\');

});

// masquage/demasquage des blocs <variable> liees a des checkbox
// compatibilite Ajax : ajouter this dans jQuery()
var input_init=function(){
	// outil actif
	jQuery(\'.cs_input_checkbox\', this).cs_todo().click(bloc_variables);
	jQuery(\'input.cs_input_checkbox:checked\',this).each(bloc_variables);
	// outil inactif
	jQuery(\'.cs_hidden_checkbox\', this).cs_todo().each(bloc_variables);
}
function bloc_variables(index, domElement) {
//alert(this.name+\' - \'+this.value);
	jQuery(\'.groupe_\'+this.name).addClass(\'cs_hidden\');
	jQuery(\'.valeur_\'+this.name+\'_\'+this.value).removeClass(\'cs_hidden\');
}
if(typeof onAjaxLoad==\'function\') onAjaxLoad(input_init);

// TODO : cookies en jQuery sous SPIP>=2.0 (plugin jquery.cookie.js)

var dixans=new Date;
dixans.setFullYear(dixans.getFullYear()+10);

// ref : http://www.actulab.com/ecrire-les-cookies.php
function cs_EcrireCookie(nom, valeur){
	var argv=cs_EcrireCookie.arguments;
	var argc=cs_EcrireCookie.arguments.length;
	var expires=(argc > 2) ? argv[2] : null;
	var path=(argc > 3) ? argv[3] : null;
	var domain=(argc > 4) ? argv[4] : null;
	var secure=(argc > 5) ? argv[5] : false;
	document.cookie=nom+\'=\'+escape(valeur)+
	((expires==null) ? \'\' : (\'; expires=\'+expires.toGMTString()))+
	((path==null) ? \'\' : (\'; path=\'+path))+
	((domain==null) ? \'\' : (\'; domain=\'+domain))+
	((secure==true) ? \'; secure\' : \'\');
}
function cs_getCookieVal(offset){
	var endstr=document.cookie.indexOf (\';\', offset);
	if(endstr==-1) endstr=document.cookie.length;
	return unescape(document.cookie.substring(offset, endstr)); 
}
function cs_LireCookie(nom){
	var arg=nom+\'=\';
	var alen=arg.length;
	var clen=document.cookie.length;
	var i=0;
	while (i<clen){
		var j=i+alen;
		if(document.cookie.substring(i, j)==arg) return cs_getCookieVal(j);
		i=document.cookie.indexOf(\' \',i)+1;
		if(i==0) break;
	}
	return null; 
}
function cs_EffaceCookie(nom){
	date=new Date;
	date.setFullYear(date.getFullYear()-1);
	cs_EcrireCookie(nom,null,date); 
}

function cs_Categorie2(i,e){
	var c=cs_LireCookie(this.id);
	if(c===null || c.match(\'cs_hidden\')) {
		var j=jQuery(this);
		j.addClass(\'cs_hidden\');
		j.prev().children(\'span.light\').removeClass(\'cs_hidden\');
	}
}
//--></script>
');

	return analyse_resultat_skel('html_4c800a32fb856576e87ed4fc182aedb9', $Cache, $page, '../plugins/auto/couteau_suisse/exec/admin_couteau_suisse_head.html');
}
?>