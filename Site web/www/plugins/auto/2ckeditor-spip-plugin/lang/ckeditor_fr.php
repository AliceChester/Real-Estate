<?php

// This is a SPIP module file  --  Ceci est un fichier module de SPIP

$GLOBALS[$GLOBALS['idx_lang']] = array(

// A
	'acceder_repertoire' => 'Acc&#233;der au r&#233;pertoire : @repertoire@.',
	'acces_interdit' => 'Acc&#232;s interdit.',
	'aide_contextes' => 'Indiquez ici une liste d&#39;identifiants CSS (<code>#identifiant</code>) ou de classes CSS (<code>.class</code>) qui pourront &#234;tre appliqu&#233;es au &lt;body&gt; de l&#39;&#233;diteur. Vous pouvez pr&#233;ciser une description du contexte en entrant : <code>#contexte|description</code> ou <code>.contexte|description</code>.<br/><strong>Exemple :</strong> <code>#colonne_un|Colonne principale; .colonne_gauche|Colonne de gauche ; .colonne_droite|Colonne de droite ; #extrait|Comme extrait de texte</code>',
	'aide_couleurs' => 'Entrez ici, une liste de couleurs au format : rvb ou rrvvbb (exemple : 999 333 939 993 399 339 933 393).<br/>Ceci permet, par exemple, de pr&#233;d&#233;finir les couleurs de la CSS du site et ainsi de maintenir une certaine unit&#233; au site.<br/>Toute entr&#233;e invalide est ignor&#233;e.',
	'aide_css_site' => 'Entrez ici, une liste (s&#233;par&#233;e par des virgules) de feuilles de style du site &#224; utiliser dans CKEditor.',
	'aide_fontkit' => 'Cochez cette option pour pouvoir utiliser les kits de police de <a href="http://www.fontsquirrel.com/">Font Squirrel</a> que vous aurez pr&#233;alablement d&#233;compress&#233;es dans un r&#233;pertoire par kit dans _DIR_IMG/FontKits/.',
	'aide_formats' => 'Exemple : <code style="color: green;">div;pre;h3</code>',
	'aide_html2spip_non_trouvee' => 'La librairie <code>html2spip</code> n&#39;est pas install&#233;e. Vous ne pouvez b&#233;n&#233;ficier de la traduction automatique du HTML vers SPIP. Veuillez d&#39;abord installer : <a href="http://ftp.espci.fr/pub/html2spip/html2spip-0.3.zip">la librairie <code>html2spip</code></a> dans le r&#233;pertoire <code>lib/</code>. ',
	'aide_images_modele' => 'Si vous voulez modifier les images propos&#233;es, vous pouvez cr&#233;er un r&#233;pertoire <code>images/templates/</code> dans votre r&#233;pertoire <code>squelettes</code>.',
	'aide_inserer_la_css' => 'Si vous cochez ces options, c&#39;est le plugin qui va se charger d&#39;ins&#233;rer le code HTML chargeant les CSS des polices, sinon, vous devrez modifier les squelettes de vos pages pour les ins&#233;rer dans celles que vous d&#233;sirez.',
	'aide_plugin' => 'Si vous voulez installez des plugins pour CKEditor, il faut cr&#233;er un dossier <code>plugins/ckeditor</code> accessible depuis la commande <code>#CHEMIN</code> de spip (par exemple dans le dossier <code>squelettes</code>).',
	'aide_styles' => 'Tout style correctement d&#233;fini ici s&#39;affichera dans le "combo styles" de CKEditor.<br>Un style doit respecter la syntaxe :<pre style="color: green;">NOM : element.class { css }</pre>Dans lequel, <ul><li><strong>NOM</strong> est : n&#39;importe quelle chaine de carat&#232;res, c&#39;est le nom qui s&#39;affichera dans CKEditor,</li><li><strong>element</strong> est : un &#233;l&#233;ment HTML (strong, em, span, et c...), la s&#233;lection &#224; laquelle vous appliquerez ce styles sera dans un bloc HTML du type de cet &#233;l&#233;ment,</li><li><strong>class</strong> (facultatif) est : un nom de classe CSS &#224; d&#233;finir dans votre feuille de style,</li><li><strong>css</strong> (facultatif) est : du code CSS valide, comme par exemple <code style="color: green;">color: blue;</code> (aucun test n&#39;est fait, une erreur peut faire planter le javascript g&#233;n&#233;r&#233; et emp&#234;cher l&#39;&#233;diteur de s&#39;afficher).</li></ul><strong>⚠ Attention :</strong> vous devez savoir manipuler le CSS pour pouvoir modifier le contenu de cette page.',
	'aide_vignette' => 'Entrez ici la taille maximale des vignettes utilis&#233;es par CKEditor. Si vous laissez cette zone vide, les images seront affich&#233;es avec leur taille normale par CKEditor.',
	'aide_webfonts' => 'Entrez ici, une liste (s&#233;par&#233;e par des virgules) de noms de police <a target="_blank" onclick="window.open(this.href,&#39;_blank&#39;,&#39;height=500,width=500,location=no,scrollbar=yes&#39;);return false;" href="http://code.google.com/webfonts">Google Web Fonts</a>. Les noms doivent &#234;tre exactement ceux propos&#233; dans le r&#233;pertoire de polices de google.',
	'apres' => 'apr&#232;s',
	'article' => 'article',
	'aucun_document' => 'Aucun document',
	'aucun_document_descriptif' => 'Vous n&#39;avez encore t&#233;l&#233;charg&#233; aucun document.',
	'aucun_plugin' => 'SPIP ne d&#233;tecte aucun plugin dans le dossier des plugins, veuillez y d&#233;compresser les ZIP contenant des plugins pour CKEditor. Chaque plugin doit &#234;tre dans un dossier individuel comme s&#39;il &#233;tait install&#233; dans le dossier <code>plugins</code> de CKEditor.',
	'autoriser_autres_couleurs' => 'autoriser d&#39;autres couleurs',
	'autoriser_insertion_documents' => '&nbsp;Autoriser l&#39;insertion des documents de n&#39;importe quel article.',
	'autoriser_liens_spip' => '&nbsp;Autoriser les liens/ancres de type SPIP.',
	'autoriser_mkdir' => 'Autoriser &#224; cr&#233;er des r&#233;pertoires@plus@.',
	'autoriser_parcours_dossier_spip' => 'Autoriser &#224; parcourir le dossier de SPIP pour ins&#233;rer des images.',
	'autoriser_redacteurs' => 'autoriser aussi les r&#233;dacteurs@plus@.',
	'autoriser_telechargement_dossier_spip' => 'Autoriser &#224; t&#233;l&#233;charger des images dans le dossier de SPIP.',
	'avant' => 'avant',

// B
	'balises_spip_autoriser' => 'Balises SPIP &#224; autoriser dans CKEditor :',
	'balises_spip_autoriser_descriptif' => '
Entrez les balises s&#233;par&#233;es par des «&nbsp;;&nbsp;», pour sp&#233;cifier une balise contenant un num&#233;ro, tapez&nbsp;: <code>baliseXX</code><br/><strong>Exemple(1)&nbsp;: </strong>pour autoriser des balises du type&nbsp;: &lt;embXX|param1&gt; et &lt;docXX|param1&gt;, sp&#233;cifez&nbsp;: <code>docXX ; embXX</code><br/><strong>Exemple(2)&nbsp;: </strong>pour autoriser des balises du type &lt;multi&gt;...&lt;/multi&gt; sp&#233;cifez&nbsp;: <code>multi ; /multi</code>
',
	'bouton' => 'activer le bouton',

// C
	'changer_de_contexte' => 'Contexte :',
	'changer_d_image' => 'Changer d&#39;image :',
	'choisir_skin' => 'Choisir une skin :',
	'choix_et_telechargement' => 'Choix et t&#233;l&#233;chargement d&#39;images :',
	'ckeditor' => 'Configuration de base',
	'ckeditor_b' => 'Configuration des barres d&#39;outils',
	'ckeditor_c' => 'Configuration avanc&#233;e',
	'ckeditor_d' => 'T&#233;l&#233;chargement d&#39;images/documents',
	'ckeditor_defaut' => 'CKEditor par d&#233;faut',
	'ckeditor_e' => 'Configuration des styles',
	'ckeditor_exclu' => 'CKEditor exclusivement',
	'ckeditor_f' => 'Configuration des mod&#232;les',
	'ckeditor_g' => 'Plugins pour CKEDITOR',
	'ck_delete' => 'Configuration r&#233;initialis&#233;e.',
	'ck_ko' => 'Erreur dans les param&#232;tres.',
	'ck_ok' => 'Configuration enregistr&#233;e.',
	'ck_reinit' => 'Le plugin est compl&#232;tement r&#233;initialis&#233;.',
	'configuration_des_couleurs' => 'Configuration des couleurs :',
	'configuration_des_polices' => 'Configuration des polices :',
	'configuration_modeles' => 'Gestion des mod&#232;les :',
	'configuration_styles' => 'Configuration des styles CKEditor',
	'config_avancee' => 'Configuration avanc&#233;e',
	'config_barres_outils' => 'Configuration des barres d&#39;outils',
	'config_base' => 'Configuration de base',
	'confirmer_supprimer_modele' => '&#202;tes vous sur de vouloir supprimer ce mod&#232;le ?',
	'confirme_reinitialiser_plugin' => '&#202;tes vous sur de vouloir r&#233;initialiser le plugun ? (Cela supprimera toutes vos pr&#233;f&#233;rences)',
	'contenu_du_modele' => 'Contenu du mod&#232;le :',
	'copie_impossible' => '<p>Impossible de copier <code>@fichier@</code></p><blockquote>@errmsg@</blockquote>',
	'copie_reussie' => 'Le fichier : <code>@fichier@</code> a &#233;t&#233; correctement copi&#233;.',
	'css_site' => 'Feuilles de style du site (CSSs) :',

// D
	'demarrer_correction_ortho' => 'D&#233;marrer la correction orthographique en :',
	'desactive_car_zappe_par_html2spip' => 'D&#233;sactiv&#233; car zapp&#233; par HTML2SPIP.',
	'description' => 'Description :',
	'documents_article' => 'Afficher uniquement les documents de l&#39;article en cours d&#39;&#233;dition.',
	'documents_rubrique' => 'Afficher uniquement les documents de la rubrique en cours d&#39;&#233;dition.',

// E
	'editer_modele' => 'Editer le mod&#232;le',
	'edition_du_modele' => 'Edition du mod&#232;le',
	'enregistrer_modele' => 'Enregister le mod&#232;le',
	'entermode' => 'Entr&#233;e donne un :',
	'enter_br' => 'saut de ligne (br)',
	'enter_div' => 'paragraphe (div)',
	'enter_p' => 'paragraphe (p)',
	'erreur_droits' => 'erreur de droits sur le r&#233;pertoire de destination',
	'erreur_transmission' => 'erreur de transmission',
	'err_conversion' => '<p>Probl&#232;me de converions. Aucune conversion.</p>',
	'err_filesdir_pas_de_sousrep' => 'Fichiers : Entrez un nom de sous r&#233;pertoire sans /',
	'err_files_extensions_autorisees' => 'Pour les extensions autoris&#233;es pour les fichiers, r&#233;spectez le format : <code>ext<sub>1</sub> ; ext<sub>2</sub> ; ... ; ext<sub>n</sub></code>.',
	'err_flashdir_pas_de_sousrep' => 'Flash : Entrez un nom de sous r&#233;pertoire sans /',
	'err_flash_extensions_autorisees' => 'Pour les extensions autoris&#233;es pour les documents Flash, r&#233;spectez le format : <code>ext<sub>1</sub> ; ext<sub>2</sub> ; ... ; ext<sub>n</sub></code>.',
	'err_images_extensions_autorisees' => 'Pour les extensions autoris&#233;es pour les images, r&#233;spectez le format : <code>ext<sub>1</sub> ; ext<sub>2</sub> ; ... ; ext<sub>n</sub></code>.',
	'err_imgdir_pas_de_sousrep' => 'Images : Entrez un nom de sous r&#233;pertoire sans /',
	'err_la_largeur_ecran_etroit_doit_etre_numerique' => 'La largeur de l&#39;&#233;cran (&#233;troit) doit &#234;tre un nombre.',
	'err_la_largeur_ecran_large_doit_etre_numerique' => 'La largeur de l&#39;&#233;cran (large) doit &#234;tre un nombre.',
	'err_mauvaise_liste_de_formats' => 'R&#233;spectez la syntaxe des formats.',
	'err_mauvaise_skin' => 'Mauvaise skin.',
	'err_mauvaise_syntaxe_de_tag' => 'R&#233;spectez la syntaxe des <code>tags</code> SPIP &#224; autoriser.',
	'err_mauvais_code_de_langue' => 'Mauvais code de langue.',
	'err_mauvais_langage' => 'Le langage doit &#234;tre un code &#224; 2 lettres.',
	'err_mauvais_mode_d_edition' => 'Mauvais mode d&#39;&#233;dition.',
	'err_mauvais_mode_entree' => 'Le mode <code>ENTREE</code> doit r&#233;specter une syntaxe pr&#233;cise.',
	'err_mauvais_mode_shiftentree' => 'Le mode <code>SHIFT+ENTREE</code> doit r&#233;specter une syntaxe pr&#233;cise.',
	'err_repertoire_parent_interdit' => 'Il est interdit de r&#233;monter dans l&#39;arboressence pour le r&3233;pertoire parent.',
	'err_taille_doit_etre_numerique' => 'La hauteur de l&#39;&#233;diteur doit &#234;tre un nombre.',
	'err_vignette_doit_etre_numerique' => 'Les vignettes doivent avoir une dimension num&#233;rique.',
	'etroit' => '&Eacute;cran &#233;troit : ',
	'explique_div' => '<em>div</em> : dans  ce mode l&#39;appui sur la touche [Entr&#233;e] provoque l&#39;insertion d&#39;un bloc html &lt;div&gt;, avantage : cela tient compte des informations de mise en page (alignement, etc...) de ces blocks, inconv&#233;nient : cela ne respecte pas la mise en page standard de SPIP, mais il est possible de le faire en choississant convenablement la feuille de style.',
	'explique_p' => '<em>p</em> : dans ce mode, l&#39;appui sur la touche [Entr&#233;e] provoque l&#39;insertion d&#39;un bloc html &lt;p&gt;, avantage : cela respecte la mise en page SPIP, inconv&#233;nient : SPIP ne tient pas compte des informations de mise en page (alignement, etc...) de ces blocks.',
	'explorateur_titre' => 'Explorateur de fichier pour CKeditor-spip-plugin',
	'extensions_autorisees_descriptif' => 'Entrez les extensions s&#233;par&#233;es par des « ; ».',

// F
	'files_extensions_autorisees' => 'Liste des extensions autoris&#233;es :',
	'fin' => 'fin',
	'flash_extensions_autorisees' => 'Liste des extensions autoris&#233;es :',
	'formats' => 'Liste des tags HTML pr&#233;sents dans le "combo formats" :',

// G
	'gestion_plugins_ckeditor' => 'Gestion des plugins pour CKEditor',

// H
	'hauteur_editeur' => 'Hauteur de l&#39;&#233;diteur : ',
	'html2spip_limite' => 'N&#39;utiliser que les options de CKEditor compatibles avec les raccourcis typographiques SPIP',
	'html2spip_identite' => 'Balises HTML que HTML2SPIP doit laisser intouch&eacute;es',

// I
	'images_extensions_autorisees' => 'Liste des extensions autoris&#233;es :',
	'inserer_la_css_prive' => 'Ins&#233;rer les CSS dans la partie priv&#233;e.',
	'inserer_la_css_public' => 'Ins&#233;rer les CSS dans la partie publique.',

// K
	'kcfinder_ignore' => ' (option ignor&#233;e par KCFinder)',

// L
	'label_article' => 'Article :',
	'label_auteur' => 'Auteur :',
	'label_breve' => 'Br&#234;ve :',
	'label_groupe_mots' => 'Groupe de mots cl&#233;s :',
	'label_mot' => 'Mot cl&#233; :',
	'label_section' => 'Rubrique :',
	'langue_ckeditor' => 'Langue de CKEditor :',
	'large' => '&Eacute;cran large :',
	'largeur_barre_outils' => 'Largeur maximale disponible pour les barres d&#39;outils (pixels) :',
	'listes_des_couleurs_presentees' => 'Liste des couleurs pr&#233;sent&#233;es :',
	'liste_de_contextes' => 'Liste de contextes :',
	'liste_google_webfonts' => 'Liste des polices <a href="http://code.google.com/webfonts">Google Web Fonts</a> &#224; inclure :',
	'liste_telechargements_autorises' => '<p>Les types de fichiers autoris&#233;s sont : <blockquote>@liste@</blockquote>',

// M
	'modeles_necessitent_iterateurs' => 'L&#39;utilisation et la configuration des mod&#233;les n&#233;cessitent le plugin <a href="http://www.spip-contrib.net/Les-Iterateurs-pour-SPIP-2-1"><code>it&#233;rateurs</code></a> et donc spip 2.1 au moins ou spip 2.2, mais cette fonctionnalit&#233; est facultative .',
	'modele_cree' => 'Le mod&#232;le <strong>@modele@</strong> est cr&#233;&#233;.',
	'modele_enregistre' => 'Le mod&#232;le <strong>@modele@</strong> est enregistr&#233;.',
	'modele_image' => 'Image du mod&#232;le :',
	'modele_supprime' => 'Mod&#232;le <strong>@modele@</strong> supprim&#233;.',
	'mode_edition_defaut' => 'Mode d&#39;&#233;dition : ',

// N
	'nom_du_bouton' => 'nom du bouton :',
	'nom_nouveau_modele' => 'Nom du mod&#232;le :',
	'nom_repertoire_creer' => 'Nom du r&#233;pertoire &#224; cr&#233;er :',
	'normalement_detectee' => 'Normalement cette valeur est autod&#233;tect&#233;e.',
	'nouveau' => 'Nouveau',
	'nouveau_modele' => 'Nouveau mod&#232;le',
	'nouveau_modele_sans_nom' => 'Nouveau mod&#232;le sans nom.',

// O
	'ok' => 'Ok',
	'options_css' => 'Options CSS :',
	'options_html2spip' => 'Options HTML2SPIP',
	'options_spip' => 'Options SPIP :',

// P
	'page_config_ckeditor' => '
<h4>Configuration du plugin CKEditor</h4>
<hr style=&#39;clear:both;&#39;/>
<p>Ici vous pouvez configurer le fonctionnement de CKEditor.</p>
<p>En particulier, vous pouvez :</p>
<ul>
	<li>modifier les barres d&#39;outils (<em>pensez &agrave; le faire sinon vous n&#39;aurez aucun outils dans les barres d&#39;outils)</em>,</li>
	<li>activer la correction orthographique,</li>
	<li>permettre l&#39;utilisation de certaines balises SPIP.</li>
</ul>
',
	'pixels' => 'pixels',
	'plugin' => 'plugin : ',
	'plugins_barre_position' => 'Position des boutons :',
	'plugins_necessitent_iterateurs' => 'L&#39;utilisation et la configuration des plugins CKEditor n&#233;cessitent le plugin <a href="http://www.spip-contrib.net/Les-Iterateurs-pour-SPIP-2-1"><code>it&#233;rateurs</code></a> et donc spip 2.1 au moins ou spip 2.2, mais cette fonctionnalit&#233; est facultative .',
	'plugin_active' => 'activer le plugin',

// R
	'reinitialiser_le_plugin' => 'R&#233;initialiser le plugin',
	'repertoire_des_fichiers' => 'R&#233;pertoire des fichiers :',
	'repertoire_des_flash' => 'R&#233;pertoire des documents Flash® :',
	'repertoire_des_images' => 'R&#233;pertoire des images :',
	'repertoire_de_base' => 'R&#233;pertoire de base des t&#233;l&#233;chargements :',
	'repertoire_parent' => 'Acc&#233;der au r&#233;pertoire parent.',
	'reset_toolbars' => 'R&#233;initialise les barres d&#39;outils',
	'retour' => 'Retour',
	'rubrique' => 'rubrique',

// S
	'sans_contexte' => 'sans contexte',
	'selection_aucun' => 'Tout d&#233;s&#233;lectionner',
	'selection_document_spip' => 'S&#233;lection d&#39;un document SPIP',
	'selection_inverse' => 'Inverser la  s&#233;lection',
	'selection_tout' => 'Tout s&#233;lectionner',
	'shiftentermode' => 'Shift + Entr&#233;e donne un :',
	'spipification' => 'Copyright &copy; 2009 <a style="text-decoration:underline;color:blue;cursor:pointer;" href="http://code.google.com/p/ckeditor-spip-plugin/">Plugin SPIP</a> - Fr&#233;d&#233;ric Bonnaud, Mehdi Cherifi',
	'spip_defaut' => 'SPIP par d&#233;faut',
	'styles' => 'Styles :',
	'supprimer' => 'Supprimer',
	'supprimer_modele' => 'Supprimer le mod&#232;le',

// T
	'taille_maximale_telechargements' => '<p>La taille maximale autoris&#233;e d&#39;un fichier est de @taille@Mo.</p>',
	'telecharger' => 'T&#233;l&#233;charger',
	'telecharger_document' => 'T&#233;l&#233;charger un document',
	'tool_About' => '&#192; propos',
	'tool_Anchor' => 'Ancre',
	'tool_BGColor' => 'Couleur du fond',
	'tool_Blockquote' => 'Blockquote',
	'tool_Bold' => 'Gras',
	'tool_BulletedList' => 'Liste &#224; puces',
	'tool_Button' => 'Bouton',
	'tool_Checkbox' => 'Boite &#224; cocher',
	'tool_Copy' => 'Copier',
	'tool_Cut' => 'Couper',
	'tool_Find' => 'Chercher',
	'tool_Flash' => 'Flash',
	'tool_Font' => 'Polices',
	'tool_FontSize' => 'Taille de police',
	'tool_Form' => 'Formulaire',
	'tool_Format' => 'Formats',
	'tool_HiddenField' => 'Champ cach&#233;',
	'tool_HorizontalRule' => 'Trait horizontal',
	'tool_Iframe' => 'IFrame',
	'tool_Image' => 'Image',
	'tool_ImageButton' => 'Bouton avec image',
	'tool_Indent' => 'Indenter',
	'tool_Italic' => 'Italique',
	'tool_JustifyBlock' => 'Justifier',
	'tool_JustifyCenter' => 'Centrer',
	'tool_JustifyLeft' => 'Aligner &#224; gauche',
	'tool_JustifyRight' => 'Aligner &#224; droite',
	'tool_Link' => 'Lien',
	'tool_Maximize' => 'Maximiser',
	'tool_NewPage' => 'Nouvelle page',
	'tool_NumberedList' => 'Liste num&#233;rot&#233;e',
	'tool_Outdent' => 'D&#233;sindenter',
	'tool_PageBreak' => 'Saut de page',
	'tool_Paste' => 'Coller',
	'tool_PasteFromWord' => 'Coller depuis Word',
	'tool_PasteText' => 'Coller comme texte',
	'tool_Preview' => 'Pr&#233;visualisation',
	'tool_Print' => 'Imprimer',
	'tool_Radio' => 'Bouton radio',
	'tool_Redo' => 'Refaire',
	'tool_RemoveFormat' => 'Enlever les formats',
	'tool_Replace' => 'Remplacer',
	'tool_Scayt' => 'Correction durant la frappe',
	'tool_Select' => 'Boite &#224; s&#233;lectionner',
	'tool_SelectAll' => 'Tout s&#233;lectionner',
	'tool_ShowBlocks' => 'Montrer les blocks',
	'tool_Smiley' => '&#201;motic&#244;ne',
	'tool_Source' => 'Source',
	'tool_SpecialChar' => 'Caract&#232;re sp&#233;cial',
	'tool_SpellChecker' => 'Correcteur orthographique',
	'tool_Spip' => 'Lien Spip',
	'tool_SpipDoc' => 'Document Spip',
	'tool_Spipsave' => 'Sauver',
	'tool_Strike' => 'Barr&#233;',
	'tool_Styles' => 'Styles',
	'tool_Subscript' => 'Indice',
	'tool_Superscript' => 'Exposant',
	'tool_Table' => 'Tableau',
	'tool_Templates' => 'Mod&#232;les',
	'tool_Textarea' => 'Zone texte',
	'tool_TextColor' => 'Couleur du texte',
	'tool_TextField' => 'Champ texte',
	'tool_Underline' => 'Soulign&#233;',
	'tool_Undo' => 'D&#233;faire',
	'tool_Unlink' => 'Supprimer le lien',
	'tous' => 'tous',
	'tous_documents' => 'Afficher tous les documents disponibles enregistr&#233;s par SPIP.',
	'type_article' => 'Article',
	'type_auteur' => 'Auteur',
	'type_breve' => 'Br&#234;ve',
	'type_fichier_interdit' => 'type de fichier interdit',
	'type_groupemot' => 'Groupe de mots cl&#233;s',
	'type_mot' => 'Mot cl&#233;',
	'type_section' => 'Rubrique',

// U
	'url_site' => 'URL du site :',
	'use_ckeditor' => 'Utiliser CKEditor',
	'use_spip_editor' => 'Utiliser l&#39;&#233;diteur SPIP',
	'utiliser_fichier' => 'Utiliser le fichier : @fichier@.',
	'utiliser_html2spip' => 'Reconvertir l&apos;HTML en typo SPIP',
	'utiliser_html2spip_descriptif' => 'Utilise la librairie HTML2SPIP pour reconvertir l&apos;HTML en typo SPIP. En activant cette option, vous pouvez utiliser ckeditor tout en pr&eacute;servant l&apos;usage de la typographie SPIP dans vos articles.',
	'utiliser_une_vignette_pour_les_images' => 'Utiliser des vignettes de : ',
	'utilise_fontkit' => 'Utiliser les kits de polices Font Squirrel.',
	'utilise_kcfinder' => 'Utiliser <a href="http://kcfinder.sunhater.com/" target="_blank" title="T&#233;l&#233;charger le, et installer le dans le r&#233;pertoire /lib">KCFinder</a> si possible.',
	'utilise_kcfinderupload' => 'Autoriser le t&#233;l&#233;chargement depuis les dialogues de CKEDITOR.',

// V
	'version_preferee' => 'CKEditor version %1 est install&#233;, ce plugin pr&#233;f&#233;rerait la version %2. Veuillez d&#39;abord d&#233;sintaller la version actuelle.',
	'visuel' => 'CKEditor',

// Chaines probablement pas utilisée :
/* On les garde au cas où ...
*/
);
?>
