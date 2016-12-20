<?php
// Code d'inclusion pour le plugin 'Couteau Suisse'
++$GLOBALS['cs_options'];
$GLOBALS['cs_verif']=11;
/* Par defaut : balise_decoupe = 0 */
define('_onglets_FIN', '<span class="csfoo ongl"></span>');
@define('_decoupe_SEPARATEUR', '++++');
if(!defined('_SPIP19300') && isset($_GET['var_recherche'])) {
	include_spip('inc/headers');
	redirige_par_entete(str_replace('var_recherche=', 'decoupe_recherche=', $GLOBALS['REQUEST_URI']));
}
/* Par defaut : arret_optimisation = 0 */

define('_BLOC_TITRE_H', 'h4'); @define('_BLOC_TITLE_SEP', '||');

// Table des traitements
$GLOBALS['table_des_traitements']['TITRE'][]='typo(supprimer_numero(%s),"TYPO",$connect)';
$GLOBALS['table_des_traitements']['TITRE']['mots']='typo(supprimer_numero(%s),"TYPO",$connect)';
$GLOBALS['table_des_traitements']['NOM'][]='typo(supprimer_numero(%s),"TYPO",$connect)';
$GLOBALS['table_des_traitements']['TYPE']['mots']='typo(supprimer_numero(%s),"TYPO",$connect)';
$GLOBALS['table_des_traitements']['TEXTE'][]='cs_nettoie(cs_decoupe(propre(cs_onglets(%s),$connect)))';
$GLOBALS['table_des_traitements']['TEXTE']['articles']='cs_nettoie(cs_decoupe(propre(cs_onglets(%s),$connect)))';
$GLOBALS['table_des_traitements']['TEXTE']['forums']='safehtml(cs_nettoie(cs_decoupe(propre(cs_onglets(%s),$connect))))';
$GLOBALS['table_des_traitements']['TEXTE']['breves']='cs_nettoie(cs_decoupe(propre(cs_onglets(%s),$connect)))';
$GLOBALS['table_des_traitements']['TEXTE']['rubriques']='cs_nettoie(cs_decoupe(propre(cs_onglets(%s),$connect)))';
$GLOBALS['table_des_traitements']['EMAIL'][]='mailcrypt(%s)';
$GLOBALS['cs_post_propre']=1;
?>