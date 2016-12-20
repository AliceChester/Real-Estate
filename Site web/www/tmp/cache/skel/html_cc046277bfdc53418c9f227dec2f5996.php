<?php

/*
 * Squelette : plugins/ckeditor-spip-plugin/filebrowser.html
 * Date :      Wed, 28 Sep 2011 21:24:09 GMT
 * Compile :   Fri, 28 Mar 2014 10:29:48 GMT
 * Boucles :   _si
 */ 

/* BOUCLE CONDITION  */

 function BOUCLE_sihtml_cc046277bfdc53418c9f227dec2f5996(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		 array('plugins/ckeditor-spip-plugin/filebrowser.html','html_cc046277bfdc53418c9f227dec2f5996','_si',3,$GLOBALS['spip_lang']));
	if ($result) {
	$SP++;
	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'condition')) {

		$t0 .= (
'
<?php
	$funcNum = intval(_request(\'CKEditorFuncNum\')) ;
	$CKEditor = _request(\'CKEditor\') ;
	$langCode = _request(\'langCode\') ;

	include_spip(\'inc/ckeditor_tools\') ;
	include_spip(\'inc/ckeditor_lire_config\') ;
	include_spip(\'inc/ckeditor_constantes\') ;

	define(\'_FILEBROWSER_IMG_EXT_REGEX\', \'~^(jpe?g|png|gif)$~i\') ;	
	define(\'_FILEBROWSER_UPLOAD_MAXSIZE\', 4) ; // 4Mo
	define(\'_MO\', 1024*1024) ;
	switch (_request(\'type\')) {
		case \'flash\':
			define(\'_FILEBROWSER_DIR\', 
				_DIR_RACINE . ckeditor_lire_config(\'base_dir\', _CKE_DIR_UPLOAD_DEF) . \'/\' . preg_replace(\'~^.*/~\',\'\',ckeditor_lire_config(\'flash_dir\', _CKE_FLASH_UPLOAD_DEF))) ;

			break ;
		case \'files\':
			define(\'_FILEBROWSER_DIR\', 
				_DIR_RACINE . ckeditor_lire_config(\'base_dir\', _CKE_DIR_UPLOAD_DEF) . \'/\' . preg_replace(\'~^.*/~\',\'\',ckeditor_lire_config(\'files_dir\', _CKE_FILES_UPLOAD_DEF))) ;
			break ;
		default:
			define(\'_FILEBROWSER_DIR\', 
				_DIR_RACINE . ckeditor_lire_config(\'base_dir\', _CKE_DIR_UPLOAD_DEF) . \'/\' . preg_replace(\'~^.*/~\',\'\',ckeditor_lire_config(\'images_dir\', _CKE_IMAGES_UPLOAD_DEF)));
			break ;
	}
	define(\'_FILEBROWSER_FILES_BASE_URL\', lire_meta(\'adresse_site\').\'/\'.preg_replace("~".preg_quote( _DIR_RACINE,\'~\')."~", \'\', _FILEBROWSER_DIR).\'/\') ;

	define(\'_FILEBROWSER_HIDE_DOT_FILES\', true) ;

	error_reporting(E_ERROR | E_PARSE);
	
	$lang = (_request(\'langCode\')?_request(\'langCode\'):\'fr\') ;	

	$cke_request = "&CKEditor=".$CKEditor."&CKEditorFuncNum=".$funcNum."&langCode=".$langCode ;
	$request_dir = _request(\'dir\') ;
	$request_dir = preg_replace(array(\'#^(\\.\\./)+#\', \'#/(\\.\\./)+#\'), array(\'\', \'/\'),  $request_dir) ;
	$dir_name = _FILEBROWSER_DIR .\'/\'. $request_dir ;

?><!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang ; ?>" lang="<?php echo $lang ; ?>">
<head>
	<title><?php echo _T(\'ckeditor:explorateur_titre\'); ?></title>
	<link rel="stylesheet" type="text/css" href="' .
interdire_scripts(find_in_path('css/filebrowser.css')) .
'" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<script type="text/javascript">  
	function loadFile(url) {  
		var parent_window = (window.parent == window) ? window.opener : window.parent ;  
		parent_window.CKEDITOR.tools.callFunction( <?php echo intval(_request(\'CKEditorFuncNum\')); ?>, url, \'\');  
		window.close();  
	}  
	</script>
</head>
<body>
<?php
	$autorise_parcours = ckeditor_lire_config(\'autorise_parcours\', _CKE_PARCOURS_DEF) ;
	$autorise_admin_telecharger = ckeditor_lire_config(\'autorise_telechargement\', _CKE_UPLOAD_DEF) ;
	$autorise_redac_telecharger = $autorise_admin_telecharger && ckeditor_lire_config(\'autorise_telechargement_redacteur\', _CKE_UPLOAD_REDAC_DEF) ;
	$autorise_admin_mkdir = ckeditor_lire_config(\'autorise_mkdir\', _CKE_MKDIR_DEF) ;
	$autorise_redac_mkdir = $autorise_admin_mkdir && ckeditor_lire_config(\'autorise_mkdir_redacteur\', _CKE_MKDIR_REDAC_DEF) ;

	$est_admin = ($auteur_session[\'statut\'] == \'0minirezo\') ;
	$est_redac = ($auteur_session[\'statut\'] == \'0minirezo\') || ($auteur_session[\'statut\'] == \'1comite\') ;
	
	$peut_parcourir = ($autorise_parcours && $est_redac) ;
	$peut_telecharger = ( ($autorise_admin_telecharger && $est_admin) || ($autorise_redac_telecharger && $est_redac) ) ;
	$peut_mkdir = ( ($autorise_admin_mkdir && $est_admin) || ($autorise_redac_mkdir && $est_redac) ) ;

	if ($peut_parcourir) {
		switch (_request(\'type\')) {
			case \'flash\':
				define (\'_FILEBROWSER_FILETYPE_REGEX\', \'#(\'.preg_replace(
					\'~\\s*;\\s*~\', \'|\', $extauth = ckeditor_lire_config(\'flash_extensions_autorisees\', _CKE_FLASH_EXT_DEF)
				).\')#e\') ;
				break ;
			case \'files\':
				define (\'_FILEBROWSER_FILETYPE_REGEX\', \'#(\'.preg_replace(
					\'~\\s*;\\s*~\', \'|\', $extauth = ckeditor_lire_config(\'files_extensions_autorisees\', _CKE_FILES_EXT_DEF)
				).\')#e\') ;
				break ;
			default:
				define (\'_FILEBROWSER_FILETYPE_REGEX\', \'#(\'.preg_replace(
					\'~\\s*;\\s*~\', \'|\', $extauth = ckeditor_lire_config(\'images_extensions_autorisees\', _CKE_IMAGES_EXT_DEF)
				).\')#e\') ;
				break ;
		}
		if (_request(\'mode\') == \'direct\') {
				$url = $message = \'\' ;
				if ($peut_telecharger) {
					$tmp_file = $_FILES[\'upload\'][\'tmp_name\'];

					$erreur = false ;
					if( is_uploaded_file($tmp_file) ) {
						$name_file = $_FILES[\'upload\'][\'name\'];
						if (preg_match(_FILEBROWSER_FILETYPE_REGEX, $name_file)) {
							if (!move_uploaded_file($tmp_file, $dir_name .\'/\'. $name_file)) {
								$erreur = 3 ; 
							}
						} else { $erreur = 2 ; }
					} else { $erreur = 1 ; }

					if ($erreur) {
						@unlink($tmp_file) ;
						$errmsg = array(
							1=>_T(\'ckeditor:erreur_transmission\'), 
							2=>_T(\'ckeditor:type_fichier_interdit\'), 
							3=>_T(\'ckeditor:erreur_droits\')
						) ;
						$message = strip_tags(_T(\'ckeditor:copie_impossible\', array(\'fichier\'=> $name_file, \'errmsg\'=>$errmsg[$erreur]))) ;
					} else {
						$url =  _FILEBROWSER_FILES_BASE_URL.$request_dir.$name_file ;
					}
				} else {
					$message = strip_tags(_T(\'ckeditor:acces_interdit\')) ;
				}
				echo "<script type=\'text/javascript\'>window.parent.CKEDITOR.tools.callFunction($funcNum, \'$url\', \'$message\');</script>";

		} else  {

			if (_request(\'upload\') == \'form\') {
				if ($peut_telecharger) {
					print(\'<div id="upload"><button onclick="window.location=\\\'?page=filebrowser&dir=\'.$request_dir.$cke_request.\'\\\';">\'._T(\'ckeditor:retour\').\'</button></div>\'."\\n") ;
					print(\'<h1>\'._T(\'ckeditor:telecharger_document\').\'</h1>\'."\\n") ;
					print(_T(\'ckeditor:liste_telechargements_autorises\', array(\'liste\' => $extauth))) ;
					print(_T(\'ckeditor:taille_maximale_telechargements\', array(\'taille\' => _FILEBROWSER_UPLOAD_MAXSIZE))) ;
					print(\'<form method="post" action="?page=filebrowser&dir=\'.$request_dir.$cke_request.\'&upload=post" enctype="multipart/form-data" name="upload">\'."\\n") ;
					print(\'<input type="hidden" name="MAX_FILE_SIZE" value="\'.(_FILEBROWSER_UPLOAD_MAXSIZE*_MO).\'" />\'."\\n") ;
					print(\'<div class="centre">\'."\\n");
					print(\'<input type="file" name="fichier" size="30" />\'."\\n") ;
					print(\'<input type="submit" name="upload" value="\'._T(\'ckeditor:telecharger\').\'" />\'."\\n") ;
					print(\'</div>\'."\\n");
					print(\'</form>\'."\\n") ;
				} else {
					print("<p>"._T(\'ckeditor:acces_interdit\')."</p>") ;
				}
			} elseif (_request(\'upload\') == \'post\') {
				if ($peut_telecharger) {
					$tmp_file = $_FILES[\'fichier\'][\'tmp_name\'];

					$erreur = -1 ;
					if( is_uploaded_file($tmp_file) ) {
						$name_file = $_FILES[\'fichier\'][\'name\'];
						if (preg_match(_FILEBROWSER_FILETYPE_REGEX, $name_file)) {
							if (move_uploaded_file($tmp_file, $dir_name .\'/\'. $name_file)) {
								$erreur = false ;
							} else { $erreur = 3 ; }
						} else { $erreur = 2 ; }
					} else { $erreur = 1 ; }

					print(\'<div id="upload"><button onclick="window.location=\\\'?page=filebrowser&dir=\'.$request_dir.$cke_request.\'\\\';">\'._T(\'ckeditor:retour\').\'</button></div>\'."\\n") ;
					print(\'<h1>\'._T(\'ckeditor:telecharger_document\').\'</h1>\'."\\n") ; 

					if ($erreur) {
						@unlink($tmp_file) ;
						$errmsg = array(
							1=>_T(\'ckeditor:erreur_transmission\'), 
							2=>_T(\'ckeditor:type_fichier_interdit\'), 
							3=>_T(\'ckeditor:erreur_droits\')
						) ;
						print(_T(\'ckeditor:copie_impossible\', array(\'fichier\'=> $name_file, \'errmsg\'=>$errmsg[$erreur]))) ;
					} else {
						print(\'<p>\'._T(\'ckeditor:copie_reussie\', array(\'fichier\'=> $name_file)).\'</p>\') ;
						$txt = _T(\'ckeditor:utiliser_fichier\', array(\'fichier\'=> $name_file)) ;
						print(\'<p><button onclick="javascript:loadFile(\\\'\'._FILEBROWSER_FILES_BASE_URL.$request_dir.$name_file.\'\\\');">\'.$txt.\'</button></p>\');
					}
				} else {
					print("<p>"._T(\'ckeditor:acces_interdit\')."</p>") ;
				}
			} else {
				if ($peut_mkdir && ($mkdir = _request(\'mkdir\'))) {
					@mkdir($dir_name.\'/\'.$mkdir) ;
				}

				$h_dir = @opendir($dir_name) ;
				$dirs = array() ;
				$files = array() ;

				if ($h_dir) {
					while ($filename = @readdir($h_dir)) {
						if (_FILEBROWSER_HIDE_DOT_FILES && (strpos($filename, \'.\') === 0)) {
							continue ;
						}
						if (filetype($dir_name . \'/\' . $filename) == \'dir\') {
							if ( ($filename != \'.\') && ($filename != \'..\') ) {
								$dirs[] = array($filename,$request_dir.($request_dir?\'/\':\'\').$filename, _T(\'ckeditor:acceder_repertoire\', array(\'repertoire\'=>$filename))) ;
							}
						} else {
							$files[]= $filename ;
						}
					}
					print(\'<div id="fichiers">\'."\\n") ;
					natsort($dirs) ;
					if ($request_dir && ($request_dir != \'.\')) {
						array_unshift($dirs, array(\'↑\', dirname($request_dir), _T(\'ckeditor:repertoire_parent\'), \' updir\')) ;
					}
					$img = "<img src=\'".find_in_path(\'images/folder.png\')."\' alt=\'\'/>" ;
					foreach($dirs as $dir) {
						print(\'<div class="repertoire\'.$dir[3].\'"><a title="\'.$dir[2].\'" href="?page=filebrowser&dir=\'.$dir[1].$cke_request.\'"><div class="rep-apercu">\'.$img.\'</div><div class="rep-nom">\'.$dir[0]. \'</div></a></div>\'."\\n") ;
					}
					if ($peut_mkdir) {
						print(\'<div class="repertoire"><a href="#" onclick="var mkdir=prompt(\\\'\'._T(\'ckeditor:nom_repertoire_creer\').\'\\\');if (mkdir) window.location=\\\'?page=filebrowser&dir=\'.$request_dir.$cke_request.\'&mkdir=\\\'+encodeURIComponent(mkdir);"><div class="rep-apercu"><img src="\'.find_in_path(\'images/folder-new.png\').\'" alt=""/></div><div class="rep-nom action">\'._T(\'ckeditor:nouveau\').\'</div></a></div>\');
					}
					print(\'<div class="clear"></div>\'."\\n") ;
					natsort($files) ;
					if ($request_dir == \'.\') { $request_dir = \'\' ; }
					if ($request_dir) { $request_dir .= \'/\' ; }
					$GLOBALS[\'meta\'][\'formats_graphiques\'] = $GLOBALS[\'meta\'][\'gd_formats\'] ;
					include_spip(\'inc/filtres_images_mini\') ;
					foreach($files as $file) {
						if (preg_match(_FILEBROWSER_FILETYPE_REGEX, $file)) {
							$fileinfo = pathinfo($file) ;
							if (preg_match(_FILEBROWSER_IMG_EXT_REGEX, $fileinfo[\'extension\'], $match)) {
								$img = image_reduire("<img src=\'"._FILEBROWSER_DIR."/$request_dir$file\' style=\'\' alt=\'$file\'/>",50,50) ;
							} else if ($img = find_in_path(\'vignettes/\'.$fileinfo[\'extension\'].\'.png\')) {
								$img = "<img src=\'".$img."\' alt=\'$file\'/>" ;
							} else {
								$img = "<img src=\'".find_in_path(\'vignettes/defaut.png\')."\' alt=\'$file\'/>" ;
							}
							print(\'<div class="fichier"><a href="#" onclick="javascript:loadFile(\\\'\'._FILEBROWSER_FILES_BASE_URL.$request_dir.$file.\'\\\');" title="\'._T(\'ckeditor:utiliser_fichier\', array(\'fichier\'=> $file)). \'"><div class="fichier-apercu">\'.$img.\'</div><div class="fichier-nom">\'.$file.\'</div></a></div>\'."\\n") ;
						}
					}
					$peut_telecharger && print(\'<div class="fichier"><a href="#" onclick="window.location=\\\'?page=filebrowser&dir=\'.$request_dir.$cke_request.\'&upload=form\\\';"><div class="fichier-apercu"><img src="\'.find_in_path(\'images/document-new.png\').\'" alt=""/></div><div class="fichier-nom action">\'._T(\'ckeditor:telecharger\').\'</div></a></div>\'."\\n") ;
					print(\'<div class="clear"></div></div>\'."\\n") ;

				}
			}
		}
	} else {
		print("<p>"._T(\'ckeditor:acces_interdit\')."</p>") ;
	}
 ?>
</body>
</html>
');
	}
	@sql_free($result, 'condition');
	}
	return $t0;
}


//
// Fonction principale du squelette plugins/ckeditor-spip-plugin/filebrowser.html
// Temps de compilation total: 109.212 ms
//

function html_cc046277bfdc53418c9f227dec2f5996($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-type: text/html' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
' .
BOUCLE_sihtml_cc046277bfdc53418c9f227dec2f5996($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_cc046277bfdc53418c9f227dec2f5996', $Cache, $page, 'plugins/ckeditor-spip-plugin/filebrowser.html');
}
?>