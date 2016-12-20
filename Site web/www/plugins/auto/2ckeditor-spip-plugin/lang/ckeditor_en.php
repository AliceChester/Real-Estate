<?php

// This is a SPIP module file  --  Ceci est un fichier module de SPIP

$GLOBALS[$GLOBALS['idx_lang']] = array(

// A
	'acceder_repertoire' => '', /* missing (Acc&#233;der au r&#233;pertoire : @repertoire@.) */
	'acces_interdit' => '', /* missing (Acc&#232;s interdit.) */
	'aide_contextes' => '', /* missing (Indiquez ici une liste d&#39;identifiants CSS (<code>#identifiant</code>) ou de classes CSS (<code>.class</code>) qui pourront &#234;tre appliqu&#233;es au &lt;body&gt; de l&#39;&#233;diteur. Vous pouvez pr&#233;ciser une description du contexte en entrant : <code>#contexte|description</code> ou <code>.contexte|description</code>.<br/><strong>Exemple :</strong> <code>#colonne_un|Colonne principale; .colonne_gauche|Colonne de gauche ; .colonne_droite|Colonne de droite ; #extrait|Comme extrait de texte</code>) */
	'aide_couleurs' => '', /* missing (Entrez ici, une liste de couleurs au format : rvb ou rrvvbb (exemple : 999 333 939 993 399 339 933 393).<br/>Ceci permet, par exemple, de pr&#233;d&#233;finir les couleurs de la CSS du site et ainsi de maintenir une certaine unit&#233; au site.<br/>Toute entr&#233;e invalide est ignor&#233;e.) */
	'aide_css_site' => 'Enter here a list (separated by commas) style sheets of site within CKEditor.',
	'aide_fontkit' => '', /* missing (Cochez cette option pour pouvoir utiliser les kits de police de <a href="http://www.fontsquirrel.com/">Font Squirrel</a> que vous aurez pr&#233;alablement d&#233;compress&#233;es dans un r&#233;pertoire par kit dans _DIR_IMG/FontKits/.) */
	'aide_formats' => 'Example : <code style="color: green;">div;pre;h3</code>',
	'aide_html2spip_non_trouvee' => '', /* missing (La librairie <code>html2spip</code> n&#39;est pas install&#233;e. Vous ne pouvez b&#233;n&#233;ficier de la traduction automatique du HTML vers SPIP. Veuillez d&#39;abord installer : <a href="http://ftp.espci.fr/pub/html2spip/html2spip-0.1.zip">la librairie <code>html2spip</code></a> dans le r&#233;pertoire <code>lib/</code>. ) */
	'aide_images_modele' => '', /* missing (Si vous voulez modifier les images propos&#233;es, vous pouvez cr&#233;er un r&#233;pertoire <code>images/templates/</code> dans votre r&#233;pertoire <code>squelettes</code>.) */
	'aide_inserer_la_css' => '', /* missing (Si vous cochez ces options, c&#39;est le plugin qui va se charger d&#39;ins&#233;rer le code HTML chargeant les CSS des polices, sinon, vous devrez modifier les squelettes de vos pages pour les ins&#233;rer dans celles que vous d&#233;sirez.) */
	'aide_plugin' => '', /* missing (Si vous voulez installez des plugins pour CKEditor, il faut cr&#233;er un dossier <code>plugins/ckeditor</code> accessible depuis la commande <code>#CHEMIN</code> de spip (par exemple dans le dossier <code>squelettes</code>).) */
	'aide_styles' => 'Any style correctly defined here will appear in the "combo styles" of CKEditor.<br>A style must follow the syntax:<pre style="color: green;">NOM : element.class { css }</pre>In which, <ul><li><strong>NOM</strong> is: 	any string of characters long, it is the name that will appear in CKEditor,</li><li><strong>element</strong> is: an HTML element (strong, em, span, et c...), the selection you apply this style will be in an HTML block of that element type,</li><li><strong>class</strong> (optional) is: a class name to define CSS in your stylesheet,</li><li><strong>css</strong> (optional) is: valid CSS code, such as <code style="color: green;">color: blue;</code> (no testing is done, one error can crash the javascript generated and preventing the editor display).</li></ul><strong>Attention :</strong> you need to know CSS to manipulate\to change the content of this page.',
	'aide_vignette' => '', /* missing (Entrez ici la taille maximale des vignettes utilis&#233;es par CKEditor. Si vous laissez cette zone vide, les images seront affich&#233;es avec leur taille normale par CKEditor.) */
	'aide_webfonts' => '', /* missing (Entrez ici, une liste (s&#233;par&#233;e par des virgules) de noms de police <a target="_blank" onclick="window.open(this.href,&#39;_blank&#39;,&#39;height=500,width=500,location=no,scrollbar=yes&#39;);return false;" href="http://code.google.com/webfonts">Google Web Fonts</a>. Les noms doivent &#234;tre exactement ceux propos&#233; dans le r&#233;pertoire de polices de google.) */
	'apres' => '', /* missing (apr&#232;s) */
	'article' => 'article',
	'aucun_document' => '', /* missing (Aucun document) */
	'aucun_document_descriptif' => '', /* missing (Vous n&#39;avez encore t&#233;l&#233;charg&#233; aucun document.) */
	'aucun_plugin' => '', /* missing (SPIP ne d&#233;tecte aucun plugin dans le dossier des plugins, veuillez y d&#233;compresser les ZIP contenant des plugins pour CKEditor. Chaque plugin doit &#234;tre dans un dossier individuel comme s&#39;il &#233;tait install&#233; dans le dossier <code>plugins</code> de CKEditor.) */
	'autoriser_autres_couleurs' => '', /* missing (autoriser d&#39;autres couleurs) */
	'autoriser_insertion_documents' => '&nbsp;Allow insertion of documents from any article.',
	'autoriser_liens_spip' => '&nbsp;Allow links/anchors in SPIP style.',
	'autoriser_mkdir' => '', /* missing (Autoriser &#224; cr&#233;er des r&#233;pertoires@plus@.) */
	'autoriser_parcours_dossier_spip' => '', /* missing (Autoriser &#224; parcourir le dossier de SPIP pour ins&#233;rer des images.) */
	'autoriser_redacteurs' => '', /* missing (autoriser aussi les r&#233;dacteurs@plus@.) */
	'autoriser_telechargement_dossier_spip' => '', /* missing (Autoriser &#224; t&#233;l&#233;charger des images dans le dossier de SPIP.) */
	'avant' => '', /* missing (avant) */

// B
	'balises_spip_autoriser' => 'SPIP tags to allow in CKEditor:',
	'balises_spip_autoriser_descriptif' => '
Enter tags separated by «&nbsp;;&nbsp;», to specify a tag containing a number, type: <code>baliseXX</code><br/><strong>Example(1): </strong>to allow tags type: &lt;embXX|param1&gt; and &lt;docXX|param1&gt;, specify: <code>docXX ; embXX</code><br/><strong>Example(2): </strong>to allow tags type &lt;multi&gt;...&lt;/multi&gt; specify: <code>multi ; /multi</code>
',
	'bouton' => '', /* missing (activer le bouton) */

// C
	'changer_de_contexte' => '', /* missing (Contexte :) */
	'changer_d_image' => '', /* missing (Changer d&#39;image :) */
	'choisir_skin' => 'Choose a skin:',
	'choix_et_telechargement' => '', /* missing (Choix et t&#233;l&#233;chargement d&#39;images :) */
	'ckeditor' => '', /* missing (Configuration de base) */
	'ckeditor_b' => '', /* missing (Configuration des barres d&#39;outils) */
	'ckeditor_c' => '', /* missing (Configuration avanc&#233;e) */
	'ckeditor_d' => '', /* missing (T&#233;l&#233;chargement d&#39;images/documents) */
	'ckeditor_defaut' => 'CKEditor by default',
	'ckeditor_e' => '', /* missing (Configuration des styles) */
	'ckeditor_exclu' => 'CKEditor only',
	'ckeditor_f' => '', /* missing (Configuration des mod&#232;les) */
	'ckeditor_g' => '', /* missing (Plugins pour CKEDITOR) */
	'ck_delete' => '', /* missing (Configuration r&#233;initialis&#233;e.) */
	'ck_ko' => '', /* missing (Erreur dans les param&#232;tres.) */
	'ck_ok' => '', /* missing (Configuration enregistr&#233;e.) */
	'ck_reinit' => '', /* missing (Le plugin est compl&#232;tement r&#233;initialis&#233;.) */
	'configuration_des_couleurs' => '', /* missing (Configuration des couleurs :) */
	'configuration_des_polices' => '', /* missing (Configuration des polices :) */
	'configuration_modeles' => '', /* missing (Gestion des mod&#232;les :) */
	'configuration_styles' => 'Styles configuration for CKEditor',
	'config_avancee' => 'Advanced Configuration',
	'config_barres_outils' => 'ToolBars Configuration',
	'config_base' => 'Basic Configuration',
	'confirmer_supprimer_modele' => '', /* missing (&#202;tes vous sur de vouloir supprimer ce mod&#232;le ?) */
	'confirme_reinitialiser_plugin' => '', /* missing (&#202;tes vous sur de vouloir r&#233;initialiser le plugun ? (Cela supprimera toutes vos pr&#233;f&#233;rences)) */
	'contenu_du_modele' => '', /* missing (Contenu du mod&#232;le :) */
	'copie_impossible' => '', /* missing (<p>Impossible de copier <code>@fichier@</code></p><blockquote>@errmsg@</blockquote>) */
	'copie_reussie' => '', /* missing (Le fichier : <code>@fichier@</code> a &#233;t&#233; correctement copi&#233;.) */
	'css_site' => 'Stylesheets Site (CSSs):',

// D
	'demarrer_correction_ortho' => 'Start spell checking:',
	'desactive_car_zappe_par_html2spip' => '', /* missing (D&#233;sactiv&#233; car zapp&#233; par HTML2SPIP.) */
	'description' => '', /* missing (Description :) */
	'documents_article' => 'Show only documents of the article being edited.',
	'documents_rubrique' => '', /* missing (Afficher uniquement les documents de la rubrique en cours d&#39;&#233;dition.) */

// E
	'editer_modele' => '', /* missing (Editer le mod&#232;le) */
	'edition_du_modele' => '', /* missing (Edition du mod&#232;le) */
	'enregistrer_modele' => '', /* missing (Enregister le mod&#232;le) */
	'entermode' => 'Enter gives:',
	'enter_br' => 'line break (br)',
	'enter_div' => 'paragraph (div)',
	'enter_p' => 'paragraph (p)',
	'erreur_droits' => '', /* missing (erreur de droits sur le r&#233;pertoire de destination) */
	'erreur_transmission' => '', /* missing (erreur de transmission) */
	'err_conversion' => '', /* missing (<p>Probl&#232;me de converions. Aucune conversion.</p>) */
	'err_filesdir_pas_de_sousrep' => '', /* missing (Fichiers : Entrez un nom de sous r&#233;pertoire sans /) */
	'err_files_extensions_autorisees' => '', /* missing (Pour les extensions autoris&#233;es pour les fichiers, r&#233;spectez le format : <code>ext<sub>1</sub> ; ext<sub>2</sub> ; ... ; ext<sub>n</sub></code>.) */
	'err_flashdir_pas_de_sousrep' => '', /* missing (Flash : Entrez un nom de sous r&#233;pertoire sans /) */
	'err_flash_extensions_autorisees' => '', /* missing (Pour les extensions autoris&#233;es pour les documents Flash, r&#233;spectez le format : <code>ext<sub>1</sub> ; ext<sub>2</sub> ; ... ; ext<sub>n</sub></code>.) */
	'err_images_extensions_autorisees' => '', /* missing (Pour les extensions autoris&#233;es pour les images, r&#233;spectez le format : <code>ext<sub>1</sub> ; ext<sub>2</sub> ; ... ; ext<sub>n</sub></code>.) */
	'err_imgdir_pas_de_sousrep' => '', /* missing (Images : Entrez un nom de sous r&#233;pertoire sans /) */
	'err_la_largeur_ecran_etroit_doit_etre_numerique' => '', /* missing (La largeur de l&#39;&#233;cran (&#233;troit) doit &#234;tre un nombre.) */
	'err_la_largeur_ecran_large_doit_etre_numerique' => '', /* missing (La largeur de l&#39;&#233;cran (large) doit &#234;tre un nombre.) */
	'err_mauvaise_liste_de_formats' => '', /* missing (R&#233;spectez la syntaxe des formats.) */
	'err_mauvaise_skin' => '', /* missing (Mauvaise skin.) */
	'err_mauvaise_syntaxe_de_tag' => '', /* missing (R&#233;spectez la syntaxe des <code>tags</code> SPIP &#224; autoriser.) */
	'err_mauvais_code_de_langue' => '', /* missing (Mauvais code de langue.) */
	'err_mauvais_langage' => '', /* missing (Le langage doit &#234;tre un code &#224; 2 lettres.) */
	'err_mauvais_mode_d_edition' => '', /* missing (Mauvais mode d&#39;&#233;dition.) */
	'err_mauvais_mode_entree' => '', /* missing (Le mode <code>ENTREE</code> doit r&#233;specter une syntaxe pr&#233;cise.) */
	'err_mauvais_mode_shiftentree' => '', /* missing (Le mode <code>SHIFT+ENTREE</code> doit r&#233;specter une syntaxe pr&#233;cise.) */
	'err_repertoire_parent_interdit' => '', /* missing (Il est interdit de r&#233;monter dans l&#39;arboressence pour le r&3233;pertoire parent.) */
	'err_taille_doit_etre_numerique' => '', /* missing (La hauteur de l&#39;&#233;diteur doit &#234;tre un nombre.) */
	'err_vignette_doit_etre_numerique' => '', /* missing (Les vignettes doivent avoir une dimension num&#233;rique.) */
	'etroit' => 'Narrow screen: ',
	'explique_div' => '<em>div</em> : in this mode pressing the [Enter] causes the insertion of a block html &lt;div&gt;, advantage: it takes account of information layout (alignment, etc ...) of these blocks, disadvantage: it does not follow the standard layout of SPIP, but it is possible to do so by selecting the proper style sheet.',
	'explique_p' => '<em>p</em> : in this mode, pressing the [Enter] causes the insertion of a block html &lt;p&gt;, advantage: that respects the SPIP layout, disadvantage: SPIP does not include information layout (alignment, etc ...) of these blocks.',
	'explorateur_titre' => '', /* missing (Explorateur de fichier pour CKeditor-spip-plugin) */
	'extensions_autorisees_descriptif' => '', /* missing (Entrez les extensions s&#233;par&#233;es par des « ; ».) */

// F
	'files_extensions_autorisees' => '', /* missing (Liste des extensions autoris&#233;es :) */
	'fin' => '', /* missing (fin) */
	'flash_extensions_autorisees' => '', /* missing (Liste des extensions autoris&#233;es :) */
	'formats' => '	List of HTML-tags present in the "combo format":',

// G
	'gestion_plugins_ckeditor' => '', /* missing (Gestion des plugins pour CKEditor) */

// H
	'hauteur_editeur' => 'Height Editor: ',
	'html2spip_limite' => '', /* missing (N&#39;utiliser que les options de CKEditor compatibles avec SPIP) */
	'html2spip_identite' => 'HTML tags that HTML2SPIP must leave untouched',

// I
	'images_extensions_autorisees' => '', /* missing (Liste des extensions autoris&#233;es :) */
	'inserer_la_css_prive' => '', /* missing (Ins&#233;rer les CSS dans la partie priv&#233;e.) */
	'inserer_la_css_public' => '', /* missing (Ins&#233;rer les CSS dans la partie publique.) */

// K
	'kcfinder_ignore' => '', /* missing ( (option ignor&#233;e par KCFinder)) */

// L
	'label_article' => '', /* missing (Article :) */
	'label_auteur' => '', /* missing (Auteur :) */
	'label_breve' => '', /* missing (Br&#234;ve :) */
	'label_groupe_mots' => '', /* missing (Groupe de mots cl&#233;s :) */
	'label_mot' => '', /* missing (Mot cl&#233; :) */
	'label_section' => '', /* missing (Rubrique :) */
	'langue_ckeditor' => 'CKEditor language:',
	'large' => 'Wide screen:',
	'largeur_barre_outils' => 'Maximum width available for toolbars (pixels) :',
	'listes_des_couleurs_presentees' => '', /* missing (Liste des couleurs pr&#233;sent&#233;es :) */
	'liste_de_contextes' => '', /* missing (Liste de contextes :) */
	'liste_google_webfonts' => '', /* missing (Liste des polices <a href="http://code.google.com/webfonts">Google Web Fonts</a> &#224; inclure :) */
	'liste_telechargements_autorises' => '', /* missing (<p>Les types de fichiers autoris&#233;s sont : <blockquote>@liste@</blockquote>) */

// M
	'modeles_necessitent_iterateurs' => '', /* missing (L&#39;utilisation et la configuration des mod&#233;les n&#233;cessitent le plugin <a href="http://www.spip-contrib.net/Les-Iterateurs-pour-SPIP-2-1"><code>it&#233;rateurs</code></a> et donc spip 2.1 au moins ou spip 2.2, mais cette fonctionnalit&#233; est facultative .) */
	'modele_cree' => '', /* missing (Le mod&#232;le <strong>@modele@</strong> est cr&#233;&#233;.) */
	'modele_enregistre' => '', /* missing (Le mod&#232;le <strong>@modele@</strong> est enregistr&#233;.) */
	'modele_image' => '', /* missing (Image du mod&#232;le :) */
	'modele_supprime' => '', /* missing (Mod&#232;le <strong>@modele@</strong> supprim&#233;.) */
	'mode_edition_defaut' => 'Edit mode by default: ',

// N
	'nom_du_bouton' => '', /* missing (nom du bouton :) */
	'nom_nouveau_modele' => '', /* missing (Nom du mod&#232;le :) */
	'nom_repertoire_creer' => '', /* missing (Nom du r&#233;pertoire &#224; cr&#233;er :) */
	'normalement_detectee' => 'Normally this is autodetected value.',
	'nouveau' => '', /* missing (Nouveau) */
	'nouveau_modele' => '', /* missing (Nouveau mod&#232;le) */
	'nouveau_modele_sans_nom' => '', /* missing (Nouveau mod&#232;le sans nom.) */

// O
	'ok' => '', /* missing (Ok) */
	'options_css' => '', /* missing (Options CSS :) */
	'options_html2spip' => 'HTML2SPIP Options:',
	'options_spip' => 'SPIP Options:',

// P
	'page_config_ckeditor' => '
<h4>Configuration of the CKEditor plugin</h4>
<p>Here you can configure settings of CKEditor</p>
<p>In particular, you can:</p>
<ul>
	<li>modifier les barres d&#39;outils (<em>think to do it otherwise you will have no tools in the toolbars)</em>,</li>
	<li>enable spell checking,</li>
	<li>allow the use of certain tags SPIP.</li>
<ul>
',
	'pixels' => '', /* missing (pixels) */
	'plugin' => '', /* missing (plugin : ) */
	'plugins_barre_position' => '', /* missing (Position des boutons :) */
	'plugins_necessitent_iterateurs' => '', /* missing (L&#39;utilisation et la configuration des plugins CKEditor n&#233;cessitent le plugin <a href="http://www.spip-contrib.net/Les-Iterateurs-pour-SPIP-2-1"><code>it&#233;rateurs</code></a> et donc spip 2.1 au moins ou spip 2.2, mais cette fonctionnalit&#233; est facultative .) */
	'plugin_active' => '', /* missing (activer le plugin) */

// R
	'reinitialiser_le_plugin' => '', /* missing (R&#233;initialiser le plugin) */
	'repertoire_des_fichiers' => '', /* missing (R&#233;pertoire des fichiers :) */
	'repertoire_des_flash' => '', /* missing (R&#233;pertoire des documents Flash® :) */
	'repertoire_des_images' => '', /* missing (R&#233;pertoire des images :) */
	'repertoire_de_base' => '', /* missing (R&#233;pertoire de base des t&#233;l&#233;chargements :) */
	'repertoire_parent' => '', /* missing (Acc&#233;der au r&#233;pertoire parent.) */
	'reset_toolbars' => '', /* missing (R&#233;initialise les barres d&#39;outils) */
	'retour' => '', /* missing (Retour) */
	'rubrique' => '', /* missing (rubrique) */

// S
	'sans_contexte' => '', /* missing (sans contexte) */
	'selection_aucun' => 'Deselect all',
	'selection_document_spip' => 'Selecting a SPIP document',
	'selection_inverse' => 'Inverse selection',
	'selection_tout' => 'Select all',
	'shiftentermode' => 'Shift + Enter gives:',
	'spipification' => 'Copyright &copy; 2009 <a <a style="text-decoration:underline;color:blue;cursor:pointer;" href="http://code.google.com/p/ckeditor-spip-plugin/">Plugin SPIP</a> - Fr&#233;d&#233;ric Bonnaud, Mehdi Cherifi',
	'spip_defaut' => 'SPIP by default',
	'styles' => 'Styles:',
	'supprimer' => '', /* missing (Supprimer) */
	'supprimer_modele' => '', /* missing (Supprimer le mod&#232;le) */

// T
	'taille_maximale_telechargements' => '', /* missing (<p>La taille maximale autoris&#233;e d&#39;un fichier est de @taille@Mo.</p>) */
	'telecharger' => '', /* missing (T&#233;l&#233;charger) */
	'telecharger_document' => '', /* missing (T&#233;l&#233;charger un document) */
	'tool_About' => '', /* missing (A propos) */
	'tool_Anchor' => '', /* missing (Ancre) */
	'tool_BGColor' => '', /* missing (Couleur du fond) */
	'tool_Blockquote' => '', /* missing (Blockquote) */
	'tool_Bold' => '', /* missing (Gras) */
	'tool_BulletedList' => '', /* missing (Liste &#224; puces) */
	'tool_Button' => '', /* missing (Bouton) */
	'tool_Checkbox' => '', /* missing (Boite &#224; cocher) */
	'tool_Copy' => '', /* missing (Copier) */
	'tool_Cut' => '', /* missing (Couper) */
	'tool_Find' => '', /* missing (Chercher) */
	'tool_Flash' => '', /* missing (Flash) */
	'tool_Font' => '', /* missing (Polices) */
	'tool_FontSize' => '', /* missing (Taille de police) */
	'tool_Form' => '', /* missing (Formulaire) */
	'tool_Format' => '', /* missing (Formats) */
	'tool_HiddenField' => '', /* missing (Champ cach&#233;) */
	'tool_HorizontalRule' => '', /* missing (Trait horizontal) */
	'tool_Iframe' => '', /* missing (IFrame) */
	'tool_Image' => '', /* missing (Image) */
	'tool_ImageButton' => '', /* missing (Bouton avec image) */
	'tool_Indent' => '', /* missing (Indenter) */
	'tool_Italic' => '', /* missing (Italique) */
	'tool_JustifyBlock' => '', /* missing (Justifier) */
	'tool_JustifyCenter' => '', /* missing (Centrer) */
	'tool_JustifyLeft' => '', /* missing (Aligner &#224; gauche) */
	'tool_JustifyRight' => '', /* missing (Aligner &#224; droite) */
	'tool_Link' => '', /* missing (Lien) */
	'tool_Maximize' => '', /* missing (Maximiser) */
	'tool_NewPage' => '', /* missing (Nouvelle page) */
	'tool_NumberedList' => '', /* missing (Liste num&#233;rot&#233;e) */
	'tool_Outdent' => '', /* missing (D&#233;sindenter) */
	'tool_PageBreak' => '', /* missing (Saut de page) */
	'tool_Paste' => '', /* missing (Coller) */
	'tool_PasteFromWord' => '', /* missing (Coller depuis Word) */
	'tool_PasteText' => '', /* missing (Coller comme texte) */
	'tool_Preview' => '', /* missing (Pr&#233;visualisation) */
	'tool_Print' => '', /* missing (Imprimer) */
	'tool_Radio' => '', /* missing (Bouton radio) */
	'tool_Redo' => '', /* missing (Refaire) */
	'tool_RemoveFormat' => '', /* missing (Enlever les formats) */
	'tool_Replace' => '', /* missing (Remplacer) */
	'tool_Scayt' => '', /* missing (Correction durant la frappe) */
	'tool_Select' => '', /* missing (Boite &#224; s&#233;lectionner) */
	'tool_SelectAll' => '', /* missing (Tout s&#233;lectionner) */
	'tool_ShowBlocks' => '', /* missing (Montrer les blocks) */
	'tool_Smiley' => '', /* missing (Emoticone) */
	'tool_Source' => '', /* missing (Source) */
	'tool_SpecialChar' => '', /* missing (Caract&#232;re sp&#233;cial) */
	'tool_SpellChecker' => '', /* missing (Correcteur orthographique) */
	'tool_Spip' => '', /* missing (Lien Spip) */
	'tool_SpipDoc' => '', /* missing (Document Spip) */
	'tool_Spipsave' => '', /* missing (Sauver) */
	'tool_Strike' => '', /* missing (Barr&#233;) */
	'tool_Styles' => '', /* missing (Styles) */
	'tool_Subscript' => '', /* missing (Indice) */
	'tool_Superscript' => '', /* missing (Exposant) */
	'tool_Table' => '', /* missing (Tableau) */
	'tool_Templates' => '', /* missing (Mod&#232;les) */
	'tool_Textarea' => '', /* missing (Zone texte) */
	'tool_TextColor' => '', /* missing (Couleur du texte) */
	'tool_TextField' => '', /* missing (Champ texte) */
	'tool_Underline' => '', /* missing (Soulign&#233;) */
	'tool_Undo' => '', /* missing (D&#233;faire) */
	'tool_Unlink' => '', /* missing (Supprimer le lien) */
	'tous' => 'all',
	'tous_documents' => 'Show all documents made available by SPIP.',
	'type_article' => '', /* missing (Article) */
	'type_auteur' => '', /* missing (Auteur) */
	'type_breve' => '', /* missing (Br&#234;ve) */
	'type_fichier_interdit' => '', /* missing (type de fichier interdit) */
	'type_groupemot' => '', /* missing (Groupe de mots cl&#233;s) */
	'type_mot' => '', /* missing (Mot cl&#233;) */
	'type_section' => '', /* missing (Rubrique) */

// U
	'url_site' => 'Site URL:',
	'use_ckeditor' => 'Use CKEditor',
	'use_spip_editor' => 'Use SPIP editor',
	'utiliser_fichier' => '', /* missing (Utiliser le fichier : @fichier@.) */
	'utiliser_html2spip' => 'Reconvert HTML into SPIP typo',
	'utiliser_html2spip_descriptif' => 'Use the HTML2SPIP library to reconvert HTML into SPIP typo. Using this option, you can use ckeditor while preserving the SPIP typo in your articles. Only &lt;script&gt;, &lt;embed&gt;, &lt;param&gt; and &lt;object&gt; survive the processing',
	'utiliser_une_vignette_pour_les_images' => '', /* missing (Utiliser des vignettes de : ) */
	'utilise_fontkit' => '', /* missing (Utiliser les kits de polices Font Squirrel.) */
	'utilise_kcfinder' => '', /* missing (Utiliser <a href="http://kcfinder.sunhater.com/" target="_blank" title="T&#233;l&#233;charger le, et installer le dans le r&#233;pertoire /lib">KCFinder</a> si possible.) */
	'utilise_kcfinderupload' => '', /* missing (Autoriser le t&#233;l&#233;chargement depuis les dialogues de CKEDITOR.) */
	'utiliser_html2spip' => 'Reconvert HTML into SPIP typo',
	'utiliser_html2spip_descriptif' => 'Use the HTML2SPIP library to reconvert HTML into SPIP typo. Using this option, you can use ckeditor while preserving the SPIP typo in your articles.',

// V
	'version_preferee' => 'CKEditor version %1 is installed, this plugin would prefer the version %2. Please first uninstall this version.',
	'visuel' => 'CKEditor',

// Chaines probablement pas utilisée :
/* On les garde au cas où ...
*/
);
?>
