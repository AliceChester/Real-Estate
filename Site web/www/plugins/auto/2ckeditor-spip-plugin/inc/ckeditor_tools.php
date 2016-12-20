<?php

function ckeditor_lire_config($key, $def = null) { // non optimale, mais comportement consitant
	$cfg = lire_config('ckeditor') ;
	if (is_array($cfg) && array_key_exists($key, $cfg)) {
		return $cfg[$key] ;
	} else {
		return $def ;
	}
}

include_spip('outils/smileys');
include_spip('inc/ckeditor_constantes');

if ($protectedtags = trim(ckeditor_lire_config("protectedtags", _CKE_PROTECTEDTAGS_DEF))) {
	$protectedtags = preg_replace(array("/\s*;\s*$/","/^\s*;\s*/"), '', $protectedtags) ;
	define('PROTECTED_SPIP_TAGS', "(?:".
		join("|",
			preg_split("/\s*;\s*/", 
				preg_replace(
					"~X{2,}~",
				  	"\d+", 
					preg_quote($protectedtags, "#" )
		 		)
	 		)
		).
	")" ) ;

} else {
	define('PROTECTED_SPIP_TAGS', '') ;
}

global $cke_conf_cs ; $cke_conf_cs = unserialize($GLOBALS['meta']['tweaks_actifs']) ; // pour éviter les unserialize à répétition

function ckeditor_tweaks_actifs($tweak) { // pour accéder aux outils du couteau suisse
	global $cke_conf_cs ;
	return is_array($cke_conf_cs) && is_array($cke_conf_cs[$tweak]) && $cke_conf_cs[$tweak]['actif'] ;
}

function ckeditor_smileys_actifs() { // devrait être supprimée vu la fonction ckeditor_tweaks_actifs
	return ckeditor_tweaks_actifs('smileys') ;
}

function ckeditor_dump(& $var, $html = true ) { // pour afficher le contenu d'une variable (pour débuggage)
	ob_start() ;
		var_dump($var);
		$content = ob_get_contents() ;
	ob_end_clean() ;
	if ($html) 
		return "<pre>".htmlentities($content)."</pre>" ;
	else 
		return $content ;
}

function ckeditor_traite_lien_html($texte, $lien, $avant, $apres) {
	/* 
	 * Recuperation d'un eventuel title="whatever"
	 */
	$titre = '';
	$title_regex = "/\s?title=[\"']([^\"']*)[\"']\s?/i";

	if (($avant && preg_match($title_regex, $avant, $m)) ||
	    ($apres && preg_match($title_regex, $apres, $m))) {
		$titre = "|".htmlspecialchars_decode(str_replace("\\'",
								 "'", $m[1]),
						     ENT_QUOTES);
		/* 
		 * Et si le avant/apres ne contenait que 
		 * ca, on purge pour eviter le cas 2 dans
		 * le test qui suit.
		 */
		if ($avant == $m[0])
			$avant = '';

		if ($apres == $m[0])
			$apres = '';
	}

	$texte=preg_replace('~\\\(.)~',"$1",$texte);
	if (preg_match("~spip\.php\?page=(\w+)(?:&amp;amp;|&amp;|&)id_\\1=(\d+)(#\w+)?$~", $lien, $match)) {
		return "[".strip_tags($texte,"<strong><em><i><span><img>").$titre."->".$match[1]." ".$match[2].$match[3]."]" ;
	} else if ($avant || $apres) {
		return "<a ".($avant?$avant.' ':'')."href='$lien'".($apres?' '.$apres:'').">$texte</a>" ;
	} else {
		return "[".strip_tags($texte,"<strong><em><i><span><img>").$titre."->".$lien."]" ;
	}
}

function ckeditor_traite_img_html($docid, $doctype, $docparam, $avant, $apres) {
	$regex = '~align=(["\'])(\w+)\\1~' ;
	$align = '' ; // par défaut : rien
	if (preg_match($regex, $avant, $match) || preg_match($regex, $apres, $match)) {
		switch ($match[2]) { // on accepte gauche et droite
			case 'middle':
				$align = '|center';
				break;
			case 'left':
			case 'right':
				$align = '|'.$match[2] ;
				break ;
		}
	}
	return "<${doctype}${docid}".($docparam?'|'.urldecode($docparam):'').$align.">" ;
}

function ckeditor_traite_lien_spip($texte,$lien,$titre = '') {
	if ($titre)
		$titre = sprintf(" title='%s'", 
				 htmlspecialchars(str_replace('\\\'', "'", 
							      $titre),
						  ENT_QUOTES));

	$texte = preg_replace("~\\\'~","'",$texte);
	if (preg_match("~^(art(?:icle)?|br(?:eve)?|rub(?:rique)?|[a-zA-Z]+)\s*(\d+)\s*(#\w+)?$~", $lien, $match)) {
		switch ($match[1]) {
			case 'rub':
				$type = 'rubrique' ;
				break ;
	 		case 'art':
				$type = 'article' ;
				break ;
			case 'br':
				$type = 'breve' ;
				break ;
			default:
				$type = $match[1] ;
		}


		return "<a href='"._DIR_RACINE."spip.php?page=$type&amp;id_$type=".$match[2].$match[3]."'".$titre.">".$texte."</a>" ;
	} else {
		return "<a href='$lien'$titre>$texte</a>" ;
	}
}

function ckeditor_traite_img_spip($doctype, $docid, $align, $dir_img=_DIR_IMG, $dir_racine=_DIR_RACINE) {
	static $cache = array() ;
	if (! $row = $cache[$docid]) { // on limite les accès à la db
		$cache[$docid] = $row = sql_fetsel("fichier,largeur,hauteur,extension", "spip_documents", "id_document=$docid");
	}
	switch ($row['extension']) {
		case 'jpg':
		case 'jpeg' :
		case 'gif':
		case 'png':
			$row['fichier'] = $dir_img.$row['fichier'] ;
			break ;
		default:
			$f = charger_fonction('vignette','inc');
                        $v = $f($row['extension'], true);
			if ($v[0]) {
				$row['fichier'] = url_absolue($v[0]) ;
				if (!$row['largeur'])
					$row['largeur'] = $v[1] ;
				if (!$row['hauteur'])
					$row['hauteur'] = $v[2] ;
			}
			break ;
	}
	$preview = ckeditor_lire_config('vignette', _CKE_VIGNETTE_DEF) ;
	if ($preview && $row['largeur'] && $row['hauteur']){
		if (($row['largeur'] > $row['hauteur']) && ($row['largeur'] > $preview)) {
			$larg = ' width="'.$preview.'px"' ;
			$haut = sprintf(" height=\"%.0dpx\"",$preview * $row['hauteur'] / $row['largeur']) ;
		} else
	  	if (($row['largeur'] < $row['hauteur']) && ($row['hauteur'] > $preview))	{
			$haut = ' height="'.$preview.'px"' ;
			$larg = sprintf(" width=\"%.0dpx\"",$preview * $row['largeur'] / $row['hauteur']) ;
		} else {
			$haut = ' height="'.$row['hauteur'].'px"' ;
			$larg = ' width="'.$row['largeur'].'px"' ;
		}
	} else {
		$larg = '' ;
		$haut = '' ;
	}
	$params = preg_split("/\|/", $align) ;
	$align = '' ;
	$docparams = array() ;
	foreach($params as $param) {
		switch ($param) {
			case 'center': 
				$align = 'middle' ;
				$center= ' style="display: block; margin-left: auto; margin-right: auto;"' ;
				break ;
			case 'left':
				$center= '' ;
				$align = $param ;
				break ;
			case 'right':
				$center= '' ;
				$align = $param ;
				break ;
			default:
				$docparams[] = $param ;
				break ;
		}
	}
	if (count($docparams)) {
		$docparam='&docparam='.join('%7C', $docparams) ;
	} else {
		$docparam='' ;
	}
	return '<img'.$larg.$haut.' align="'.$align.'" src="'.$row['fichier'].'?docid='.$docid.'&doctype='.$doctype.$docparam.'"'.$center.'/>' ;
}

function ckeditor_wrap_callback($matches) {
	$replace = sprintf("<script type=\"ckeditor_wrap\">%s</script>",
			   urlencode($matches[0]));
	return $replace;
}

function ckeditor_unwrap_callback($matches) {
	$replace = urldecode($matches[1]);
	return $replace;
}


function ckeditor_html2spip_pre_dist($texte) {
	return $texte;
}

function ckeditor_html2spip_post_dist($texte) {
	return $texte;
}

function ckeditor_html2spip($texte) {
	$ckeditor_html2spip_pre = charger_fonction('ckeditor_html2spip_pre','');
	$texte = $ckeditor_html2spip_pre($texte);

	if (PROTECTED_SPIP_TAGS) {
		$search[] = "#&lt;(".PROTECTED_SPIP_TAGS.".*?)&gt;#s" ;
		$replace[] = "<$1>" ;
	}

	if (ckeditor_tweaks_actifs('decoupe')) {
		$search[] = "#\s*<div\s*style=\"page-break-after:\s*always\s*;\s*\">.*?</div>\s*#s" ; // saut de page
		if (ckeditor_lire_config("html2spip", _CKE_HTML2SPIP_DEF)) {
			$replace[] = "\n\n<p>++++</p>\n" ;
		} else {
			$replace[] = "\n\n++++\n\n" ;
		}
	}

	$search[] = "#<a\s+([^>]*?)\s*href=(\"|')(.*?)\\2\s*([^>]*?)\s*>(.*?)</a>#se" ; // les liens
	$replace[] = 'ckeditor_traite_lien_html("$5","$3","$1","$4")' ;

	$search[] = "#<a[^>]+name=(\"|')(.*?)\\1[^>]*></a>#s" ; // les ancres
	$replace[] = '[#$2<-]' ;

	$search[] = "#<img\s*([^>]*?)\s*src=\"([^\"]*?)\?docid=(\d+)(?:&amp;|&)doctype=(\w+)(?:(?:&amp;|&)docparam=([^\"]*))?\"\s*([^>]*?)\s*>#se" ; // les images
	$replace[] = 'ckeditor_traite_img_html("$3", "$4", "$5", "$1", "$6")' ;
	
	if (ckeditor_smileys_actifs()) {
		$cs_path = preg_split("~/~", _DIR_PLUGIN_COUTEAU_SUISSE) ;
		$search[] = "#<img[^>]+src=\"[^\"]*".$cs_path[count($cs_path)-1]."/img/smileys/[^\"]*\"[^>]+title=\"([^\"]*)\"[^>]+/>#s" ;
		$replace[] = "$1" ;
	}

	if (ckeditor_lire_config("spiplinks")) {
		$search[] = "#(\[[^\]]*?-)&gt;([^\]]*?\])#s" ; // les liens spip
		$replace[] = "$1>$2" ;

		$search[] = "#(\[.*?)&lt;(-\])#s" ; // les ancres spip
		$replace[] = "$1<$2" ;
	}

	$texte = preg_replace($search, $replace, $texte) ;

	if (ckeditor_lire_config("html2spip", _CKE_HTML2SPIP_DEF)) {
		/*
		 * Protection des modeles SPIP dans des
		 * <script type="ckeditor_wrap"> pour que le parser HTML
		 * ne bloque pas dessus comme non compliant HTML.
		 */
		$search_regex = sprintf("#<%s[^>]*>#s", PROTECTED_SPIP_TAGS);
		$texte = preg_replace_callback($search_regex,
					       ckeditor_wrap_callback,
					       $texte);

		/*
		 * Reconversion HTML vers typo SPIP
		 */
		require(find_in_path('lib/'._CKE_HTML2SPIP_VERSION.'/misc_tools.php'));
		require(find_in_path('lib/'._CKE_HTML2SPIP_VERSION.'/HTMLEngine.class'));
		require(find_in_path('lib/'._CKE_HTML2SPIP_VERSION.'/HTML2SPIPEngine.class'));

		$identity_tags = ckeditor_lire_config("html2spip_identite", _CKE_HTML2SPIP_IDENTITE);

		$parser = new HTML2SPIPEngine('', '');
		$parser->loggingEnable();
		if (trim($identity_tags) != '')
			$parser->addIdentityTags(explode(';', $identity_tags));
		$output = $parser->translate($texte);
		$texte = $output['default'];

		/*
		 * Recuperation des modeles SPIP proteges
		 */
		$search_regex = '|<script type="ckeditor_wrap">([^>]*)</script>|s';
		$texte = preg_replace_callback($search_regex,
				      	       ckeditor_unwrap_callback,
					       $texte);
	}

	$ckeditor_html2spip_post = charger_fonction('ckeditor_html2spip_post','');
	$texte = $ckeditor_html2spip_post($texte);
	
	return $texte;
}

function ckeditor_spip2html_pre_dist($texte) {
	return $texte;
}

function ckeditor_spip2html_post_dist($texte) {
	return $texte;
}     

function ckeditor_spip2html($texte) {
	$ckeditor_spip2html_pre = charger_fonction('ckeditor_spip2html_pre','');
	$texte = $ckeditor_spip2html_pre($texte);

	if (PROTECTED_SPIP_TAGS) {
		$search[] = "#(?:<|&lt;)(".PROTECTED_SPIP_TAGS.".*?)(?:>|&gt;)#s" ;
		$replace[] = "&lt;$1&gt;" ;
	}

	/* Version avec bulle: [texte|bulle->lien] */
	$search[] = "#\[([^|\]]+?)\|([^\]]*?)-(?:&gt;|>)([^\]]*?)\]#se" ;
	$replace[] = "ckeditor_traite_lien_spip(\"$1\",\"$3\",\"$2\")" ;

	/* Version sans bulle: [texte->lien] */
	$search[] = "#\[([^\]]*?)-(?:&gt;|>)([^\]]*?)\]#se" ;
	$replace[] = "ckeditor_traite_lien_spip(\"$1\",\"$2\")" ;

	$search[] = "~\[#?([^\]]*)(?:&lt;|<)-\]~s" ;
	$replace[] = "<a name='$1'></a>" ;

	$search[] = "#(?:(?:&amp;|&)lt;|<)(img|doc|emb|video|audio|text)(\d+)\|(.*?)(?:(?:&amp;|&)gt;|>)#se" ;
	$replace[] = "ckeditor_traite_img_spip(\"$1\",\"$2\",\"$3\",\"../"._DIR_IMG."\",\"../"._DIR_RACINE."\")" ;

	/* Cas de modele sans option, ex: <img1> */
	$search[] = "#(?:(?:&amp;|&)lt;|<)(img|doc|emb|video|audio|text)(\d+)(?:(?:&amp;|&)gt;|>)#se" ;
	$replace[] = "ckeditor_traite_img_spip(\"$1\",\"$2\",\"\",\"../"._DIR_IMG."\",\"../"._DIR_RACINE."\")" ;


	$search[] = "~\[\[~" ; // on protège les notes de bas de page : on a un moyen de les afficher dans ckeditor ...
	$replace[] = "[*[*" ;

	$search[] = "~@~" ; // protection de @ : pour que Mailcrypt ne casse pas les liens
	$replace[] = "&#64;" ;

	if (ckeditor_tweaks_actifs('decoupe')) {
		$search[] = "~(<p>)?\+\+\+\+(</p>)?~" ; // saut de page
		$replace[] = "<div style=\"page-break-after:always;\"><span style=\"display: none;\">&nbsp;</span></div>" ;
	}

	$texte = propre(preg_replace($search, $replace, $texte)) ; // utilisation du filtre 'propre' : conseil de http://www.spip-contrib.net/RealET,411
	
	$texte = preg_replace("~\[\*\[\*~", "[[", $texte) ; // on déprotège ...

	$ckeditor_spip2html_post = charger_fonction('ckeditor_spip2html_post','');
	$texte = $ckeditor_spip2html_post($texte);

	return $texte ;
}

function ckeditor_convert_couleur($couleur) {
	if (preg_match("~^(.)(.)(.)$~", $couleur, $rgb)) {
		return $rgb[1].$rgb[1].$rgb[2].$rgb[2].$rgb[3].$rgb[3] ;
	} else {
		return $couleur ;
	}
}
?>
