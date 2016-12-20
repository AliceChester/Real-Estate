<?php

include_once(realpath(dirname(__FILE__)) . "/config.php");
include_once("../../../classes/Commande.class.php");	
include_once("../../../fonctions/divers.php");

if($_SERVER['REMOTE_ADDR'] != "213.218.137.226" || $_POST['merchant_id'] != $id_marchand)
	exit;

$ref_order = (!empty($_POST['ref_order']))? $_POST['ref_order'] :  NULL;
$ref_wexpay =(!empty($_POST['ref_wexpay']))? $_POST['ref_wexpay'] :  NULL;
$amount = (!empty($_POST['amount']))? $_POST['amount'] : false;

if($ref_order!=NULL && $ref_wexpay!=NULL && $amount!=false){
	
    $rec = file_get_contents("https://$login:$pass@$urltransaction");
    $rec = str_replace("S-", "", $rec);
    $rec = str_replace("B-", "", $rec);

    $xml = simplexml_load_string($rec);
	$paiement = 0;
	
    for($i = 0; $i < count($xml->transaction); $i++)
            if($xml->transaction[$i]->RefVendeur == $ref_order && $xml->transaction[$i]->EstValide == "true")
				$paiement = 1;

     if ($paiement) {

		$commande = new Commande();
		$commande->charger_trans($ref_order);
	    $commande->statut = 2;
	    $commande->genfact();
		$commande->maj();
   }

}

modules_fonction("confirmation", $commande);
?>
