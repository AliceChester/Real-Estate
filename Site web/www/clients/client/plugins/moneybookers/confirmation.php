<?php

include_once("config.php");
include_once("../../../classes/Commande.class.php");	
include_once("../../../fonctions/divers.php");

if (!empty($_POST['status']))
{
	if($_POST['status'] == 2)
	{
		$reference = $_POST['transaction_id'];
		$commande = new Commande();
		$commande->charger_trans("$reference");
		$commande->statut = 2;
		$commande->genfact();
		$commande->maj();
		
		modules_fonction("confirmation", $commande);
	}
}

?>
