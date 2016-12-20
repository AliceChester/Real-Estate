<?php

/*
 * Squelette : plugins/auto/forms_et_tables_2_0/valide_form.html
 * Date :      Tue, 27 Jul 2010 09:38:22 GMT
 * Compile :   Tue, 13 Dec 2011 14:16:40 GMT
 * Boucles :   
 */ 
//
// Fonction principale du squelette plugins/auto/forms_et_tables_2_0/valide_form.html
// Temps de compilation total: 1.166 ms
//

function html_bf1c23095e0f904112e1fdd5566fc788($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . 'Content-Type: image/gif' . '"); ?'.'>' .
'
<?php
/*
 * forms
 * version plug-in de spip_form
 *
 * Auteur :
 * Antoine Pitrou
 * adaptation en 182e puis plugin par cedric.morin@yterium.com
 * © 2005,2006 - Distribue sous licence GNU/GPL
 *
 */

include_spip("inc/forms");
include_spip("inc/admin");
include_spip("inc/session");

function valide_sondage()
{
	$verif_cookie = _request(\'verif_cookie\');
	$id_donnee = intval(_request(\'id_donnee\'));
	$hash = _request(\'hash\');
	$mel_confirm = _request(\'mel_confirm\');

	$renvoyer_image = false;

	if ($verif_cookie == \'oui\' AND ($id_donnee = intval($id_donnee))) {
		//adaptation SPIP2
		if ($row = sql_fetsel("*","spip_forms_donnees","id_donnee=".inval($id_donnee)." AND confirmation=\'attente\'")) {
			$id_form = $row[\'id_form\'];
			$cookie = $row[\'cookie\'];
			$nom_cookie = Forms_nom_cookie_form($id_form);
			// D\'abord verifier que l\'URL est legitime, donc que la demande a bien
			// ete generee par SPIP
			$hash_verif = md5("forms valide reponse sondage $id_donnee $cookie".hash_env());
			
			if ($cookie && $cookie == $_COOKIE[$nom_cookie]
				&& ($hash_verif==$hash)) {
				// Ensuite verifier que le cookie n\'a pas deja ete utilise pour le meme formulaire
				$query = "SELECT id_donnee FROM spip_forms_donnees ".
					"WHERE id_form=$id_form AND id_donnee!=$id_donnee AND confirmation=\'valide\' AND cookie=\'".addslashes($cookie)."\'";
				if (!sql_countsel("spip_forms_donnees","id_form=".intval($id_form)." AND id_donnee!=".intval($id_donnee)." AND confirmation=\'valide\'")) {
					sql_update("spip_forms_donnees",array(\'confirmation\'=>\'valide\'),"id_donnee=".intval($id_donnee));
				}
			}
		}
		$renvoyer_image = true;
	} else if ($mel_confirm == \'oui\' AND ($id_donnee = intval($id_donnee))) {
		if ($row = sql_fetsel("*","spip_forms_donnees","id_donnee=".intval($id_donnee))) {
			$id_form = $row[\'id_form\'];
			// D\'abord verifier que l\'URL est legitime, donc que la demande a bien
			// ete generee par SPIP
			$hash_verif = md5("forms confirme reponse $id_donnee".hash_env());
			if ($hash_verif==$hash) {
				$env = unserialize(\'' .
interdire_scripts(texte_script(@serialize($Pile[0]))) .
'\');
				Forms_generer_mail_reponse_formulaire($id_form, $id_donnee, $env);
			}
		}
		$renvoyer_image = true;
	}

	if ($renvoyer_image) {
		$image = "47494638396118001800800000ffffff00000021f90401000000002c0000000018001800000216848fa9cbed0fa39cb4da8bb3debcfb0f86e248965301003b";
		$image = pack("H*", $image);
		$size = strlen($image);

		Header("Content-Length: ".$size);
		Header("Cache-Control: no-cache,no-store");
		Header("Pragma: no-cache");
		Header("Connection: close");

		echo $image;
	}

}

valide_sondage();
?>');

	return analyse_resultat_skel('html_bf1c23095e0f904112e1fdd5566fc788', $Cache, $page, 'plugins/auto/forms_et_tables_2_0/valide_form.html');
}
?>