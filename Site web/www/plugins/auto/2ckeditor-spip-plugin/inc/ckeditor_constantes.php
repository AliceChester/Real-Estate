<?php
include_spip('inc/ckeditor_tools') ;
define('_CKE_JS', find_in_path('lib/ckeditor/ckeditor.js')) ;
define('_CKE_JQUERY', find_in_path('lib/ckeditor/adapters/jquery.js')) ;
define('_CKE_SPIP', url_absolue(_DIR_RACINE.'?page=ckeditor4spip.js')) ;
define('_CKE_HTML2SPIP_VERSION', 'html2spip-0.3') ;
define('_CKE_PATH', dirname(_CKE_JS)) ;
define('_CKE_LARGE_DEF', 490 ) ;
define('_CKE_ETROIT_DEF', 430 ) ;
define('_CKE_LARGE', ckeditor_lire_config("cktoolslenlarge",_CKE_LARGE_DEF) ) ;
define('_CKE_ETROIT', ckeditor_lire_config("cktoolslenetroit",_CKE_ETROIT_DEF) ) ;
define('_CKE_MAXSIZETOOLS', ($_COOKIE['spip_ecran']=='large'?_CKE_LARGE:_CKE_ETROIT)) ;
define('_CKE_PREFERED_VERSION', '3.5') ;
define('_CKE_RACINE_REGEX', '#^'.preg_quote(_DIR_RACINE, '#').'#') ;
define('_CKE_FONTKIT', _DIR_IMG."FontKits") ;
define('_CKE_DIR_SMILEYS', _DIR_PLUGIN_COUTEAU_SUISSE."img/smileys/'") ;
define('_CKE_GOOGLE_WEBFONT', 'http://fonts.googleapis.com/css?family=' ) ;
define('_CKE_DIR_UPLOAD', _DIR_IMG.'UserFiles' ) ;
define('_CKE_IMAGES_UPLOAD', 'Images' ) ;
define('_CKE_FLASH_UPLOAD', 'Flash' ) ;
define('_CKE_FILES_UPLOAD', 'Files' ) ;
define('_CKE_IMAGES_EXT_PARDEF','jpeg; jpg; gif; png' ) ; 
define('_CKE_FLASH_EXT_PARDEF','swf; flv' ) ;
define('_CKE_FILES_EXT_PARDEF','txt; csv' ) ;
define('_CKE_ENTERMODE_DEF', 'ENTER_P' ) ;
define('_CKE_SHIFTENTERMODE_DEF', 'ENTER_BR' ) ;
define('_CKE_SCAYT_LANG_DEF', 'fr_FR' ) ;
define('_CKE_LANGAGE_DEF', 'auto' ) ;
define('_CKE_HAUTEUR_DEF', 500 ) ;
define('_CKE_VIGNETTE_DEF', 0 ) ;
define('_CKE_SKIN_DEF', 'kama' ) ;
define('_CKE_EDITMODE_DEF', 'ckeditor') ;
define('_CKE_SCAYT_START_DEF', true ) ;
define('_CKE_BARREOUTILS_DEF', "\t[ ['About'] ]" ) ;
define('_CKE_PROTECTEDTAGS_DEF', 'embXX;docXX;imgXX' ) ;
define('_CKE_HTML2SPIP_DEF', false ) ;
define('_CKE_HTML2SPIP_LIMITE_DEF', false ) ;
define('_CKE_HTML2SPIP_IDENTITE', 'script;embed;param;object') ;
define('_CKE_SPIPLINKS_DEF', true ) ;
define('_CKE_INSERTALL_DEF', false ) ;
define('_CKE_USE_KCFINDER_DEF', false ) ;
define('_CKE_USE_DIRECT_UPLOAD_DEF', true ) ;
define('_CKE_PARCOURS_DEF', true ) ;
define('_CKE_UPLOAD_DEF', true ) ;
define('_CKE_UPLOAD_REDAC_DEF', false ) ;
define('_CKE_MKDIR_DEF', true ) ;
define('_CKE_MKDIR_REDAC_DEF', false ) ;
define('_CKE_FORMATS_DEF', 'h3;pre' ) ;
define('_CKE_WEBFONTS_DEF', '' ) ;
define('_CKE_FONTKIT_DEF', true ) ;
define('_CKE_INSERT_CSSPUBLIC_DEF', true ) ;
define('_CKE_INSERT_CSSPRIVEE_DEF', true ) ;
define('_CKE_STYLES_DEF', 'Gras: strong.spip
Italique: i.spip
Intertitre: h3.spip
Noir: span { color: black; }
Rouge: span { color: red; }
Fond Noir: span { background-color: black; }
Fond Rouge: span { background-color: red; }' ) ;
define('_CKE_PLUGINSBARREPOSITION_DEF', _T('ckeditor:fin')) ;

?>
