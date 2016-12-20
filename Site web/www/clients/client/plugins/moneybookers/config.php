<?php

	include_once(realpath(dirname(__FILE__)) . "/../../../classes/Variable.class.php");

	$titre1="Moneybookers";
	$chapo1="Moneybookers";
	$description1="";
	
	$titre2="";
	$chapo2="";
	$description2="";
	
	$titre3="";
	$chapo3="";
	$description3="";

	// Modifier la valeur ci-dessous avec l'e-mail de vote compte Moneybookers
	$compte_moneybookers = 'Votre_email';

	$Devise        = "EUR";
	$Code_Langue   = "FR";



	$urlsite = new Variable();
	$urlsite->charger("urlsite");
	
	$serveur="https://www.moneybookers.com/app/payment.pl";
	//$serveur="http://www.moneybookers.com/app/test_payment.pl";
    $confirm = $urlsite->valeur."/client/plugins/moneybookers/confirmation.php";
	$retourok = $urlsite->valeur."/merci.php";
	$retournok = $urlsite->valeur."/regret.php";
	
	$return_url_text = "Retour au site";

?>