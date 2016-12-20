<?php

include_spip('inc/ckeditor_constantes') ;
	
function formulaires_ckc_charger_dist() {
        ($cfg = lire_config("ckeditor")) || ($cfg = array()) ;
	$valeurs = array(
		'protectedtags' => array_key_exists('protectedtags', $cfg)?$cfg['protectedtags']:_CKE_PROTECTEDTAGS_DEF,
		'html2spip' => array_key_exists('html2spip', $cfg)?$cfg['html2spip']:_CKE_HTML2SPIP_DEF,
		'html2spip_limite' => array_key_exists('html2spip_limite', $cfg)?$cfg['html2spip_limite']:_CKE_HTML2SPIP_LIMITE_DEF,
		'html2spip_identite' => array_key_exists('html2spip_identite', $cfg)?$cfg['html2spip_identite']:_CKE_HTML2SPIP_IDENTITE,
		'spiplinks' => array_key_exists('spiplinks', $cfg)?$cfg['spiplinks']:_CKE_SPIPLINKS_DEF,
		'insertall' => array_key_exists('insertall', $cfg)?$cfg['insertall']:_CKE_INSERTALL_DEF,
		'cktoolslenlarge' => array_key_exists('cktoolslenlarge', $cfg)?$cfg['cktoolslenlarge']:_CKE_LARGE_DEF,
		'cktoolslenetroit' => array_key_exists('cktoolslenetroit', $cfg)?$cfg['cktoolslenetroit']:_CKE_ETROIT_DEF,
		'cklanguage' => array_key_exists('cklanguage', $cfg)?$cfg['cklanguage']:_CKE_LANGAGE_DEF,
		'entermode' => array_key_exists('entermode', $cfg)?$cfg['entermode']:_CKE_ENTERMODE_DEF,
		'shiftentermode' => array_key_exists('shiftentermode', $cfg)?$cfg['shiftentermode']:_CKE_SHIFTENTERMODE_DEF,
		'csssite' => array_key_exists('csssite', $cfg)?$cfg['csssite']:'',
		'contextes' => array_key_exists('contextes', $cfg)?$cfg['contextes']:'',
		'siteurl' => array_key_exists('siteurl', $cfg)?$cfg['siteurl']:''
	) ;
	return $valeurs ;
}

function formulaires_ckc_verifier_dist() {
	$result = array() ;
	if (! preg_match("~^(/?\w+)(\s*;\s*/?\w+)*$~", _request("protectedtags"))) $result["protectedtags"] = _T("ckeditor:err_mauvaise_syntaxe_de_tag") ;
	if (_request("cktoolslenlarge") && ! ctype_digit(_request("cktoolslenlarge"))) $result["cktoolslenlarge"] = _T("ckeditor:err_la_largeur_ecran_large_doit_etre_numerique") ;
	if (_request("cktoolslenetroit") && ! ctype_digit(_request("cktoolslenetroit"))) $result["cktoolslenetroit"] = _T("ckeditor:err_la_largeur_ecran_etroit_doit_etre_numerique") ;
	if (! preg_match("~^ENTER_(DIV|BR|P)$~", _request("entermode"))) $result["entermode"] = _T("ckeditor:err_mauvais_mode_entree") ;
	if (! preg_match("~^ENTER_(DIV|BR|P)$~", _request("shiftentermode"))) $result["shiftentermode"] = _T("ckeditor:err_mauvais_mode_shiftentree") ;
	if (! preg_match("~^([a-z]{2}|auto)$~", _request("cklanguage"))) $result["cklanguage"] = _T("ckeditor:err_mauvais_langage") ;

	if (count($result)) {
		$result['message_erreur'] = _T('ckeditor:ck_ko').
			"<ul>\n".
				(count($result)?'<li>'.join("</li>\n<li>", $result)."</li>\n":'').
			"</ul>\n" ;
	}
		
	return $result ;
}

function formulaires_ckc_traiter_dist() {
	if (_request('_cfg_delete')) {
		$valeurs = formulaires_ckc_charger_dist() ;
		foreach($valeurs as $cle =>$valeur) {
			ecrire_config('ckeditor/'.$cle, $valeur) ;
			$_GET[$cle] = $valeur ;
		}
		 return array('message_ok' => _T('ckeditor:ck_delete')) ;
	} else if (_request('_cfg_reinit')) {
		effacer_config('ckeditor') ;
		return array('message_ok' => _T('ckeditor:ck_reinit')) ;
	} else {
		ecrire_config("ckeditor/protectedtags", _request("protectedtags")) ;
		ecrire_config("ckeditor/html2spip", _request("html2spip")) ;
		ecrire_config("ckeditor/html2spip_limite", _request("html2spip_limite")) ;
		ecrire_config("ckeditor/html2spip_identite", _request("html2spip_identite")) ;
		ecrire_config("ckeditor/spiplinks", _request("spiplinks")) ;
		ecrire_config("ckeditor/insertall", _request("insertall")) ;
		ecrire_config("ckeditor/cktoolslenlarge", _request("cktoolslenlarge")) ;
		ecrire_config("ckeditor/cktoolslenetroit", _request("cktoolslenetroit")) ;
		ecrire_config("ckeditor/cklanguage", _request("cklanguage")) ;
		ecrire_config("ckeditor/entermode", _request("entermode")) ;
		ecrire_config("ckeditor/shiftentermode", _request("shiftentermode")) ;
		ecrire_config("ckeditor/csssite", _request("csssite")) ;
		ecrire_config("ckeditor/contextes", _request("contextes")) ;
		ecrire_config("ckeditor/siteurl", _request("siteurl")) ;
		return array('message_ok' => _T('ckeditor:ck_ok')) ;
	}
}

 ?>
