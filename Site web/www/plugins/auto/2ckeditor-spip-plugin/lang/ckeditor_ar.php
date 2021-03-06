<?php

// This is a SPIP module file  --  Ceci est un fichier module de SPIP

$GLOBALS[$GLOBALS['idx_lang']] = array(

// A
	'acceder_repertoire' => '', /* missing (Acc&#233;der au r&#233;pertoire : @repertoire@.) */
	'acces_interdit' => '', /* missing (Acc&#232;s interdit.) */
	'aide_contextes' => '', /* missing (Indiquez ici une liste d&#39;identifiants CSS (<code>#identifiant</code>) ou de classes CSS (<code>.class</code>) qui pourront &#234;tre appliqu&#233;es au &lt;body&gt; de l&#39;&#233;diteur. Vous pouvez pr&#233;ciser une description du contexte en entrant : <code>#contexte|description</code> ou <code>.contexte|description</code>.<br/><strong>Exemple :</strong> <code>#colonne_un|Colonne principale; .colonne_gauche|Colonne de gauche ; .colonne_droite|Colonne de droite ; #extrait|Comme extrait de texte</code>) */
	'aide_couleurs' => '', /* missing (Entrez ici, une liste de couleurs au format : rvb ou rrvvbb (exemple : 999 333 939 993 399 339 933 393).<br/>Ceci permet, par exemple, de pr&#233;d&#233;finir les couleurs de la CSS du site et ainsi de maintenir une certaine unit&#233; au site.<br/>Toute entr&#233;e invalide est ignor&#233;e.) */
	'aide_css_site' => '&#1571;&#1583;&#1582;&#1604; &#1607;&#1606;&#1575; &#1602;&#1575;&#1574;&#1605;&#1577; &#40;&#1605;&#1601;&#1589;&#1608;&#1604;&#1577; &#1576;&#1601;&#1608;&#1575;&#1589;&#1604;&#41; &#1571;&#1608;&#1585;&#1575;&#1602; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591; &#1604;&#1604;&#1605;&#1608;&#1602;&#1593; &#1604;&#1604;&#1575;&#1587;&#1578;&#1582;&#1583;&#1575;&#1605; &#1601;&#1610; CKEditor.',
	'aide_fontkit' => '', /* missing (Cochez cette option pour pouvoir utiliser les kits de police de <a href="http://www.fontsquirrel.com/">Font Squirrel</a> que vous aurez pr&#233;alablement d&#233;compress&#233;es dans un r&#233;pertoire par kit dans _DIR_IMG/FontKits/.) */
	'aide_formats' => '&#1605;&#1579;&#1575;&#1604;: <code style="color: green;">div;pre;h3</code>',
	'aide_html2spip_non_trouvee' => '', /* missing (La librairie <code>html2spip</code> n&#39;est pas install&#233;e. Vous ne pouvez b&#233;n&#233;ficier de la traduction automatique du HTML vers SPIP. Veuillez d&#39;abord installer : <a href="http://ftp.espci.fr/pub/html2spip/html2spip-0.1.zip">la librairie <code>html2spip</code></a> dans le r&#233;pertoire <code>lib/</code>. ) */
	'aide_images_modele' => '', /* missing (Si vous voulez modifier les images propos&#233;es, vous pouvez cr&#233;er un r&#233;pertoire <code>images/templates/</code> dans votre r&#233;pertoire <code>squelettes</code>.) */
	'aide_inserer_la_css' => '', /* missing (Si vous cochez ces options, c&#39;est le plugin qui va se charger d&#39;ins&#233;rer le code HTML chargeant les CSS des polices, sinon, vous devrez modifier les squelettes de vos pages pour les ins&#233;rer dans celles que vous d&#233;sirez.) */
	'aide_plugin' => '', /* missing (Si vous voulez installez des plugins pour CKEditor, il faut cr&#233;er un dossier <code>plugins/ckeditor</code> accessible depuis la commande <code>#CHEMIN</code> de spip (par exemple dans le dossier <code>squelettes</code>).) */
	'aide_styles' => '&#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591;  &#1575;&#1604;&#1605;&#1603;&#1578;&#1608;&#1576;&#1577; &#1576;&#1591;&#1585;&#1610;&#1602;&#1577; &#1587;&#1604;&#1610;&#1605;&#1577; &#1587;&#1608;&#1601; &#1578;&#1592;&#1607;&#1585; &#1607;&#1606;&#1575; &#13;&#10;  &#1601;&#1610; "&#1587;&#1585;&#1583; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591;" CKEditor.<br>&#1608;&#1610;&#1580;&#1576; &#1571;&#1606; &#1578;&#1578;&#1576;&#1593; &#1571;&#1587;&#1604;&#1608;&#1576; &#1576;&#1606;&#1575;&#1569; &#1575;&#1604;&#1580;&#1605;&#1604;&#1577;:<code style="color: green;">NOM : element.class { css }</code>&#1571;&#1610;&#1606;, <ul><li><strong>NOM</strong> &#1607;&#1608; &#58; &#1571;&#1610; &#1587;&#1604;&#1587;&#1604;&#1577; &#1605;&#1606; &#1575;&#1604;&#1571;&#1581;&#1585;&#1601;&#1548; &#1607;&#1608; &#1575;&#1604;&#1575;&#1587;&#1605; &#1575;&#1604;&#1584;&#1610; &#1587;&#1608;&#1601; &#1610;&#1592;&#1607;&#1585; &#1601;&#1610; CKEditor,</li><li><strong>element</strong> &#1607;&#1608; &#58; &#1593;&#1606;&#1589;&#1585; HTML (strong, em, span, et c...), &#1575;&#1604;&#1575;&#1582;&#1578;&#1610;&#1575;&#1585; &#1593;&#1606;&#1583; &#1578;&#1591;&#1576;&#1610;&#1602; &#1607;&#1584;&#1575; &#1575;&#1604;&#1571;&#1587;&#1604;&#1608;&#1576; &#1587;&#1608;&#1601; &#1610;&#1603;&#1608;&#1606; &#1601;&#1610; &#1603;&#1578;&#1604;&#1577; HTML &#1605;&#1606; &#1606;&#1608;&#1593; &#1575;&#1604;&#1593;&#1606;&#1589;&#1585;,</li><li><strong>class</strong> (&#40;&#1575;&#1582;&#1578;&#1610;&#1575;&#1585;&#1610;&#41; &#1607;&#1608; &#58; &#1575;&#1587;&#1605; &#1575;&#1604;&#1591;&#1576;&#1602;&#1577; CSS &#1604;&#1578;&#1593;&#1585;&#1610;&#1601; &#1601;&#1610; &#1608;&#1585;&#1602;&#1577; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591;,</li><li><strong>css</strong> &#40;&#1575;&#1582;&#1578;&#1610;&#1575;&#1585;&#1610;&#41; &#1607;&#1608; &#58; &#1585;&#1605;&#1586; CSS &#1587;&#1575;&#1585;&#1610;&#1577; &#1575;&#1604;&#1605;&#1601;&#1593;&#1608;&#1604; &#1548; &#1605;&#1579;&#1604; <code style="color: green;">color: blue;</code> (&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1582;&#1578;&#1576;&#1575;&#1585; &#1582;&#1591;&#1571; &#1610;&#1605;&#1603;&#1606; &#1571;&#1606; &#1610;&#1578;&#1604;&#1601; javascript &#1575;&#1604;&#1605;&#1588;&#1603;&#1604; &#1608;&#1605;&#1606;&#1593; &#1575;&#1587;&#1578;&#1602;&#1576;&#1575;&#1604; &#1575;&#1604;&#1605;&#1581;&#1585;&#1585;).</li></ul><strong>&#1575;&#1604;&#1575;&#1607;&#1605;:</strong> &#1575;&#1606;&#1578; &#1576;&#1581;&#1575;&#1580;&#1577; &#1575;&#1604;&#1609; &#1605;&#1593;&#1585;&#1601;&#1577; &#1575;&#1604;&#1578;&#1604;&#1575;&#1593;&#1576; CSS &#1605;&#1606; &#1571;&#1580;&#1604; &#1578;&#1593;&#1583;&#1610;&#1604; &#1605;&#1590;&#1605;&#1608;&#1606; &#1607;&#1584;&#1607; &#1575;&#1604;&#1589;&#1601;&#1581;&#1577;.',
	'aide_vignette' => '', /* missing (Entrez ici la taille maximale des vignettes utilis&#233;es par CKEditor. Si vous laissez cette zone vide, les images seront affich&#233;es avec leur taille normale par CKEditor.) */
	'aide_webfonts' => '', /* missing (Entrez ici, une liste (s&#233;par&#233;e par des virgules) de noms de police <a target="_blank" onclick="window.open(this.href,&#39;_blank&#39;,&#39;height=500,width=500,location=no,scrollbar=yes&#39;);return false;" href="http://code.google.com/webfonts">Google Web Fonts</a>. Les noms doivent &#234;tre exactement ceux propos&#233; dans le r&#233;pertoire de polices de google.) */
	'apres' => '', /* missing (apr&#232;s) */
	'article' => '&#1605;&#1602;&#1575;&#1604;',
	'aucun_document' => '', /* missing (Aucun document) */
	'aucun_document_descriptif' => '', /* missing (Vous n&#39;avez encore t&#233;l&#233;charg&#233; aucun document.) */
	'aucun_plugin' => '', /* missing (SPIP ne d&#233;tecte aucun plugin dans le dossier des plugins, veuillez y d&#233;compresser les ZIP contenant des plugins pour CKEditor. Chaque plugin doit &#234;tre dans un dossier individuel comme s&#39;il &#233;tait install&#233; dans le dossier <code>plugins</code> de CKEditor.) */
	'autoriser_autres_couleurs' => '', /* missing (autoriser d&#39;autres couleurs) */
	'autoriser_insertion_documents' => '&nbsp;&#1575;&#1604;&#1587;&#1605;&#1575;&#1581; &#1576;&#1573;&#1583;&#1582;&#1575;&#1604; &#1608;&#1579;&#1575;&#1574;&#1602; &#1605;&#1606; &#1571;&#1610; &#1605;&#1602;&#1575;&#1604;.',
	'autoriser_liens_spip' => '&nbsp;&#1578;&#1587;&#1605;&#1581; &#1575;&#1604;&#1585;&#1608;&#1575;&#1576;&#1591; / &#1575;&#1604;&#1605;&#1585;&#1575;&#1587;&#1610; &#1606;&#1608;&#1593; SPIP.',
	'autoriser_mkdir' => '', /* missing (Autoriser &#224; cr&#233;er des r&#233;pertoires@plus@.) */
	'autoriser_parcours_dossier_spip' => '', /* missing (Autoriser &#224; parcourir le dossier de SPIP pour ins&#233;rer des images.) */
	'autoriser_redacteurs' => '', /* missing (autoriser aussi les r&#233;dacteurs@plus@.) */
	'autoriser_telechargement_dossier_spip' => '', /* missing (Autoriser &#224; t&#233;l&#233;charger des images dans le dossier de SPIP.) */
	'avant' => '', /* missing (avant) */

// B
	'balises_spip_autoriser' => ' &#1575;&#1604;&#1593;&#1604;&#1575;&#1605;&#1575;&#1578; &#1575;&#1604;&#1605;&#1587;&#1605;&#1608;&#1581; &#1576;&#1607;&#1575; &#1601;&#1610; CKEditor:',
	'balises_spip_autoriser_descriptif' => '
&#1583;&#1582;&#1608;&#1604; &#1575;&#1604;&#1593;&#1604;&#1575;&#1605;&#1575;&#1578; &#1605;&#1601;&#1589;&#1608;&#1604;&#1577; «&nbsp;;&nbsp;», &#1604;&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1593;&#1604;&#1575;&#1605;&#1577; &#1578;&#1581;&#1578;&#1608;&#1610; &#1593;&#1604;&#1609; &#1593;&#1583;&#1583;&#44; &#1610;&#1603;&#1578;&#1576; <code>baliseXX</code><br/><strong>&#1575;&#1604;&#1605;&#1579;&#1575;&#1604;(1):</strong>&#1604;&#1587;&#1605;&#1575;&#1581; &#1603;&#1578;&#1575;&#1576;&#1577; &#1575;&#1604;&#1593;&#1604;&#1575;&#1605;&#1575;&#1578;:&lt;embXX|param1&gt; &#1608; &lt;docXX|param1&gt;, &#1575;&#1603;&#1578;&#1576;:<code>docXX ; embXX</code><br/><strong>&#1575;&#1604;&#1605;&#1579;&#1575;&#1604;(2):</strong>&#1604;&#1587;&#1605;&#1575;&#1581; &#1603;&#1578;&#1575;&#1576;&#1577; &#1575;&#1604;&#1593;&#1604;&#1575;&#1605;&#1575;&#1578;:&lt;multi&gt;...&lt;/multi&gt; &#1575;&#1603;&#1578;&#1576;:<code>multi ; /multi</code>
',
	'bouton' => '', /* missing (activer le bouton) */

// C
	'changer_de_contexte' => '', /* missing (Contexte :) */
	'changer_d_image' => '', /* missing (Changer d&#39;image :) */
	'choisir_skin' => '&#1575;&#1582;&#1578;&#1610;&#1575;&#1585; &#1605;&#1592;&#1607;&#1585;:',
	'choix_et_telechargement' => '', /* missing (Choix et t&#233;l&#233;chargement d&#39;images :) */
	'ckeditor' => '', /* missing (Configuration de base) */
	'ckeditor_b' => '', /* missing (Configuration des barres d&#39;outils) */
	'ckeditor_c' => '', /* missing (Configuration avanc&#233;e) */
	'ckeditor_d' => '', /* missing (T&#233;l&#233;chargement d&#39;images/documents) */
	'ckeditor_defaut' => 'CKEditor &#1575;&#1601;&#1578;&#1585;&#1575;&#1590;&#1610;&#1575;',
	'ckeditor_e' => '', /* missing (Configuration des styles) */
	'ckeditor_exclu' => 'CKEditor &#1601;&#1602;&#1591;',
	'ckeditor_f' => '', /* missing (Configuration des mod&#232;les) */
	'ckeditor_g' => '', /* missing (Plugins pour CKEDITOR) */
	'ck_delete' => '', /* missing (Configuration r&#233;initialis&#233;e.) */
	'ck_ko' => '', /* missing (Erreur dans les param&#232;tres.) */
	'ck_ok' => '', /* missing (Configuration enregistr&#233;e.) */
	'ck_reinit' => '', /* missing (Le plugin est compl&#232;tement r&#233;initialis&#233;.) */
	'configuration_des_couleurs' => '', /* missing (Configuration des couleurs :) */
	'configuration_des_polices' => '', /* missing (Configuration des polices :) */
	'configuration_modeles' => '', /* missing (Gestion des mod&#232;les :) */
	'configuration_styles' => '&#1578;&#1593;&#1610;&#1610;&#1606; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591; CKEditor',
	'config_avancee' => '&#1578;&#1593;&#1583;&#1610;&#1604;&#1575;&#1578; &#1605;&#1578;&#1602;&#1583;&#1605;&#1577;',
	'config_barres_outils' => '&#1578;&#1593;&#1583;&#1610;&#1604;&#1575;&#1578; &#1588;&#1585;&#1610;&#1591; &#1575;&#1604;&#1571;&#1583;&#1608;&#1575;&#1578;',
	'config_base' => '&#1578;&#1593;&#1583;&#1610;&#1604;&#1575;&#1578; &#1576;&#1587;&#1610;&#1591;&#1577;',
	'confirmer_supprimer_modele' => '', /* missing (&#202;tes vous sur de vouloir supprimer ce mod&#232;le ?) */
	'confirme_reinitialiser_plugin' => '', /* missing (&#202;tes vous sur de vouloir r&#233;initialiser le plugun ? (Cela supprimera toutes vos pr&#233;f&#233;rences)) */
	'contenu_du_modele' => '', /* missing (Contenu du mod&#232;le :) */
	'copie_impossible' => '', /* missing (<p>Impossible de copier <code>@fichier@</code></p><blockquote>@errmsg@</blockquote>) */
	'copie_reussie' => '', /* missing (Le fichier : <code>@fichier@</code> a &#233;t&#233; correctement copi&#233;.) */
	'css_site' => '&#1571;&#1608;&#1585;&#1575;&#1602; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591; &#1604;&#1604;&#1605;&#1608;&#1602;&#1593; (CSSs):',

// D
	'demarrer_correction_ortho' => '&#1576;&#1583;&#1569; &#1575;&#1604;&#1578;&#1583;&#1602;&#1610;&#1602; &#1575;&#1604;&#1573;&#1605;&#1604;&#1575;&#1574;&#1610;:',
	'desactive_car_zappe_par_html2spip' => '', /* missing (D&#233;sactiv&#233; car zapp&#233; par HTML2SPIP.) */
	'description' => '', /* missing (Description :) */
	'documents_article' => '&#1575;&#1604;&#1605;&#1587;&#1578;&#1606;&#1583;&#1575;&#1578; &#1605;&#1606; &#1607;&#1584;&#1575; &#1575; &#1575;&#1604;&#1605;&#1602;&#1575;&#1604; &#1602;&#1610;&#1583; &#1575;&#1604;&#1578;&#1581;&#1585;&#1610;&#1585;.',
	'documents_rubrique' => '', /* missing (Afficher uniquement les documents de la rubrique en cours d&#39;&#233;dition.) */

// E
	'editer_modele' => '', /* missing (Editer le mod&#232;le) */
	'edition_du_modele' => '', /* missing (Edition du mod&#232;le) */
	'enregistrer_modele' => '', /* missing (Enregister le mod&#232;le) */
	'entermode' => 'Enter &#1610;&#1589;&#1576;&#1581;:',
	'enter_br' => '&#1582;&#1591; &#1601;&#1575;&#1589;&#1604; (br)',
	'enter_div' => '&#1601;&#1602;&#1585;&#1577; (div)',
	'enter_p' => '&#1601;&#1602;&#1585;&#1577; (p)',
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
	'etroit' => '&#1575;&#1604;&#1588;&#1575;&#1588;&#1577; &#1575;&#1604;&#1590;&#1610;&#1602;&#1577;: ',
	'explique_div' => '<em>div</em> : &#1601;&#1610; &#1607;&#1584;&#1575; &#1575;&#1604;&#1608;&#1590;&#1593; &#1548; &#1575;&#1604;&#1590;&#1594;&#1591; &#1593;&#1604;&#1609; [Enter] &#1610;&#1578;&#1587;&#1576;&#1576; &#1601;&#1610; &#1575;&#1583;&#1585;&#1575;&#1580; &#1603;&#1578;&#1604;&#1577; html &lt;div&gt;&#1548; &#1575;&#1604;&#1605;&#1610;&#1586;&#1577;&#58; &#1571;&#1606;&#1607; &#1610;&#1571;&#1582;&#1584; &#1601;&#1610; &#1575;&#1604;&#1575;&#1593;&#1578;&#1576;&#1575;&#1585; &#1605;&#1593;&#1604;&#1608;&#1605;&#1575;&#1578; &#1575;&#1604;&#1578;&#1582;&#1591;&#1610;&#1591; &#40;&#1575;&#1604;&#1605;&#1581;&#1575;&#1584;&#1575;&#1577; &#1548; &#1575;&#1604;&#1582;&#46;&#46;&#46;&#41; &#1605;&#1606; &#1607;&#1584;&#1607; &#1575;&#1604;&#1603;&#1578;&#1604; &#1548; &#1575;&#1604;&#1593;&#1610;&#1576; &#58;&#1604;&#1575; &#1610;&#1578;&#1576;&#1593; &#1578;&#1589;&#1605;&#1610;&#1605; &#1605;&#1608;&#1581;&#1583; &#1605;&#1606; SPIP &#1548; &#1608;&#1604;&#1603;&#1606; &#1605;&#1606; &#1575;&#1604;&#1605;&#1605;&#1603;&#1606; &#1575;&#1604;&#1602;&#1610;&#1575;&#1605; &#1576;&#1584;&#1604;&#1603; &#1605;&#1606; &#1582;&#1604;&#1575;&#1604; &#1578;&#1581;&#1583;&#1610;&#1583; &#1608;&#1585;&#1602;&#1577; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591; &#1575;&#1604;&#1587;&#1604;&#1610;&#1605;&#1577;.',
	'explique_p' => '<em>p</em> : &#1601;&#1610; &#1607;&#1584;&#1575; &#1575;&#1604;&#1608;&#1590;&#1593; &#1548; &#1575;&#1604;&#1590;&#1594;&#1591; &#1593;&#1604;&#1609; [Enter] &#1610;&#1578;&#1587;&#1576;&#1576; &#1601;&#1610; &#1575;&#1583;&#1585;&#1575;&#1580; &#1603;&#1578;&#1604;&#1577; html &lt;p&gt;&#1548; &#1575;&#1604;&#1605;&#1610;&#1586;&#1577;&#58; &#58; &#1571;&#1606;&#1607;&#1575; &#1578;&#1581;&#1578;&#1585;&#1605; &#1578;&#1582;&#1591;&#1610;&#1591; SPIP&#1548; &#1575;&#1604;&#1593;&#1610;&#1576; &#58; SPIP &#1604;&#1575; &#1578;&#1578;&#1590;&#1605;&#1606; &#1605;&#1593;&#1604;&#1608;&#1605;&#1575;&#1578; &#1578;&#1582;&#1591;&#1610;&#1591; &#40;&#1575;&#1604;&#1605;&#1581;&#1575;&#1584;&#1575;&#1577; &#1548; &#1575;&#1604;&#1582;&#46;&#46;&#46;&#41; &#1605;&#1606; &#1607;&#1584;&#1607; &#1575;&#1604;&#1603;&#1578;&#1604;.',
	'explorateur_titre' => '', /* missing (Explorateur de fichier pour CKeditor-spip-plugin) */
	'extensions_autorisees_descriptif' => '', /* missing (Entrez les extensions s&#233;par&#233;es par des « ; ».) */

// F
	'files_extensions_autorisees' => '', /* missing (Liste des extensions autoris&#233;es :) */
	'fin' => '', /* missing (fin) */
	'flash_extensions_autorisees' => '', /* missing (Liste des extensions autoris&#233;es :) */
	'formats' => '&#1602;&#1575;&#1574;&#1605;&#1577; &#1575;&#1604;&#1593;&#1604;&#1575;&#1605;&#1575;&#1578; HTML &#1575;&#1604;&#1605;&#1608;&#1580;&#1608;&#1583;&#1577; &#1601;&#1610; "&#1587;&#1585;&#1583; &#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591;":',

// G
	'gestion_plugins_ckeditor' => '', /* missing (Gestion des plugins pour CKEditor) */

// H
	'hauteur_editeur' => '&#1575;&#1585;&#1578;&#1601;&#1575;&#1593; &#1605;&#1581;&#1585;&#1585;:',
	'html2spip_limite' => '', /* missing (N&#39;utiliser que les options de CKEditor compatibles avec SPIP) */
	'html2spip_identite' => '', /* missing (Balises HTML que HTML2SPIP doit laisser intouch&eacute;es) */

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
	'langue_ckeditor' => '&#1604;&#1594;&#1577; CKEditor:',
	'large' => '&#1575;&#1604;&#1588;&#1575;&#1588;&#1577; &#1575;&#1604;&#1593;&#1585;&#1610;&#1590;&#1577;',
	'largeur_barre_outils' => '&#1575;&#1604;&#1581;&#1583; &#1575;&#1604;&#1571;&#1602;&#1589;&#1609;  &#1575;&#1604;&#1605;&#1578;&#1575;&#1581; &#1604;&#1593;&#1585;&#1590; &#1571;&#1588;&#1585;&#1591;&#1577; &#1575;&#1604;&#1571;&#1583;&#1608;&#1575;&#1578; (pixels) :',
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
	'mode_edition_defaut' => '&#1608;&#1590;&#1593; &#1575;&#1604;&#1578;&#1581;&#1585;&#1610;&#1585; &#1575;&#1601;&#1578;&#1585;&#1575;&#1590;&#1610;&#1575;:',

// N
	'nom_du_bouton' => '', /* missing (nom du bouton :) */
	'nom_nouveau_modele' => '', /* missing (Nom du mod&#232;le :) */
	'nom_repertoire_creer' => '', /* missing (Nom du r&#233;pertoire &#224; cr&#233;er :) */
	'normalement_detectee' => '&#1593;&#1575;&#1583;&#1577; &#1575;&#1604;&#1603;&#1588;&#1601; &#1593;&#1606; &#1607;&#1584;&#1607;  &#1575;&#1604;&#1602;&#1610;&#1605;&#1577; &#1610;&#1588;&#1594;&#1604; &#1571;&#1608;&#1578;&#1608;&#1605;&#1575;&#1578;&#1610;&#1603;&#1610;&#1575; .',
	'nouveau' => '', /* missing (Nouveau) */
	'nouveau_modele' => '', /* missing (Nouveau mod&#232;le) */
	'nouveau_modele_sans_nom' => '', /* missing (Nouveau mod&#232;le sans nom.) */

// O
	'ok' => '', /* missing (Ok) */
	'options_css' => '', /* missing (Options CSS :) */
	'options_html2spip' => '', /* missing (Options HTML2SPIP) */
	'options_spip' => '&#1582;&#1610;&#1575;&#1585;&#1575;&#1578; SPIP:',

// P
	'page_config_ckeditor' => '
<h4>&#1578;&#1593;&#1583;&#1610;&#1604;&#1575;&#1578; &#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1605;&#1587;&#1575;&#1593;&#1583; CKEditor</h4>
<p>&#1607;&#1606;&#1575; &#1610;&#1605;&#1603;&#1606;&#1603; &#1590;&#1576;&#1591; CKEditor</p>
<p>&#1576;&#1589;&#1601;&#1577; &#1582;&#1575;&#1589;&#1577; &#1548; &#1610;&#1605;&#1603;&#1606;&#1603;:</p>
<ul>
	<li>&#1578;&#1594;&#1610;&#1610;&#1585; &#1588;&#1585;&#1610;&#1591; &#1575;&#1604;&#1571;&#1583;&#1608;&#1575;&#1578; (<em>&#1601;&#1603;&#1585; &#1575;&#1604;&#1602;&#1610;&#1575;&#1605; &#1576;&#1584;&#1604;&#1603; &#1608;&#1573;&#1604;&#1575; &#1601;&#1604;&#1606; &#1610;&#1603;&#1608;&#1606; &#1604;&#1583;&#1610;&#1607;&#1575; &#1575;&#1604;&#1571;&#1583;&#1608;&#1575;&#1578; &#1601;&#1610; &#1575;&#1604;&#1571;&#1588;&#1585;&#1591;&#1577;)</em>,</li>
	<li>&#1578;&#1605;&#1603;&#1610;&#1606; &#1575;&#1604;&#1578;&#1583;&#1602;&#1610;&#1602; &#1575;&#1604;&#1573;&#1605;&#1604;&#1575;&#1574;&#1610;,</li>
	<li>&#1575;&#1604;&#1587;&#1605;&#1575;&#1581; &#1576;&#1575;&#1587;&#1578;&#1582;&#1583;&#1575;&#1605; &#1576;&#1593;&#1590; &#1575;&#1604;&#1593;&#1604;&#1575;&#1605;&#1575;&#1578; SPIP.</li>
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
	'selection_aucun' => '&#1604;&#1575; &#1575;&#1582;&#1578;&#1610;&#1575;&#1585;',
	'selection_document_spip' => '&#1575;&#1582;&#1578;&#1610;&#1575;&#1585; &#1605;&#1587;&#1578;&#1606;&#1583; SPIP',
	'selection_inverse' => '&#1575;&#1582;&#1578;&#1610;&#1575;&#1585; &#1605;&#1593;&#1603;&#1608;&#1587;',
	'selection_tout' => '&#1575;&#1582;&#1578;&#1610;&#1575;&#1585; &#1603;&#1604; &#1605;&#1606;',
	'shiftentermode' => 'Shift + Enter &#1610;&#1589;&#1576;&#1581;:',
	'spipification' => '&#1581;&#1602;&#1608;&#1602; &#1575;&#1604;&#1578;&#1571;&#1604;&#1610;&#1601; &#1608;&#1575;&#1604;&#1606;&#1588;&#1585; &copy; 2009 <a <a style="text-decoration:underline;color:blue;cursor:pointer;" href="http://code.google.com/p/ckeditor-spip-plugin/">Plugin SPIP</a> - Fr&#233;d&#233;ric Bonnaud, Mehdi Cherifi',
	'spip_defaut' => 'SPIP &#1575;&#1601;&#1578;&#1585;&#1575;&#1590;&#1610;&#1575;',
	'styles' => '&#1575;&#1604;&#1571;&#1606;&#1605;&#1575;&#1591;:',
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
	'tous' => '&#1575;&#1604;&#1603;&#1604;',
	'tous_documents' => '&#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1605;&#1587;&#1578;&#1606;&#1583;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1608;&#1601;&#1585;&#1577; &#1601;&#1610; SPIP.',
	'type_article' => '', /* missing (Article) */
	'type_auteur' => '', /* missing (Auteur) */
	'type_breve' => '', /* missing (Br&#234;ve) */
	'type_fichier_interdit' => '', /* missing (type de fichier interdit) */
	'type_groupemot' => '', /* missing (Groupe de mots cl&#233;s) */
	'type_mot' => '', /* missing (Mot cl&#233;) */
	'type_section' => '', /* missing (Rubrique) */

// U
	'url_site' => '&#1593;&#1606;&#1608;&#1575;&#1606; &#1575;&#1604;&#1605;&#1608;&#1602;&#1593;:',
	'use_ckeditor' => '&#1575;&#1587;&#1578;&#1582;&#1583;&#1575;&#1605; CKEditor',
	'use_spip_editor' => '&#1575;&#1587;&#1578;&#1582;&#1583;&#1575;&#1605; &#1605;&#1581;&#1585;&#1585; SPIP',
	'utiliser_fichier' => '', /* missing (Utiliser le fichier : @fichier@.) */
	'utiliser_html2spip' => '', /* missing (Reconvertir l&apos;HTML en typo SPIP) */
	'utiliser_html2spip_descriptif' => '', /* missing (Utilise la librairie HTML2SPIP pour reconvertir l&apos;HTML en typo SPIP. En activant cette option, vous pouvez utiliser ckeditor tout en pr&eacute;servant l&apos;usage de la typographie SPIP dans vos articles. Seules les balises &lt;script&gt;, &lt;embed&gt;, &lt;param&gt; et &lt;object&gt; survivent au traitement.) */
	'utiliser_une_vignette_pour_les_images' => '', /* missing (Utiliser des vignettes de : ) */
	'utilise_fontkit' => '', /* missing (Utiliser les kits de polices Font Squirrel.) */
	'utilise_kcfinder' => '', /* missing (Utiliser <a href="http://kcfinder.sunhater.com/" target="_blank" title="T&#233;l&#233;charger le, et installer le dans le r&#233;pertoire /lib">KCFinder</a> si possible.) */
	'utilise_kcfinderupload' => '', /* missing (Autoriser le t&#233;l&#233;chargement depuis les dialogues de CKEDITOR.) */
	'utiliser_html2spip' =>  '', /* missing (Reconvertir l&apos;HTML en typo SPIP) */
	'utiliser_html2spip_descriptif' => '', /* missing (Utilise la librairie HTML2SPIP pour reconvertir l&apos;HTML en typo SPIP. En activant cette option, vous pouvez utiliser ckeditor tout en pr&eacute;servant l&apos;usage de la typographie SPIP dans vos articles.) */ 

// V
	'version_preferee' => 'CKEditor &#1575;&#1604;&#1606;&#1587;&#1582;&#1577; %1 &#1605;&#1579;&#1576;&#1577;&#1548; &#1607;&#1584;&#1575; &#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1605;&#1587;&#1575;&#1593;&#1583; &#1610;&#1601;&#1590;&#1604; &#1575;&#1604;&#1606;&#1587;&#1582;&#1577; %2 &#1610;&#1585;&#1580;&#1609; &#1573;&#1604;&#1594;&#1575;&#1569; &#1607;&#1584;&#1607; &#1575;&#1604;&#1606;&#1587;&#1582;&#1577; &#1571;&#1608;&#1604;&#1575; .',
	'visuel' => 'CKEditor',

// Chaines probablement pas utilisée :
/* On les garde au cas où ...
*/
);
?>
