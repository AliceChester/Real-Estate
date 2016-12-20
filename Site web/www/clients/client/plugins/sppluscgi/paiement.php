<?php

include_once(realpath(dirname(__FILE__)) . "/config.php");

//------------------------------------------------------------------------------------------------------------
// appel_spplus_php.php
// KIT SPPLUS : Page de test de l'interface de paiement avec API PHP
//---------------------------------------------------------------------------------------------------------
// Destinataire :		             Sites en intégration
// Auteur :				               Julien Bodin & Eric Duval
// Numéro Version :              1.10
// Date création	:	             25/08/2005
// Date dernière Modification :  25/08/2005
//---------------------------------------------------------------------------------------------------------
//
// Le script appel_spplus_php.php vous permettra de sécuriser l'appel au serveur de paiement SP PLUS.
// En effet, il permet d'appeler une des fonctions de calcul du sceau HMAC puis d'appliquer une signature
// numérique sur la chaîne des paramètres à envoyer au serveur de paiement SPPLUS.
//
// Ce script présente les fonctions qui permettent de calculer le sceau numérique HMAC à partir  
// de l'ensemble des paramètres passés au serveur de paiement SP PLUS.
//
//------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------

	include_once("../../../classes/Navigation.class.php");	
	session_start();
	
	$total = 0;

    $total = $_SESSION['navig']->panier->total(1,$_SESSION['navig']->commande->remise) + $_SESSION['navig']->commande->port;

	$total = round($total, 2);

	if($total<$_SESSION['navig']->commande->port)
		$total = $_SESSION['navig']->commande->port;


	$arg1 = $_SESSION['navig']->client->ref; 	
	$arg2 = "";	

?>

<html>
<head>
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<title>
  Paiement SPPLUS
</title>
</head>
<body onload="document.getElementById('formspplus').submit();">

<form action="<?php echo $url; ?>" id="formspplus" method="get"> 
 
  <input type="hidden" size="20" name="montant" value="<?php echo $total; ?>"> 
  <input type="hidden" size="20" name="reference" value="<?php echo $_SESSION['navig']->commande->transaction; ?>"> 
  <input type="hidden"  name="devise" value="978"> 
  <input type="hidden" size="50" name="arg2" value="<?php echo  $arg2; ?>" > 
  <input type="hidden" size="50" name="arg1" value="<?php echo  $arg1; ?>" > 
  <input type="hidden" size="50" name="email" value="<?php echo $_SESSION['navig']->client->email; ?>"> 
 


</body>
</html>


</form>