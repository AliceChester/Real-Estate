<?php

/*
 * Squelette : ../plugins/ckeditor-spip-plugin/formulaires/ckc.html
 * Date :      Wed, 28 Sep 2011 21:24:16 GMT
 * Compile :   Wed, 29 Feb 2012 15:33:35 GMT
 * Boucles :   _ce
 */ 

/* BOUCLE POUR  */

 function BOUCLE_cehtml_e916d38c4e5cca0c71daedd629f54cce(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'pour';
	static $table = 'POUR';
	static $id = '_ce';
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
			array('tableau', liste_CHAMPS_EXTRAS()));
	$t0 = "";
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect,
		 array('../plugins/ckeditor-spip-plugin/formulaires/ckc.html','html_e916d38c4e5cca0c71daedd629f54cce','_ce',64,$GLOBALS['spip_lang']));
	if ($result) {
	
	$l1 = _T('ckeditor:toolbar');
	$l2 = _T('ckeditor:tb_basic');
	$l3 = _T('ckeditor:tb_full');$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'pour')) {

		$t0 .= (
'
				<input name="champs_extras[' .
forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']) .
']" type="checkbox"' .
(($t1 = strval(interdire_scripts(((table_valeur(entites_html((@$Pile[0]['champs_extras']),true),forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']))) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'> ' .
forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']) .
' </input>
				<strong> &mdash; </strong><label>' .
$l1 .
'</label>
				<input name="extras_tb[' .
forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']) .
']" type="radio" value="Basic"' .
interdire_scripts(((table_valeur(entites_html((@$Pile[0]['extras_tb']),true),forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form'])) == 'Basic') ? 'checked':'')) .
'> ' .
$l2 .
' </input>
				<input name="extras_tb[' .
forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form']) .
']" type="radio" value="Full"' .
interdire_scripts(((table_valeur(entites_html((@$Pile[0]['extras_tb']),true),forms_calcule_valeur_en_clair('POUR', @$Pile[0]['id_donnee'], @$Pile[0]['champ'], $Pile[$SP]['valeur'], @$Pile[0]['id_form'])) == 'Full') ? 'checked':'')) .
'> ' .
$l3 .
' 
				</input>
				<br/>
				');
	}
	@sql_free($result, 'pour');
	}
	return $t0;
}


//
// Fonction principale du squelette ../plugins/ckeditor-spip-plugin/formulaires/ckc.html
// Temps de compilation total: 47.217 ms
//

function html_e916d38c4e5cca0c71daedd629f54cce($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- titre=Configuration de CKEDITOR  -->
<!-- nom=ckeditor -->
<!-- depot=metapack -->
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
vide($Pile['vars']['aff'] = interdire_scripts(eval('return '.'$_GET[\'aff\']'.';'))) .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
		('<p class="formulaire_message">' . $t1 . '</p>') :
		'') .
'
' .
((((is_array($a = ($Pile["vars"])) ? $a['aff'] : "") == 'reinit'))  ?
		('<p class="formulaire_message">' . ' ' . (	_T('ckeditor:ck_reinit') .
	'</p>')) :
		'') .
'
<form method="post" action="' .
interdire_scripts(parametre_url(entites_html((@$Pile[0]['action']),true),'aff','')) .
'"><div>
		' .
	'<div>' .
	form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true))) .
	'<input name=\'formulaire_action\' type=\'hidden\'
		value=\'' . @$Pile[0]['form'] . '\' />' .
	'<input name=\'formulaire_action_args\' type=\'hidden\'
		value=\'' . @$Pile[0]['formulaire_args']. '\' />' .
	(@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') .
	'</div><fieldset>
	<legend>' .
_T('ckeditor:config_avancee') .
'</legend>
	<div class=\'cke-div\'>
		<label for="protectedtags"><strong>' .
_T('ckeditor:balises_spip_autoriser') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:balises_spip_autoriser_descriptif') .
'</span></span>
		<br/>
		<input type="text" name="protectedtags"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['protectedtags']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size="55%"/>
	</div>
	<div class=\'cke-div\'>
		<label><strong>' .
_T('ckeditor:options_html2spip') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:utiliser_html2spip_descriptif') .
'</span></span>
		<br/>
		<input type="radio" name="conversion" value="aucune"' .
(($t1 = strval(interdire_scripts((((entites_html((@$Pile[0]['conversion']),true) == 'aucune')) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'>' .
_T('ckeditor:aucune_conversion') .
'</input><br/>
		<input type="radio" name="conversion" value="partielle"' .
(($t1 = strval(interdire_scripts((((entites_html((@$Pile[0]['conversion']),true) == 'partielle')) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'>' .
_T('ckeditor:conversion_partielle_vers_spip') .
'</input><br/>
<?php
	include_spip(\'inc/ckeditor_constantes\') ;
	if (find_in_path(\'lib/\'._CKE_HTML2SPIP_VERSION)) {
?>
		<input type="radio" name="conversion" value="complete"' .
(($t1 = strval(interdire_scripts((((entites_html((@$Pile[0]['conversion']),true) == 'complete')) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'>' .
_T('ckeditor:utiliser_html2spip') .
'</input><br/>
		<label for="identitytags">' .
_T('ckeditor:html2spip_identite') .
'</label>
		<input type="text" name="html2spip_identite"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['html2spip_identite']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size="55%"/><br/>
		<input type="checkbox" name="html2spip_limite"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['html2spip_limite']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:html2spip_limite') .
'</input><br/>
<?php
	} else {
?>
	<div style=\'border:1px solid #555;background-color:#eee;margin:3px 15px 0px 15px;padding:3px;\'>
		' .
_T('ckeditor:aide_html2spip_non_trouvee') .
'
	</div>
<?php
	}
?>
	</div>
	<div class=\'cke-div\'>
		<label><strong>' .
_T('ckeditor:utiliser_ckeditor_avec') .
'</strong></label><br/>
		<div style="margin:0 0 0 15px;">
			<input name="crayons" type="checkbox"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['crayons']),true)) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'> ' .
_T('ckeditor:les_crayons') .
' </input>
			<strong> &mdash; </strong><label>' .
_T('ckeditor:toolbar') .
'</label>
			<input name="crayons_tb" type="radio" value="Basic"' .
interdire_scripts(((entites_html((@$Pile[0]['crayons_tb']),true) == 'Basic') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_basic') .
' </input>
			<input name="crayons_tb" type="radio" value="Full"' .
interdire_scripts(((entites_html((@$Pile[0]['crayons_tb']),true) == 'Full') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_full') .
' 
			</input>
			<br/>
			<input name="forums" type="checkbox"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['forums']),true)) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'> ' .
_T('ckeditor:les_forums') .
' </input>
			<strong> &mdash; </strong><label>' .
_T('ckeditor:toolbar') .
'</label>
			<input name="forums_tb" type="radio" value="Basic"' .
interdire_scripts(((entites_html((@$Pile[0]['forums_tb']),true) == 'Basic') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_basic') .
' </input>
			<input name="forums_tb" type="radio" value="Full"' .
interdire_scripts(((entites_html((@$Pile[0]['forums_tb']),true) == 'Full') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_full') .
' 
			</input>
			<br/>
			<input name="cisf" type="checkbox"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['cisf']),true)) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'> ' .
_T('ckeditor:cisf') .
' </input>
			<strong> &mdash; </strong><label>' .
_T('ckeditor:toolbar') .
'</label>
			<input name="cisf_tb" type="radio" value="Basic"' .
interdire_scripts(((entites_html((@$Pile[0]['cisf_tb']),true) == 'Basic') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_basic') .
' </input>
			<input name="cisf_tb" type="radio" value="Full"' .
interdire_scripts(((entites_html((@$Pile[0]['cisf_tb']),true) == 'Full') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_full') .
' 
			</input>

			' .
(($t1 = BOUCLE_cehtml_e916d38c4e5cca0c71daedd629f54cce($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
			<br/>
			' .
		_T('ckeditor:les_champs_extras') .
		'
			<blockquote style="margin:0 0 0 15px;">
				') . $t1 . '
			</blockquote>
			') :
		'') .
'
			<br/>
			<input name="partie_publique" type="checkbox"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['partie_publique']),true)) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'>' .
_T('ckeditor:partie_publique') .
'</input>
			<blockquote style="margin:0 0 0 15px;">
				<label for="class_publique">' .
_T('ckeditor:class_partie_publique') .
'</label>
				<input name="class_publique" type="text" value="' .
interdire_scripts(entites_html((@$Pile[0]['class_publique']),true)) .
'"/>
				<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_class_css_formulaire') .
'</span></span>
				<br/>
				<label>' .
_T('ckeditor:toolbar') .
'</label>
				<input name="publique_tb" type="radio" value="Basic"' .
interdire_scripts(((entites_html((@$Pile[0]['publique_tb']),true) == 'Basic') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_basic') .
' </input>
				<input name="publique_tb" type="radio" value="Full"' .
interdire_scripts(((entites_html((@$Pile[0]['publique_tb']),true) == 'Full') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_full') .
' 
				</input>
			</blockquote>

			<input name="partie_prive" type="checkbox"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['partie_prive']),true)) ?' ' :''))))!=='' ?
		($t1 . 'checked') :
		'') .
'>' .
_T('ckeditor:partie_prive') .
'</input>
			<blockquote style="margin:0 0 0 15px;">
				<label for="class_prive">' .
_T('ckeditor:class_partie_prive') .
'</label>
				<input name="class_prive" type="text" value="' .
interdire_scripts(entites_html((@$Pile[0]['class_prive']),true)) .
'"/>
				<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_class_css_formulaire') .
'</span></span>
				<br/>
				<label>' .
_T('ckeditor:toolbar') .
'</label>
				<input name="prive_tb" type="radio" value="Basic"' .
interdire_scripts(((entites_html((@$Pile[0]['prive_tb']),true) == 'Basic') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_basic') .
' </input>
				<input name="prive_tb" type="radio" value="Full"' .
interdire_scripts(((entites_html((@$Pile[0]['prive_tb']),true) == 'Full') ? 'checked':'')) .
'> ' .
_T('ckeditor:tb_full') .
' 
				</input>
			</blockquote>
		</div>
	</div>
	<div class=\'cke-div\'>
		<label><strong>' .
_T('ckeditor:options_spip') .
'</strong></label><br/>
		<input type="checkbox" name="spiplinks"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['spiplinks']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:autoriser_liens_spip') .
'</input><br/>
		<input type="checkbox" name="insertall"' .
(($t1 = strval(interdire_scripts((entites_html((@$Pile[0]['insertall']),true) ? 'checked':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:autoriser_insertion_documents') .
'</input><br/>
	</div>
	<div class=\'cke-div\'>
			<strong>' .
_T('ckeditor:largeur_barre_outils') .
'</strong><br/>
			<label for=\'cktoolslenlarge\'>' .
_T('ckeditor:large') .
'</label>
			<input type="text" name="cktoolslenlarge"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['cktoolslenlarge']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size="5"/><br/>
			<label for=\'cktoolslenetroit\'>' .
_T('ckeditor:etroit') .
'</label>
			<input type="text" name="cktoolslenetroit"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['cktoolslenetroit']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size="5"/><br/>
	</div>
	<div class=\'cke-div\'>
		<label for=\'cklanguage\'><strong>' .
_T('ckeditor:langue_ckeditor') .
'</strong></label>
		<select name=\'cklanguage\'>
			' .
interdire_scripts(ck_lang_options(entites_html((@$Pile[0]['cklanguage']),true))) .
'
		</select>
	</div>
	<div class=\'cke-div\'>
		<label for="entermode"><strong>' .
_T('ckeditor:entermode') .
'</strong></label>
		<select name="entermode">
			<option value="ENTER_P"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['entermode']),true) == 'ENTER_P') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:enter_p') .
'</option>
			<option value="ENTER_BR"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['entermode']),true) == 'ENTER_BR') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:enter_br') .
'</option>
			<option value="ENTER_DIV"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['entermode']),true) == 'ENTER_DIV') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:enter_div') .
'</option>
		</select>
		<div class=\'cke-aide\'><div>
			<ul>
				<li>' .
_T('ckeditor:explique_p') .
'</li>
				<li>' .
_T('ckeditor:explique_div') .
'</li>
			</ul>
		</div></div>
	</div>
	<div class=\'cke-div\'>
		<label for="shiftentermode"><strong>' .
_T('ckeditor:shiftentermode') .
'</strong></label>
		<select name="shiftentermode">
			<option value="ENTER_P"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['shiftentermode']),true) == 'ENTER_P') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:enter_p') .
'</option>
			<option value="ENTER_BR"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['shiftentermode']),true) == 'ENTER_BR') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:enter_br') .
'</option>
			<option value="ENTER_DIV"' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['shiftentermode']),true) == 'ENTER_DIV') ? 'selected':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>' .
_T('ckeditor:enter_div') .
'</option>
		</select>
		<div class=\'cke-aide\'><div>
			<ul>
				<li>' .
_T('ckeditor:explique_p') .
'</li>
				<li>' .
_T('ckeditor:explique_div') .
'</li>
			</ul>
		</div></div>
	</div>
	<div class=\'cke-div\'>
		<label><strong>' .
_T('ckeditor:options_css') .
'</strong></label><br/>
		<div style=\'margin-left:15px;\'>
			<label for=\'sitecss\'><strong>' .
_T('ckeditor:css_site') .
'</strong></label>
			<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_css_site') .
'</span></span>
			<br/>
			<input type="text" name="csssite"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['csssite']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size="50" />
		</div>
		<div style=\'margin-left:15px;\'>
			<label for=\'contextes\'><strong>' .
_T('ckeditor:liste_de_contextes') .
'</strong></label>
			<span class=\'cke-aide\'><span>' .
_T('ckeditor:aide_contextes') .
'</span></span>
			<br/>
			<input type="text" name="contextes"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['contextes']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size="50" /><br/>
		</div>
	</div>
	<div class=\'cke-div\'>
		<label for=\'siteurl\'><strong>' .
_T('ckeditor:url_site') .
'</strong></label>
		<span class=\'cke-aide\'><span>' .
_T('ckeditor:normalement_detectee') .
'<code><?php echo lire_meta(\'adresse_site\'); ?></code></span></span>
		<br/>
		<input type="text" name="siteurl"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['siteurl']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' size="50" /><br/>
	</div>

</fieldset>
	<div class=\'cke-div\'>
		<input type="submit" name="_cfg_ok" value="' .
_T('ckeditor:ok') .
'" />
		<input type="submit" name="_cfg_delete" value="' .
_T('ckeditor:supprimer') .
'" />
		<input type="submit" name="_cfg_reinit" onclick="javascript:if (confirm(\'' .
_T('ckeditor:confirme_reinitialiser_plugin') .
'\')){ ' .
(($t1 = strval(parametre_url(self(),'_cfg_reinit','on')))!=='' ?
		('document.location.href=\'' . $t1 . '\';') :
		'') .
'} return false;" value="' .
_T('ckeditor:reinitialiser_le_plugin') .
'"/>
	</div>
</div>
</form>

');

	return analyse_resultat_skel('html_e916d38c4e5cca0c71daedd629f54cce', $Cache, $page, '../plugins/ckeditor-spip-plugin/formulaires/ckc.html');
}
?>