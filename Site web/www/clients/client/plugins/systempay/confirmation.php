<?php
#####################################################################################################
#
#					Module pour la plateforme de paiement Systempay
#						Version : V1.0a
#									########################
#					Développé pour Thelia
#						Version : 1.4.2.1
#									########################
#					Auteur Lyra Network
#						03/2010
#						Contact : supportvad@lyra-network.com
#
#####################################################################################################
/*
 * Page appelée par la plateforme de paiement pour confirmation
 */
include_once(realpath(dirname(__FILE__)) . "/config.php");
include_once(realpath(dirname(__FILE__)) . "/lang_french.php");
include_once(realpath(dirname(__FILE__)) . "/vad_api.php");

include_once("../../../classes/Commande.class.php");
include_once("../../../fonctions/divers.php");

if (!isset($_POST["order_id"] ) || empty($_POST["order_id"] ) )
{
	// pas d'order_id, c'est une erreur
	header("Location:".MODULE_PAYMENT_VADS_URL_ERROR);
}
else
{
	// Récupération paramètres pour analyse
	$vad_api = new VADS_API();
	$vad_api->setResponseFromPost(
		$_POST,
		MODULE_PAYMENT_VADS_KEY_TEST,
		MODULE_PAYMENT_VADS_KEY_PROD,
		MODULE_PAYMENT_VADS_CTX_MODE
	);
	
	if($vad_api->isAuthentifiedResponse() && $vad_api->isAcceptedPayment())
	{
		//TODO tester s'il n'y a pas des traitements gênants traités 2 fois (serveur/serveur et retour client)
		// Paiement réalisé avec succès
		$commande = new Commande();
		$reference = mysql_real_escape_string($_POST['order_id']); // On n'est jamais trop prudent
		$commande->charger_ref($reference); // Récupération de la commande
		
		$commande->statut = 2;	// statut "payé"
		$commande->genfact();	// génération facture
		$commande->maj();
		
		modules_fonction("confirmation",$commande);	// traitements supplémentaires
		
		// direction le message de succès
		$variable_loader = new Variable();
		$variable_loader->charger("urlsite");
		$urlsite = $variable_loader->valeur;
		$urlsite = (substr($urlsite,0,-1)=="/") ? $urlsite : $urlsite."/";
		header("Location:".$urlsite."merci.php");
		exit();
	}
	else
	{
		// Erreur survenue lors du paiement
		header("Location:".MODULE_PAYMENT_VADS_URL_ERROR);
	}
}


?>