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

include_once(realpath(dirname(__FILE__)) . "/config.php");
include_once(realpath(dirname(__FILE__)) . "/lang_french.php");
include_once(realpath(dirname(__FILE__)) . "/vad_api.php");
include_once("../../../classes/Navigation.class.php");
include_once("../../../classes/Variable.class.php");

session_start();

/* Initialisation des paramètres de la commande */
$total = 0;
$total = $_SESSION['navig']->panier->total() + $_SESSION['navig']->commande->port;
$total -= $_SESSION['navig']->commande->remise;
$total = round($total, 2);
$total *= 100;

$client = $_SESSION['navig']->client;
$cust_id = $client->id;
$cust_name = $client->nom;
$cust_address = $client->adresse1;
$cust_zip = $client->cpostal;
$cust_city = $client->ville;
$cust_country = $client->pays;
$cust_email = $client->email;

$order_id=$_SESSION['navig']->commande->ref;
	
/* Préparation de l'envoi à la plateforme de paiement */
$vad_object = new VADS_API();
$vad_object->set('platform_url',MODULE_PAYMENT_VADS_URL_BANK);
$vad_object->set('version','V1');
$vad_object->set('key_test',MODULE_PAYMENT_VADS_KEY_TEST);
$vad_object->set('key_prod',MODULE_PAYMENT_VADS_KEY_PROD);
$vad_object->set('amount',$total);
$vad_object->set('capture_delay',MODULE_PAYMENT_VADS_DELAY);
$vad_object->set('currency',MODULE_PAYMENT_VADS_CURRENCY);
$vad_object->set('cust_email',$cust_email);
$vad_object->set('ctx_mode',MODULE_PAYMENT_VADS_CTX_MODE);
$vad_object->set('payment_cards',MODULE_PAYMENT_VADS_CARDS);
$vad_object->set('payment_config',MODULE_PAYMENT_VADS_PAYMENT_TYPE);
$vad_object->set('site_id',MODULE_PAYMENT_VADS_SITE_ID);
$vad_object->set('validation_mode',MODULE_PAYMENT_VADS_VALIDATION_MODE);
$vad_object->set('url_return',MODULE_PAYMENT_VADS_URL_DEFAULT);
$vad_object->set('cust_id',$cust_id);
$vad_object->set('cust_name',$cust_name);
$vad_object->set('cust_address',$cust_address);
$vad_object->set('cust_zip',$cust_zip);
$vad_object->set('cust_city',$cust_city);
$vad_object->set('cust_country',$cust_country);
$vad_object->set('language','fr');
$vad_object->set('order_id',$order_id);
$vad_object->set('url_success',MODULE_PAYMENT_VADS_URL_SUCCESS);
$vad_object->set('url_referral',MODULE_PAYMENT_VADS_URL_REFERRAL);
$vad_object->set('url_refused',MODULE_PAYMENT_VADS_URL_REFUSED);
$vad_object->set('url_cancel',MODULE_PAYMENT_VADS_URL_CANCEL);
$vad_object->set('url_error',MODULE_PAYMENT_VADS_URL_ERROR);
//$vad_object->set('url_check',MODULE_PAYMENT_VADS_URL_CHECK);
$vad_object->set('contrib',MODULE_PAYMENT_VADS_CONTRIB);
$vad_object->set('redirect_enabled',MODULE_PAYMENT_VADS_REDIRECT_ENABLED);
$vad_object->set('redirect_success_timeout',MODULE_PAYMENT_VADS_REDIRECT_SUCCESS_TIMEOUT);
$vad_object->set('redirect_success_message',utf8_encode(MODULE_PAYMENT_VADS_REDIRECT_SUCCESS_MESSAGE));
$vad_object->set('redirect_error_timeout',MODULE_PAYMENT_VADS_REDIRECT_ERROR_TIMEOUT);
$vad_object->set('redirect_error_message',utf8_encode(MODULE_PAYMENT_VADS_REDIRECT_ERROR_MESSAGE));

// Affichage du formulaire avec envoi javascript immédiat
?>
<html>
<head>
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<title>Redirection vers la plateforme de paiement par CB</title>
</head>
<body onload="document.forms[0].submit()">
<p>Vous allez être redirigé vers la plateforme de paiement dans quelques instants.
Si la redirection ne fonctionne pas automatiquement, cliquez sur le bouton envoyer.</p>
<?php echo $vad_object->getRequestHtmlForm('name="formvads"');?>
</body>
</html>