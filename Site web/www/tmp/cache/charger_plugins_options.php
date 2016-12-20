<?php
if (defined('_ECRIRE_INC_VERSION')) {
if (file_exists($f=_ROOT_PLUGINS.'auto/cfg/'.'cfg_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'cimobile/'.'cimobile_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/forms_et_tables_2_0/'.'forms_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/couteau_suisse/'.'cout_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'auto/spip-bonux/'.'spip_bonux_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_PLUGINS.'ckeditor-spip-plugin/'.'ckeditor_options.php')){ include_once $f;}
if (file_exists($f=_ROOT_EXTENSIONS.'compresseur/'.'compresseur_http.php')){ include_once $f;}
if (!function_exists('boutons_plugins')){function boutons_plugins(){return unserialize('a:4:{s:23:"couteau_suisse_config21";a:6:{s:6:"parent";s:19:"bando_configuration";s:8:"position";s:0:"";s:5:"titre";s:18:"couteauprive:titre";s:5:"icone";s:21:"images/couteau-16.png";s:3:"url";s:20:"admin_couteau_suisse";s:4:"args";s:0:"";}s:10:"pages_tous";a:6:{s:6:"parent";s:8:"naviguer";s:8:"position";s:0:"";s:5:"titre";s:19:"pages:pages_uniques";s:5:"icone";s:18:"images/page-24.png";s:3:"url";s:0:"";s:4:"args";s:0:"";}s:16:"bando_pages_tous";a:6:{s:6:"parent";s:13:"bando_edition";s:8:"position";s:0:"";s:5:"titre";s:19:"pages:pages_uniques";s:5:"icone";s:18:"images/page-16.png";s:3:"url";s:10:"pages_tous";s:4:"args";s:0:"";}s:10:"page_creer";a:6:{s:6:"parent";s:14:"outils_rapides";s:8:"position";s:0:"";s:5:"titre";s:16:"pages:creer_page";s:5:"icone";s:22:"images/page-new-16.png";s:3:"url";s:13:"articles_edit";s:4:"args";s:40:"new=oui&amp;type=page&amp;id_rubrique=-1";}}');}}
if (!function_exists('onglets_plugins')){function onglets_plugins(){return unserialize('a:0:{}');}}
}
?>