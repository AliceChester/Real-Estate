<?php

include_once(realpath(dirname(__FILE__)) . "/config.php");

//------------------------------------------------------------------------------------------------------------
// appel_spplus_php.php
// KIT SPPLUS : Page de test de l'interface de paiement avec API PHP
//---------------------------------------------------------------------------------------------------------
// Destinataire :		             Sites en int�gration
// Auteur :				               Julien Bodin & Eric Duval
// Num�ro Version :              1.10
// Date cr�ation	:	             25/08/2005
// Date derni�re Modification :  25/08/2005
//---------------------------------------------------------------------------------------------------------
//
// Le script appel_spplus_php.php vous permettra de s�curiser l'appel au serveur de paiement SP PLUS.
// En effet, il permet d'appeler une des fonctions de calcul du sceau HMAC puis d'appliquer une signature
// num�rique sur la cha�ne des param�tres � envoyer au serveur de paiement SPPLUS.
//
// Ce script pr�sente les fonctions qui permettent de calculer le sceau num�rique HMAC � partir  
// de l'ensemble des param�tres pass�s au serveur de paiement SP PLUS.
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