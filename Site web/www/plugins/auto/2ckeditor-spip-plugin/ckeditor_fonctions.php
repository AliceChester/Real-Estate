<?php

/* This code is release under the term of the GPVv2 Licence
 * You can find the text of the license here : http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Copyright : Frédéric Bonnaud <fred@lea-linux.org>
 */

include_spip("inc/ckeditor_constantes") ;
include_spip("inc/ckeditor_tools") ;

function ckeditor_pre_edition($flux) {
	if (($flux['args']['action'] === 'modifier') && (
		($flux['args']['type'] === 'article') ||
		($flux['args']['type'] === 'rubrique') ||
		($flux['args']['type'] === 'breve')
	)) {
		if (($_POST['editmode'] != 'spip') && ($flux['data']['texte'])) {
			$flux['data']['texte'] = ckeditor_html2spip($flux['data']['texte']) ;
		}
	}
	return $flux ;
}

function ckeditor_jsT($texte, $cvt_entities = false) {
	if ($cvt_entities) {
		return preg_replace('~&#(\d+);~ei', 'sprintf("\\u%04X","\\1")', _T($texte));
	} else {
		return _T($texte) ;
	}
}

function ckeditor_cfgCK_Smileys() {
	if (ckeditor_smileys_actifs()) {
		if (function_exists('smileys_installe')) { // le plugins couteau suisse smileys doit être activé
			$result = smileys_installe() ;
			$smileys = $result['smileys'] ;
			if (is_array($smileys)) {
				$sm_desc = array() ;
				$sm_img = array() ;
				foreach($smileys[2] as $ndx => $img) { // ceci permet d'éliminer automatiquement des doublons
					$sm_desc[$img] = "'".preg_replace("~'~", "\\\\'",$smileys[0][$ndx])."'" ;
					$sm_img[$img] = "'".$img."'" ;
				}
				$sm_desc = "[".join(", ",$sm_desc)." ]" ;
				$sm_img  = "[".join(", ", $sm_img)." ]" ;
				$sm_path = "'"._CKE_DIR_SMILEYS ;
				return array($sm_desc,$sm_img,$sm_path) ;
			}
		}
	}
	return false ;
}

function ckeditor_getcss() {
	$flux = '' ;
	if ($webfonts = ckeditor_lire_config("webfonts", _CKE_WEBFONTS_DEF)) {
		$webfonts = preg_replace(array("~\s*[,;\|]\s*~","~\s+~"), array("|","+"), $webfonts) ;
		$flux .= "<link rel='stylesheet' href='"._CKE_GOOGLE_WEBFONT.$webfonts."' type='text/css' />\n" ;
	}
	if (ckeditor_lire_config('fontkit', _CKE_FONTKIT_DEF)) {
		$fkdir = @opendir($fkdirname = _CKE_FONTKIT) ;
		if ($fkdir) {
			$site_url = ckeditor_lire_config("siteurl",lire_meta("adresse_site")) ;
			while($fontdir = @readdir($fkdir)) {
				if (is_dir( $fkdirname.'/'.$fontdir ) && is_file( $css = $fkdirname.'/'.$fontdir.'/stylesheet.css' )) {
					$flux .= "<link rel='stylesheet' href='".$css."' type='text/css' />\n" ;
				}
			}
			@closedir($fkdir) ;
		}
	}
	return $flux ;
}

function ckeditor_header_prive($flux) {
	if (ckeditor_lire_config('insertcssprive', _CKE_INSERT_CSSPRIVEE_DEF)) {
		$flux .= ckeditor_getcss() ;
	}
	return $flux ;
}

function ckeditor_insert_head($flux) {
	if (ckeditor_lire_config('insertcsspublic', _CKE_INSERT_CSSPUBLIC_DEF)) {
		$flux .= ckeditor_getcss() ;
	}
	return $flux ;
}

function ckeditor_preparescript($flux, $textarea = '') {
	$select_documents = url_absolue(_DIR_RACINE.'spip.php?page=select_documents&sel=doc'.($flux['args']['type'] && $flux['args']['id'] ? '&'.$flux['args']['type'].'='.$flux['args']['id'] : (ckeditor_lire_config('insertall') ? '&type=tout' : '' ) ) ) ;

	($editmode = _request('editmode')) || ($editmode = ckeditor_lire_config('editmode', _CKE_EDITMODE_DEF)) ;

	// fix : valeur par défaut pas lisible depuis un squelette
	ecrire_config("ckeditor/insertall", ckeditor_lire_config("insertall", _CKE_INSERTALL_DEF)) ; 

	// préparation du script :
	$barre_outils = "" ;
	global $toolbars ;
	include_spip("inc/toolbars") ;
	$max_sizetools = _CKE_MAXSIZETOOLS ;

	$plug_pos = ckeditor_lire_config('pluginbarreposition', _CKE_PLUGINSBARREPOSITION_DEF) ;

	if (defined('_DIR_PLUGIN_ITERATEURS') && ($plugins = ckeditor_lire_config('plugins'))) {
		$pluginsboutons = $pluginsactifs = array() ;
		foreach($plugins as $plugin => $values) {
			if ($values['actif']) {
				$pluginsactifs[] = $plugin ;
				if ($values['bouton']) 
					$pluginsboutons[] = ($values['nom_bouton']?$values['nom_bouton']:$plugin) ;
			}
		}
		$pluginsbarre = (count($pluginsboutons)?"'".join("', '", $pluginsboutons)."'":'') ;
		$extraplugins = (count($pluginsactifs)?','.join(",", $pluginsactifs):'') ;
	}

	$ckformat = '' ;
	if (preg_match_all("#(\w+)#", ckeditor_lire_config("formats", _CKE_FORMATS_DEF),$matches, PREG_SET_ORDER)) {
		$ckformat = "\n\t\t'format_tags':'".ckeditor_lire_config("formats", _CKE_FORMATS_DEF)."'," ;
		foreach($matches as $match) {
			$ckformat .= "\n\t\t'format_".$match[1]."':{'element':'".$match[1]."','attributes':{'class':'ckspip'}}," ;
		}
	}

	$cfgCK_Smileys = false ;
	if ($textarea) {
		$max_sizetools -= 35 ;
	}
	$plugposref = ckeditor_lire_config('plugin_position_reference') ;
	if (is_array($toolbars)) {
		$tbsize = 0 ;
		$html2spip = ckeditor_lire_config('html2spip_limite', _CKE_HTML2SPIP_LIMITE_DEF) ;
		foreach($toolbars as $toolbar) {
			$tb = '' ;
			if (is_array($toolbar)) {
				$thissize = 0 ;
				foreach($toolbar as $tool => $item) {
					if ($pluginsbarre && ($tool == $plugposref) && ($plug_pos == 'avant')) {
						$thissize += 24 * count($pluginsboutons) ;
						$tb=($tb?$tb.", ":"").$pluginsbarre ;
					}
					
					if (ckeditor_lire_config("tool_$tool", $item[1]) &&
						(!$html2spip || $item[2]) &&
						(
							(($tool != 'Format') || ckeditor_lire_config("formats", _CKE_FORMATS_DEF)) &&
							(($tool != 'Smiley') || ($cfgCK_Smileys = ckeditor_cfgCK_Smileys())) &&
							(($tool != 'Image') || ckeditor_lire_config('autorise_parcours', _CKE_PARCOURS_DEF))
						)
					) {
						$thissize += $item[0] ;	
						$tb=($tb?$tb.", ":"")."'$tool'" ;
					}
	
					if ($pluginsbarre && ($tool == $plugposref) && ($plug_pos == 'apres')) {
						$thissize += 24 * count($pluginsboutons) ;
						$tb=($tb?$tb.", ":"").$pluginsbarre ;
					}
	
				}
				if ($tb) { /* 6 : largeur des bordures des barres d'outils */ 
					if ($barre_outils && ($tbsize + $thissize + 6 >= $max_sizetools)) { 
						$barre_outils .= ',\'/\' ' ;
						$tbsize=$thissize+6 ;
					} else {
						$tbsize+=$thissize+6 ;
					}
					$barre_outils = ($barre_outils?$barre_outils.",\n\t\t\t[":"[\n\t\t\t[").$tb."]" ;
				}
			}
		} 
	}
	if (!$cfgCK_Smileys) { $cfgCK_Smileys = array("[]","[]", "''") ; }

	if ($barre_outils) {
		$barre_outils .= "\n\t\t]" ;
	} else {
		// on met forcément une barre d'outils.
		$barre_outils = _CKE_BARREOUTILS_DEF ;
	}

	global $visiteur_session ;
	$choix = (is_array($visiteur_session) &&is_array($visiteur_session['prefs']))
		? $visiteur_session['prefs']['couleur']
		: 1;
	$couleurs = charger_fonction('couleurs', 'inc');
	$couleurs_spip = $couleurs(array(), true) ;

	$cklanguage = ckeditor_lire_config("cklanguage", _CKE_LANGAGE_DEF) ;
	($site_url = ckeditor_lire_config("siteurl")) ||  ($site_url = lire_meta("adresse_site")) ;

	if (($cklanguage == 'auto') || ($cklanguage == '')) {
		($cklanguage = $visiteur_session['lang']) || ($cklanguage = lire_meta("langue_site")) ;
	}
	
	$cssContent = (($csssite=ckeditor_lire_config("csssite"))?preg_split("#\s*[,; ]\s*#",$csssite):array()) ;
	if ($webfonts = ckeditor_lire_config("webfonts", _CKE_WEBFONTS_DEF)) {
		$webfonts = preg_replace(array("~\s*[,;\|]\s*~","~\s+~"), array("|","+"), $webfonts) ;
		$cssContent[] = _CKE_GOOGLE_WEBFONT.$webfonts ;
		$webfonts = ($webfonts?";".preg_replace(array("~\|~","~\+~"),array(";"," "), $webfonts):'') ;
	}
	if (ckeditor_lire_config('fontkit', _CKE_FONTKIT_DEF)) {
		$fkdir = @opendir($fkdirname = _CKE_FONTKIT) ;
		if ($fkdir) {
			while($fontdir = @readdir($fkdir)) {
				if (is_dir( $fkdirname.'/'.$fontdir ) && is_file( $css = $fkdirname.'/'.$fontdir.'/stylesheet.css' )) {
					$stylesheet = file_get_contents($css) ;
					if (preg_match_all("~font-family\s*:\s*'(.*?)'~s",$stylesheet, $match)) {
						$cssContent[] = url_absolue($css) ;
						foreach($match[1] as $m) {
							$webfonts .= ';'.$m ;
						}
					}
				}
			}
			@closedir($fkdir) ;
		}
	}
	$cssContent = (count($cssContent)?"[ '".join("', '",$cssContent)."' ]":"[]") ;

	// configuration de kcfinder :
	$autorise_parcours = ckeditor_lire_config('autorise_parcours', _CKE_PARCOURS_DEF) ;
	$autorise_admin_telecharger = ckeditor_lire_config('autorise_telechargement', _CKE_UPLOAD_DEF) ;
	$autorise_redac_telecharger = $autorise_admin_telecharger && ckeditor_lire_config('autorise_telechargement_redacteur', _CKE_UPLOAD_REDAC_DEF) ;

	global $auteur_session ;

	$est_admin = ($auteur_session['statut'] == '0minirezo') ;
	$est_redac = ($auteur_session['statut'] == '0minirezo') || ($auteur_session['statut'] == '1comite') ;
	
	$peut_parcourir = ($autorise_parcours && $est_redac) ;
	$peut_telecharger = ( ($autorise_admin_telecharger && $est_admin) || ($autorise_redac_telecharger && $est_redac) ) ;

	$site_url_components = parse_url($site_url) ;
	$url_path = ckeditor_lire_config("base_dir",preg_replace(_CKE_RACINE_REGEX, '', _CKE_DIR_UPLOAD) ) ;

	$imgdir   = preg_replace('~^.*/~','',ckeditor_lire_config("images_dir",_CKE_IMAGES_UPLOAD)) ;
	$flashdir = preg_replace('~^.*/~','',ckeditor_lire_config("flash_dir",_CKE_FLASH_UPLOAD)) ;
	$filesdir = preg_replace('~^.*/~','',ckeditor_lire_config("files_dir",_CKE_FILES_UPLOAD)) ;

	$uploaddir = realpath(_DIR_RACINE.'/'.$url_path) ;

	$imgrdir  = $uploaddir . '/' . $imgdir ;
	$flashrdir= $uploaddir . '/' . $flashdir ;
	$filesrdir= $uploaddir . '/' . $filesdir ;

	// si les répertoires n'existent pas, on tente de les créer
	if (! is_dir($baserdir = _DIR_RACINE . $url_path) ) {
		@mkdir($baserdir) ;
	}
	if (! is_dir($imgrdir) ) {
		@mkdir($imgrdir) ;
	}
	if (! is_dir($flashrdir) ) {
		@mkdir($flashrdir) ;
	}
	if (! is_dir($filesrdir) ) {
		@mkdir($filesrdir) ;
	}

	$kcfinders = preg_files(_DIR_RACINE."lib/", "kcfinder.*/browse.php") ;
	$kcuploadjs = '' ;

	if (
		ckeditor_lire_config('utilise_kcfinder',_CKE_USE_KCFINDER_DEF) && 
		is_array($kcfinders) && 
		count($kcfinders)
	) { // on a trouvé kcfinder, on utilise la derniere version installée 
		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = ! $peut_parcourir ;
		$_SESSION['KCFINDER']['readonly'] = ! $peut_telecharger ;
		$_SESSION['KCFINDER']['uploadURL'] = $site_url_components['path']."/".$url_path ;
		$_SESSION['KCFINDER']['uploadDir'] = realpath(_DIR_RACINE.'/'.$url_path) ;
		$_SESSION['KCFINDER']['types'] = array( 
			$filesdir=>preg_replace("~\s*;\s*~"," ",ckeditor_lire_config('files_extensions_autorisees',_CKE_FILES_EXT_PARDEF)),
			$imgdir=>preg_replace("~\s*;\s*~"," ",ckeditor_lire_config('images_extensions_autorisees',_CKE_IMAGES_EXT_PARDEF)),
			$flashdir=>preg_replace("~\s*;\s*~"," ",ckeditor_lire_config('flash_extensions_autorisees',_CKE_FLASH_EXT_PARDEF))
		) ;

		natsort($kcfinders) ;
		$kcfinder = url_absolue($kcfinders[count($kcfinders)-1]) ;
		$browseimgs = "${kcfinder}?type=${imgdir}" ;
		$browseflash= "${kcfinder}?type=${flashdir}" ;
		$browsefiles= "${kcfinder}?type=${filesdir}" ;
		$kcupload = dirname($kcfinders[count($kcfinders)-1]).'/upload.php' ;
		if (is_file($kcupload) && ckeditor_lire_config('utilise_kcfinderupload',_CKE_USE_DIRECT_UPLOAD_DEF)) {
			$kcupload = url_absolue($kcupload) ;	
			$kcuploadjs = "
		'filebrowserUploadUrl':'${kcupload}?type=${filesdir}',
		'filebrowserImageUploadUrl':'${kcupload}?type=${imgdir}',
		'filebrowserFlashUploadUrl':'${kcupload}?type=${flashdir}'," ;
		}
	} else {
		$browseimgs = url_absolue(_DIR_RACINE.'spip.php?page=filebrowser&type=images') ;
		$browseflash= url_absolue(_DIR_RACINE.'spip.php?page=filebrowser&type=flash') ;
		$browsefiles= url_absolue(_DIR_RACINE.'spip.php?page=filebrowser&type=files') ;
		if (ckeditor_lire_config('utilise_kcfinderupload',_CKE_USE_DIRECT_UPLOAD_DEF)) {
			$kcuploadjs = "
		'filebrowserUploadUrl':'". url_absolue(_DIR_RACINE.'spip.php?page=filebrowser&type=files&mode=direct') ."',
		'filebrowserImageUploadUrl':'". url_absolue(_DIR_RACINE.'spip.php?page=filebrowser&type=images&mode=direct') ."',
		'filebrowserFlashUploadUrl':'". url_absolue(_DIR_RACINE.'spip.php?page=filebrowser&type=flash&mode=direct') ."'," ;
		}
	}
	if (is_array(ckeditor_lire_config('modeles'))) {
		$templates_files = "\n\t\t'templates_files':[ '". url_absolue(_DIR_RACINE.'spip.php?page=templates.js')."' ],\n\t\t'templates':'ckeditor-spip'," ;
	} else {
		$templates_files = '' ;
	}

	$couleurs_autorisees = ckeditor_lire_config('liste_couleurs') ;
	if ($couleurs_autorisees && preg_match_all("~\b([0-9a-f]{3}|[0-9a-f]{6})\b~is", $couleurs_autorisees, $couleurs)) {
		$couleurs_js = "\n\t\t\t'colorButton_colors':'".join(',', array_map('ckeditor_convert_couleur', $couleurs[1]))."'," ;
	} else {
		$couleurs_js = '' ;
	}
	if (!ckeditor_lire_config('autres_couleurs')) {
		$couleurs_js.= "\n\t\t\t'colorButton_enableMore':false," ;
	}
		
	$flux['data'] .= "
	<script type=\"text/javascript\">
function initCKEDITOR() { // $plug_pos
	// la configuration de ckeditor :
	CKEDITOR.ckeditorpath='".url_absolue(_CKE_JS)."';
	CKEDITOR.ckdirRacine='".url_absolue(_DIR_RACINE)."';
	CKEDITOR.spipurl='". url_absolue(_DIR_RACINE.'spip.php')."';
	CKEDITOR.ckpreferedversion='"._CKE_PREFERED_VERSION."';
	CKEDITOR.ckeditmode='$editmode';
	CKEDITOR.ckpluginpath='".url_absolue(find_in_path("ckeditor-plugin/"))."',
	// internationnalisation des textes :
	CKEDITOR.txt_usespipeditor='".ckeditor_jsT('ckeditor:use_spip_editor',true)."';
	CKEDITOR.txt_useckeditor='".ckeditor_jsT('ckeditor:use_ckeditor',true)."';
	CKEDITOR.txt_spipification='".ckeditor_jsT('ckeditor:spipification')."';
	CKEDITOR.txt_versionpreferee='".ckeditor_jsT('ckeditor:version_preferee')."';

	CKEDITOR.ckConfig = {
		'language':'$cklanguage',
		'height':".ckeditor_lire_config('taille',_CKE_HAUTEUR_DEF).",
		'scayt_autoStartup':".(ckeditor_lire_config('startspellcheck', _CKE_SCAYT_START_DEF)?'true':'false').",
		'scayt_sLang':'".ckeditor_lire_config('spellchecklang',_CKE_SCAYT_LANG_DEF)."',
		'filebrowserBrowseUrl':'$browsefiles',
		'filebrowserSpipdocBrowseUrl':'$select_documents',
		'filebrowserImageBrowseLinkUrl':'$browsefiles',
		'filebrowserImageBrowseUrl':'$browseimgs',
		'filebrowserFlashBrowseUrl':'$browseflash',$kcuploadjs
		'filebrowserWindowWidth':682,
		'filebrowserWindowHeight':500,
		'extraPlugins':'spipsave,spip,spipdoc$extraplugins',
		'resize_enabled':false,
		'entities':false,$couleurs_js
		'font_names':'serif;sans serif;monospace;cursive;fantasy$webfonts',
		'smiley_descriptions':".$cfgCK_Smileys[0].",
		'smiley_images':".$cfgCK_Smileys[1].",
		'smiley_path':".$cfgCK_Smileys[2].",
		'contentsCss':$cssContent,
		'skin':'".ckeditor_lire_config('skin', _CKE_SKIN_DEF)."',
		'uiColor':'".$couleurs_spip[$choix]['couleur_claire']."',
		'enterMode':CKEDITOR.".ckeditor_lire_config('entermode',_CKE_ENTERMODE_DEF).",
		'shiftEnterMode':CKEDITOR.".ckeditor_lire_config('shiftentermode',_CKE_SHIFTENTERMODE_DEF).",
		'toolbar':$barre_outils,$ckformat$templates_files
		'stylesCombo_stylesSet':'spip-styles:".url_absolue(_DIR_RACINE.'spip.php?page=spip-styles')."'
	};
}
	</script>
	<script type=\"text/javascript\" src=\"".url_absolue(_CKE_JS)."\"></script>
	<script type=\"text/javascript\" src=\"".url_absolue(_CKE_JQUERY)."\"></script>
	<script type=\"text/javascript\" src=\"".url_absolue(_CKE_SPIP)."\"></script>
	<script type=\"text/javascript\">fullInitCKEDITOR('$textarea');</script>\n" ;
	return $flux;

 }


function ckeditor_editer_contenu_objet($flux){
	return ckeditor_preparescript($flux) ;
}

?>
