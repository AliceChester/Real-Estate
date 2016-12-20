<?php

/*
 * Squelette : ../plugins/auto/forms_et_tables_2_0/fonds/tables_tous.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Tue, 29 Jul 2014 18:17:29 GMT
 * Boucles :   _rep, _forms
 */ 

/* BOUCLE forms_donnees  */

 function BOUCLE_rephtml_e4a8eac3e5359edad20cd4982b77d022(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in = array();
	$in[]= 'prepa';
	$in[]= 'prop';
	$in[]= 'publie';
	static $table = 'forms_donnees';
	static $id = '_rep';
	static $from = array('forms_donnees' => 'spip_forms_donnees');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	$orderby = array(((!sql_quote($in) OR sql_quote($in)==="''") ? 0 : ('FIELD(forms_donnees.statut,' . sql_quote($in) . ')')));
	$where = 
			array(
			array('=', 'forms_donnees.id_form', sql_quote($Pile[$SP]['id_form'],'','int')), sql_in('forms_donnees.statut',sql_quote($in)), 
			array('=', 'forms_donnees.confirmation', '"valide"'));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../plugins/auto/forms_et_tables_2_0/fonds/tables_tous.html','html_e4a8eac3e5359edad20cd4982b77d022','_rep',18,$GLOBALS['spip_lang']));
	if ($result) {
	$Numrows['_rep']['total'] = @intval(array_shift(sql_fetch($result)));
	$SP++;
	// RESULTATS
	
	@sql_free($result);
	}
	return $t0;
}



/* BOUCLE forms  */

 function BOUCLE_formshtml_e4a8eac3e5359edad20cd4982b77d022(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forms';
	static $id = '_forms';
	static $from = array('forms' => 'spip_forms');
	static $type = array();
	static $groupby = array();
	static $select = array("forms.id_form",
		"forms.type_form",
		"forms.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forms.type_form', sql_quote(interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],''),true)))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../plugins/auto/forms_et_tables_2_0/fonds/tables_tous.html','html_e4a8eac3e5359edad20cd4982b77d022','_forms',3,$GLOBALS['spip_lang']));
	if ($result) {
	
	// COMPTEUR
	$Numrows['_forms']['compteur_boucle'] = 0;
	$Numrows['_forms']['total'] = @intval(sql_count($result));
	$debut_boucle = isset($Pile[0]['debut'.interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true))]) ? $Pile[0]['debut'.interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true))] : _request('debut'.interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true)));
	if(substr($debut_boucle,0,1)=='@'){
		$debut_boucle = $Pile[0]['debut'.interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true))] = quete_debut_pagination('id_form',$Pile[0]['@id_form'] = substr($debut_boucle,1),10,$result,'');
		if (!sql_seek($result,0,'')){
			@sql_free($result,'');
			$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
		}
	}
	$debut_boucle = intval($debut_boucle);
	$debut_boucle = (($tout=($debut_boucle == -1))?0:($debut_boucle));
	$debut_boucle = max(0,min($debut_boucle,floor(($Numrows['_forms']['total']-1)/(10))*(10)));
	$fin_boucle = min(($tout ? $Numrows['_forms']['total'] : $debut_boucle + 9), $Numrows['_forms']['total'] - 1);
	$Numrows['_forms']['grand_total'] = $Numrows['_forms']['total'];
	$Numrows['_forms']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	if ($debut_boucle>0 AND $debut_boucle < $Numrows['_forms']['grand_total'] AND sql_seek($result,$debut_boucle,'','continue'))
		$Numrows['_forms']['compteur_boucle'] = $debut_boucle;
	
	
	$l1 = _T('forms:afficher');
	$l2 = _T('forms:afficher');
	$l3 = _T('forms:editer');
	$l4 = _T('forms:editer');
	$l5 = _T('forms:dupliquer');
	$l6 = _T('forms:dupliquer');
	$l7 = _T('forms:exporter');
	$l8 = _T('forms:exporter');
	$l9 = _T('forms:vider');
	$l10 = _T('forms:vider');
	$l11 = _T('forms:supprimer');
	$l12 = _T('forms:supprimer');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result)) {

		$Numrows['_forms']['compteur_boucle']++;
		if ($Numrows['_forms']['compteur_boucle'] <= $debut_boucle) continue;
		if ($Numrows['_forms']['compteur_boucle']-1 > $fin_boucle) break;
		$t0 .= (
'
' .
BOUCLE_rephtml_e4a8eac3e5359edad20cd4982b77d022($Cache, $Pile, $doublons, $Numrows, $SP)
. vide($Pile['vars']['donnees'] = $Numrows['_rep']['total']) .
'
' .
vide($Pile['vars']['lien_edite'] = '') .
(autoriser(((($a = '') OR (!is_array($a) AND strlen($a))) ? $a : 'structurer'),'form',$Pile[$SP]['id_form'])  ?
		(' ' . (	' ' .
	vide($Pile['vars']['lien_edite'] = interdire_scripts(parametre_url((tester_url_ecrire('forms_edit') ?generer_url_ecrire('forms_edit',(	'id_form=' .
			$Pile[$SP]['id_form']))  : ""),'retour',urlencode(self())))))) :
		'') .
'
' .
vide($Pile['vars']['lien_affiche'] = interdire_scripts(parametre_url((tester_url_ecrire('donnees_tous') ?generer_url_ecrire('donnees_tous',(	'id_form=' .
		$Pile[$SP]['id_form']))  : ""),'retour',urlencode(self())))) .
(!(is_array($a = ($Pile["vars"])) ? $a['donnees'] : "")  ?
		(' ' . (	'
	' .
	(($t2 = strval(interdire_scripts((match($Pile[$SP]['type_form'],'(^$|^sondage$)') ? ' ':''))))!=='' ?
			($t2 . (	' ' .
		vide($Pile['vars']['lien_affiche'] = ''))) :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts((match($Pile[$SP]['type_form'],'(^$|^sondage$)') ? '':' '))))!=='' ?
			($t2 . (	'
		' .
		vide($Pile['vars']['lien_affiche'] = interdire_scripts(parametre_url((tester_url_ecrire('donnees_edit') ?generer_url_ecrire('donnees_edit',(	'id_form=' .
				$Pile[$SP]['id_form']))  : ""),'retour',urlencode(self())))))) :
			'') .
	'
')) :
		'') .
'
' .
vide($Pile['vars']['lien_duplique'] = invalideur_session($Cache, generer_action_auteur('forms_duplique',invalideur_session($Cache, $Pile[$SP]['id_form']),interdire_scripts(invalideur_session($Cache, urlencode(concat(eval('return '.'_DIR_RESTREINT'.';'),invalideur_session($Cache, self())))))))) .
((is_array($a = ($Pile["vars"])) ? $a['snippet_present'] : "")  ?
		(' ' . (	' ' .
	vide($Pile['vars']['lien_exporte'] = invalideur_session($Cache, generer_action_auteur('snippet_exporte',(	'forms:' .
			invalideur_session($Cache, $Pile[$SP]['id_form']))))))) :
		'') .
'
' .
vide($Pile['vars']['lien_vider'] = '') .
(autoriser(((($a = '') OR (!is_array($a) AND strlen($a))) ? $a : 'vidanger'),'form',$Pile[$SP]['id_form'])  ?
		(' ' . (	' ' .
	vide($Pile['vars']['lien_vider'] = invalideur_session($Cache, generer_action_auteur('forms_donnees_vide',invalideur_session($Cache, $Pile[$SP]['id_form']),interdire_scripts(invalideur_session($Cache, urlencode(concat(eval('return '.'_DIR_RESTREINT'.';'),invalideur_session($Cache, self())))))))))) :
		'') .
'
' .
vide($Pile['vars']['lien_supprimer'] = '') .
(autoriser(((($a = '') OR (!is_array($a) AND strlen($a))) ? $a : 'supprimer'),'form',$Pile[$SP]['id_form'])  ?
		(' ' . (	' ' .
	vide($Pile['vars']['lien_supprimer'] = interdire_scripts(ancre_url(parametre_url(parametre_url((tester_url_ecrire('forms_edit') ?generer_url_ecrire('forms_edit',(	'supp_form=' .
			$Pile[$SP]['id_form']))  : ""),'type_form',interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],''),true))),'retour',urlencode(self())),'resume'))))) :
		'') .
'
' .
vide($Pile['vars']['message'] = unicode_to_javascript(addslashes(html2unicode(_T(((($a = '') OR (!is_array($a) AND strlen($a))) ? $a : 'forms:confirm_vider_table'),array('table' => interdire_scripts($Pile[$SP]['titre']))))))) .
'<tr class=\'tr_liste\'>
<td class="arial11">
<img src=\'' .
interdire_scripts(eval('return '.'_DIR_IMG_PACK'.';')) .
'puce-' .
((is_array($a = ($Pile["vars"])) ? $a['donnees'] : "") ? 'verte':'orange') .
'-breve.gif\' width=\'7\' height=\'7\' alt=\'puce\' />&nbsp;&nbsp;
</td>
<td class="arial11">
	<span class=\'' .
classe_boucle_crayon('forms','titre',$Pile[$SP]['id_form']).' ' .
'\'>' .
interdire_scripts(typo(supprimer_numero($Pile[$SP]['titre']),"TYPO",$connect)) .
'</span>
</td>
<td class="arial1">&nbsp;
</td>
<td class="arial1">' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['lien_affiche'] : "")))!=='' ?
		('<a href=\'' . $t1 . (	'\' title=\'' .
	$l1 .
	'\'><img src=\'' .
	interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
	'img_pack/donnees-24.png\' width=\'24\' height=\'24\' alt=\'' .
	$l1 .
	'\' /></a>')) :
		'') .
'</td>
<td class="arial1">' .
_T((((is_array($a = ($Pile["vars"])) ? $a['donnees'] : "") == '0') ? interdire_scripts(concat(entites_html(sinon(@$Pile[0]['prefix'],'form'),true),':aucune_reponse')):'')) .
_T((((is_array($a = ($Pile["vars"])) ? $a['donnees'] : "") == '1') ? interdire_scripts(concat(entites_html(sinon(@$Pile[0]['prefix'],'form'),true),':une_reponse')):'')) .
'
' .
(((is_array($a = ($Pile["vars"])) ? $a['donnees'] : "") > '1')  ?
		(' ' . (	'  ' .
	interdire_scripts(eval('return '.(	'_T("' .
		interdire_scripts(entites_html(sinon(@$Pile[0]['prefix'],'form'),true)) .
		':nombre_reponses",array("nombre"=>' .
		(is_array($a = ($Pile["vars"])) ? $a['donnees'] : "") .
		')) ').';')) .
	'  ')) :
		'') .
'</td>
<td class="arial1">' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['lien_edite'] : "")))!=='' ?
		('<a href=\'' . $t1 . (	'\' title=\'' .
	$l3 .
	'\'><img src=\'' .
	interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
	'img_pack/editer-24.png\' width=\'24\' height=\'24\' alt=\'' .
	$l3 .
	'\' /></a>')) :
		'') .
'</td>
<td class="arial1"><a href=\'' .
(is_array($a = ($Pile["vars"])) ? $a['lien_duplique'] : "") .
'\' title=\'' .
$l5 .
'\'><img src=\'' .
interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
'img_pack/dupliquer-24.png\' width=\'24\' height=\'24\' alt=\'' .
$l5 .
'\' /></a></td>
' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['lien_exporte'] : "")))!=='' ?
		('<td class="arial1"><a href=\'' . $t1 . (	'\' title=\'' .
	$l7 .
	'\'><img src=\'' .
	interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
	'img_pack/exporter-form-24.png\' width=\'24\' height=\'24\' alt=\'' .
	$l7 .
	'\' /></a></td>')) :
		'') .
'
<td>&nbsp;</td>
<td class="arial1">' .
((is_array($a = ($Pile["vars"])) ? $a['donnees'] : "")  ?
		(' ' . (($t2 = strval((is_array($a = ($Pile["vars"])) ? $a['lien_vider'] : "")))!=='' ?
			('<a href=\'' . $t2 . (	'\' title=\'' .
		$l9 .
		'\' onclick="return confirm(\'' .
		(is_array($a = ($Pile["vars"])) ? $a['message'] : "") .
		'\')" ><img src=\'' .
		interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
		'img_pack/vider-24.png\' width=\'24\' height=\'24\' alt=\'' .
		$l9 .
		'\' /></a>')) :
			'')) :
		'') .
'</td>
<td class="arial1">' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['lien_supprimer'] : "")))!=='' ?
		('<a href=\'' . $t1 . (	'\' title=\'' .
	$l11 .
	'\'><img src=\'' .
	interdire_scripts(eval('return '.'_DIR_PLUGIN_FORMS'.';')) .
	'img_pack/supprimer-24.png\' width=\'24\' height=\'24\' alt=\'' .
	$l11 .
	'\' /></a>')) :
		'') .
'</td>
</tr>
');
	}
	@sql_free($result);
	}
	return $t0;
}


//
// Fonction principale du squelette ../plugins/auto/forms_et_tables_2_0/fonds/tables_tous.html
// Temps de compilation total: 17.199 ms
//

function html_e4a8eac3e5359edad20cd4982b77d022($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
vide($Pile['vars']['snippet_present'] = interdire_scripts(eval('return '.'defined(\'_DIR_PLUGIN_SNIPPETS\')'.';'))) .
(($t1 = BOUCLE_formshtml_e4a8eac3e5359edad20cd4982b77d022($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class=\'liste\'>
<div style=\'position: relative;\'>
	<div style=\'position: absolute; top: -12px; left: 3px;\'><img src=\'' .
		interdire_scripts(find_in_path((	'img_pack/' .
			interdire_scripts(concat(entites_html(sinon(@$Pile[0]['type_form'],'form'),true),'-24.png'))))) .
		'\' alt="" /></div>
	<div style=\'background-color: ' .
		interdire_scripts(entites_html((@$Pile[0]['couleur_claire']),true)) .
		'; color: black; padding: 3px; padding-left: 30px; border-bottom: 1px solid #444444;\' class=\'verdana2\'>
	<b>' .
		(($t3 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['titre_liste'],''),true) ? '':' '))))!=='' ?
				($t3 . _T('forms:tous_formulaires')) :
				'') .
		sinon(interdire_scripts(@$Pile[0]['titre_liste']),'') .
		'</b>
	</div>
</div>
<table width=\'100%\' cellpadding=\'5\' cellspacing=\'0\' border=\'0\'>
' .
		(($t3 = strval(filtre_pagination_dist($Numrows["_forms"]["grand_total"],
 		interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true)),
		isset($Pile[0]['debut'.interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true))])?$Pile[0]['debut'.interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true))]:intval(_request('debut'.interdire_scripts(entites_html(sinon(@$Pile[0]['type_form'],'form'),true)))),
		10, true, '', '', array())))!=='' ?
				((	'<tr style=\'background-color: #dddddd;\'>
<td class="arial1" style=\'border-bottom: 1px solid #444444;\' colspan="' .
			((is_array($a = ($Pile["vars"])) ? $a['snippet_present'] : "") ? '11':'10') .
			'">
<div class=\'pagination\'>') . $t3 . '</div>
</td>
</tr>') :
				'') .
		'
') . $t1 . '
</table></div>
') :
		'') .
'
&nbsp;<br/>');

	return analyse_resultat_skel('html_e4a8eac3e5359edad20cd4982b77d022', $Cache, $page, '../plugins/auto/forms_et_tables_2_0/fonds/tables_tous.html');
}
?>