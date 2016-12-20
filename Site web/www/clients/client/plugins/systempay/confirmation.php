<?php
#####################################################################################################
#
#					Module pour la plateforme de paiement Systempay
#						Version : V1.0a
#									########################
#					D�velopp� pour Thelia
#						Version : 1.4.2.1
#									########################
#					Auteur Lyra Network
#						03/2010
#						Contact : supportvad@lyra-network.com
#
#####################################################################################################
/*
 * Page appel�e par la plateforme de paiement pour confirmation
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
	// R�cup�ration param�tres pour analyse
	$vad_api = new VADS_API();
	$vad_api->setResponseFromPost(
		$_POST,
		MODULE_PAYMENT_VADS_KEY_TEST,
		MODULE_PAYMENT_VADS_KEY_PROD,
		MODULE_PAYMENT_VADS_CTX_MODE
	);
	
	if($vad_api->isAuthentifiedResponse() && $vad_api->isAcceptedPayment())
	{
		//TODO tester s'il n'y a pas des traitements g�nants trait�s 2 fois (serveur/serveur et retour client)
		// Paiement r�alis� avec succ�s
		$commande = new Commande();
		$reference = mysql_real_escape_string($_POST['order_id']); // On n'est jamais trop prudent
		$commande->charger_ref($reference); // R�cup�ration de la commande
		
		$commande->statut = 2;	// statut "pay�"
		$commande->genfact();	// g�n�ration facture
		$commande->maj();
		
		modules_fonction("confirmation",$commande);	// traitements suppl�mentaires
		
		// direction le message de succ�s
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