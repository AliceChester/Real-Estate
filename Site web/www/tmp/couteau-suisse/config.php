<?php
// Configuration de controle pour le plugin 'Couteau Suisse'

// Tous les outils et leurs variables
$liste_outils = array(
	// Retours de ligne automatiques
	'autobr' => 'alinea|alinea2|pp_edition_autobr|pp_forum_autobr',
	// Dossier du squelette
	'dossier_squelettes' => 'dossier_squelettes',
	// Supprime le numéro
	'supprimer_numero' => '',
	// Paragrapher
	'paragrapher2' => 'paragrapher',
	// Force la langue
	'forcer_langue' => '',
	// Liste des webmestres
	'webmestres' => 'webmestres',
	// Balise #INSERT_HEAD
	'insert_head' => '',
	// Balise #INTRODUCTION
	'introduction' => 'lgr_introduction|suite_introduction|lien_introduction',
	// Type d'interface privée
	'set_options' => 'radio_set_options4',
	// Gestion du JavaScript
	'filtrer_javascript' => 'radio_filtrer_javascript3',
	// Taille des forums
	'forum_lgrmaxi' => 'forum_lgrmaxi',
	// Limites mémoire
	'SPIP_tailles' => 'img_Hmax|img_Wmax|img_Smax|logo_Hmax|logo_Wmax|logo_Smax|doc_Smax|copie_Smax|img_GDmax|img_GDqual',
	// Prévisualisation des articles
	'previsualisation' => '',
	// Masquer du contenu
	'masquer' => 'mot_masquer',
	// Pas de forums anonymes
	'auteur_forum' => 'auteur_forum_nom|auteur_forum_email|auteur_forum_deux',
	// Suivi des forums publics
	'suivi_forums' => 'radio_suivi_forums3',
	// Lutte contre le SPAM
	'spam' => 'spam_mots|spam_ips',
	// Pas de stockage IP
	'no_IP' => '',
	// Pas de verrouillage de fichiers
	'flock' => '',
	// Ecran de sécurité
	'ecran_securite' => 'ecran_actif|ecran_load',
	// Comportements du Couteau Suisse
	'cs_comportement' => 'log_couteau_suisse|spip_options_on|distant_off|distant_outils_off',
	// Validateur XML
	'xml' => '',
	// Désactive jQuery
	'f_jQuery' => '',
	// Site en travaux
	'en_travaux' => 'message_travaux|titre_travaux|admin_travaux|avertir_travaux|prive_travaux',
	// Boîtes privées
	'boites_privees' => 'cs_rss|format_spip|stat_auteurs|qui_webmasters|bp_urls_propres|bp_tri_auteurs',
	// Page des auteurs
	'auteurs' => 'max_auteurs_page|auteurs_tout_voir|auteurs_0|auteurs_1|auteurs_5|auteurs_6|auteurs_n',
	// Version texte
	'verstexte' => '',
	// Orientation des images
	'orientation' => '',
	// Découpe en pages et onglets
	'decoupe' => 'balise_decoupe|pp_edition_decoupe|pp_forum_decoupe',
	// Sommaire automatique
	'sommaire' => 'prof_sommaire|lgr_sommaire|jolies_ancres|auto_sommaire|balise_sommaire',
	// Intertitres en image
	'titres_typo' => 'i_taille|i_couleur|i_police|i_largeur|i_hauteur|i_padding|i_align',
	// Désactive les objets flash
	'desactiver_flash' => '',
	// SPIP et les liens… externes
	'SPIP_liens' => 'radio_target_blank3|url_glossaire_externe2|enveloppe_mails',
	// Visiteurs connectés
	'visiteurs_connectes' => '',
	// Blocs multilingues
	'toutmulti' => '',
	// Belles puces
	'pucesli' => 'puceSPIP',
	// Citations bien balisées
	'citations_bb' => '',
	// Décoration
	'decoration' => 'decoration_styles|pp_edition_decoration|pp_forum_decoration',
	// Tout en couleurs
	'couleurs' => 'couleurs_fonds|set_couleurs|couleurs_perso|pp_edition_couleurs|pp_forum_couleurs',
	// Exposants typographiques
	'typo_exposants' => 'expo_bofbof',
	// Guillemets typographiques
	'guillemets' => '',
	// Belles URLs
	'liens_orphelins' => 'liens_interrogation|liens_orphelins',
	// Filets de Séparation
	'filets_sep' => 'pp_edition_filets_sep|pp_forum_filets_sep',
	// Smileys
	'smileys' => 'pp_edition_smileys|pp_forum_smileys',
	// Chatons
	'chatons' => 'pp_edition_chatons|pp_forum_chatons',
	// Glossaire interne
	'glossaire' => 'glossaire_groupes|glossaire_limite|glossaire_js',
	// MailCrypt
	'mailcrypt' => '',
	// Liens en clair
	'liens_en_clair' => '',
	// Ancres douces
	'soft_scroller' => 'scrollTo|LocalScroll',
	// Jolis Coins
	'jcorner' => 'jcorner_classes|jcorner_plugin',
	// Corrections automatiques
	'insertions' => 'insertions',
	// Modération modérée
	'moderation_moderee' => 'moderation_admin|moderation_redac|moderation_visit',
	// Balises #TITRE_PARENT/OBJET
	'titre_parent' => 'titres_etendus',
	// Balise #SET étendue
	'balise_set' => '',
	// La corbeille
	'corbeille' => 'arret_optimisation',
	// Trousse à balises
	'trousse_balises' => '',
	// Horloge
	'horloge' => '',
	// Mises à jour automatiques
	'maj_auto' => '',
	// Réglage des sélecteurs
	'brouteur' => 'rubrique_brouteur|select_mots_clefs|select_min_auteurs|select_max_auteurs',
	// Les tris de SPIP
	'tri_articles' => 'tri_articles|tri_perso|tri_groupes|tri_perso_groupes',
	// Largeur d'écran
	'spip_ecran' => 'spip_ecran',
	// Allègement de l'interface privée
	'simpl_interface' => '',
	// Bouton « Visiter »
	'icone_visiter' => '',
	// Dans la m&ecirc;me rubrique
	'meme_rubrique' => 'meme_rubrique',
	// Blocs Dépliables
	'blocs' => 'bloc_unique|blocs_cookie|bloc_h4|blocs_slide|blocs_millisec|pp_edition_blocs|pp_forum_blocs',
	// SPIP et ses raccourcis…
	'class_spip' => 'racc_hr|puce|racc_h1|racc_h2|racc_g1|racc_g2|racc_i1|racc_i2|ouvre_ref|ferme_ref|ouvre_note|ferme_note|style_p|style_h',
	// Débogueur de développement
	'devdebug' => 'devdebug_mode|devdebug_espace|devdebug_niveau',
	// SPIP et le cache…
	'spip_cache' => 'radio_desactive_cache4|quota_cache|derniere_modif_invalide|duree_cache|duree_cache_mutu|compacte_css|compacte_js|compacte_prive',
	// Format des URLs
	'type_urls' => 'radio_type_urls3|terminaison_urls_page|separateur_urls_page|terminaison_urls_propres|debut_urls_propres|marqueurs_urls_propres|url_max_propres|debut_urls_propres2|marqueurs_urls_propres2|url_max_propres2|terminaison_urls_libres|debut_urls_libres|url_max_libres|url_arbo_minuscules|urls_arbo_sans_type|url_arbo_sep_id|terminaison_urls_arbo|url_max_arbo|terminaison_urls_propres_qs|url_max_propres_qs|terminaison_urls_propres_qs|marqueurs_urls_propres_qs|url_max_propres_qs|spip_script|urls_minuscules|urls_avec_id|urls_avec_id2|urls_id_3_chiffres|urls_id_sauf_rubriques|urls_id_sauf_liste'
);

// Outils actifs
$outils_actifs =
	'supprimer_numero|forcer_langue|decoupe|guillemets|mailcrypt|soft_scroller|corbeille|blocs';

// Variables actives
$variables_actives =
	'balise_decoupe|pp_edition_decoupe|pp_forum_decoupe|scrollTo|LocalScroll|arret_optimisation|bloc_unique|blocs_cookie|bloc_h4|blocs_slide|blocs_millisec|pp_edition_blocs|pp_forum_blocs';

// Valeurs validees en metas
$valeurs_validees = array(
	'bloc_unique' => 0,
	'blocs_cookie' => 0,
	'bloc_h4' => 'h4',
	'blocs_slide' => 'slow',
	'blocs_millisec' => 100,
	'pp_edition_blocs' => 1,
	'pp_forum_blocs' => 1,
	'radio_type_urls3' => 'page',
	'terminaison_urls_page' => '',
	'separateur_urls_page' => '',
	'terminaison_urls_propres' => '.html',
	'debut_urls_propres' => '',
	'marqueurs_urls_propres' => 1,
	'url_max_propres' => 60,
	'debut_urls_propres2' => '',
	'marqueurs_urls_propres2' => 1,
	'url_max_propres2' => 35,
	'terminaison_urls_libres' => '',
	'debut_urls_libres' => '',
	'url_max_libres' => 35,
	'url_arbo_minuscules' => 1,
	'urls_arbo_sans_type' => 1,
	'url_arbo_sep_id' => '-',
	'terminaison_urls_arbo' => '.html',
	'url_max_arbo' => 35,
	'terminaison_urls_propres_qs' => '',
	'url_max_propres_qs' => 35,
	'marqueurs_urls_propres_qs' => 1,
	'spip_script' => 'spip.php',
	'urls_minuscules' => 1,
	'urls_avec_id' => 0,
	'urls_avec_id2' => 0,
	'urls_id_3_chiffres' => 0,
	'urls_id_sauf_rubriques' => 0,
	'urls_id_sauf_liste' => 'rubrique:auteur'
);

######## PACK ACTUEL DE CONFIGURATION DU COUTEAU SUISSE #########

// Attention, les surcharges sur les define(), les autorisations spécifiques ou les globales ne sont pas spécifiées ici

$GLOBALS['cs_installer']['Pack 29/02/12'] =	'cs_70a953abd7653d228ea5ffcf698b4326';
function cs_70a953abd7653d228ea5ffcf698b4326() { return array(
	// Installation des outils par défaut
	'outils' =>
		'supprimer_numero,
		forcer_langue,
		decoupe,
		guillemets,
		mailcrypt,
		soft_scroller,
		corbeille,
		blocs',

	// Installation des variables par défaut
	'variables' => array(
		'bloc_unique' => 0,
		'blocs_cookie' => 0,
		'bloc_h4' => 'h4',
		'blocs_slide' => 'slow',
		'blocs_millisec' => 100,
		'pp_edition_blocs' => 1,
		'pp_forum_blocs' => 1
	)
);} # Pack 29/02/12 #
?>