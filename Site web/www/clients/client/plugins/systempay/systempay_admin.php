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

include_once(realpath(dirname(__FILE__)) . "/../../../classes/Variable.class.php");
include_once(realpath(dirname(__FILE__)) . "/config.php");

// Récupérer le nom et l'url du site
$variable_loader = new Variable();
$variable_loader->charger("urlsite");
$urlsite = $variable_loader->valeur;
$urlsite = (substr($urlsite,-1)=="/") ? $urlsite : $urlsite."/";	// lors des tests sur différentes config, urlsite n'avait pas de / à la fin

$variable_loader->charger("nomsite");
$nomsite = $variable_loader->valeur;

$fields = array(
	array(	"name" => "MODULE_PAYMENT_VADS_URL_BANK", 					"default" => "https://systempay.cyberpluspaiement.com/vads-payment/",
			"label" => "Url de la page de paiement",			"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_URL_CHECK", 					"default" => $urlsite."client/plugins/systempay/confirmation.php",
			"label" => "Url serveur à renseigner dans le back office CyberPlus Paiement",						"type" => "fixed"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_SITE_ID", 					"default" => "123456",
			"label" => "Identifiant de votre site",				"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_KEY_TEST", 						"default" => "1234567898765432",
			"label" => "Certificat en mode test",							"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_KEY_PROD", 						"default" => "9876543212345678",
			"label" => "Certificat en mode production",							"type" => "text"),
	/*
	array(	"name" => "MODULE_PAYMENT_VADS_LOGO", 						"default" => "logo.jpg",
			"label" => "Logo",									"type" => "fixed"),
	//*/
	/*
	array(	"name" => "MODULE_PAYMENT_VADS_LABEL", 						"default" => "CyberPlus Paiement",
			"label" => "Libellé",								"type" => "fixed"),
	//*/
	array(	"name" => "MODULE_PAYMENT_VADS_CTX_MODE", 					"default" => "TEST",
			"label" => "Mode de fonctionnement",				"type" => "radio",
			"options" => array("TEST", "PRODUCTION") ),
	/*
	array(	"name" => "MODULE_PAYMENT_VADS_SITE_NAME", 					"default" => $nomsite,
			"label" => "Nom de votre site",						"type" => "text"),
	//*/
	array(	"name" => "MODULE_PAYMENT_VADS_LANG", 						"default" => "fr",
			"label" => "Langue",								"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_CURRENCY", 					"default" => "978",
			"label" => "Devise",								"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_CARDS", 						"default" => "",
			"label" => "Types de carte",						"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_PAYMENT_TYPE", 				"default" => "SINGLE",
			"label" => "Mode de paiement",						"type" => "fixed"),//TODO intégration MULTI avec thélia ??
	
	array(	"name" => "MODULE_PAYMENT_VADS_DELAY", 						"default" => "",
			"label" => "Délai avant remise en banque",			"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_VALIDATION_MODE", 			"default" => "",
			"label" => "Mode de validation",					"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_REDIRECT_ENABLED", 			"default" => "False",
			"label" => "Redirection automatique vers la boutique à la fin du paiement",				"type" => "radio",
			"options" => array("True","False")),
	
	array(	"name" => "MODULE_PAYMENT_VADS_REDIRECT_SUCCESS_TIMEOUT", 	"default" => "5",
			"label" => "Temps avant redirection (paiement ok)",		"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_REDIRECT_SUCCESS_MESSAGE", 	"default" => "Paiement accepté, vous allez être redirigé dans quelques instants",
			"label" => "Message avant redirection (paiement ok)",	"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_REDIRECT_ERROR_TIMEOUT", 	"default" => "5",
			"label" => "Temps avant redirection (paiement échoué)",		"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_REDIRECT_ERROR_MESSAGE", 	"default" => "Un problème est survenu, vous allez être redirigé dans quelques instants",
			"label" => "Message avant redirection (paiement échoué)",		"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_URL_SUCCESS", 				"default" => $urlsite."client/plugins/systempay/confirmation.php",
			"label" => "URL en cas de succès",					"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_URL_REFERRAL", 				"default" => $urlsite."regret.php",
			"label" => "URL en cas de refus d'autorisation",	"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_URL_REFUSED", 				"default" => $urlsite."regret.php",
			"label" => "URL en cas d'autre refus",				"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_URL_ERROR", 					"default" => $urlsite."regret.php",
			"label" => "URL en cas d'erreur",					"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_URL_CANCEL", 				"default" => $urlsite."regret.php",
			"label" => "URL en cas d'annulation",				"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_URL_DEFAULT", 				"default" => $urlsite."client/plugins/systempay/confirmation.php",
			"label" => "URL par défaut",						"type" => "text"),
	
	array(	"name" => "MODULE_PAYMENT_VADS_CONTRIB", 					"default" => "Thelia_1.0a",
			"label" => "Identifiant du plugin",					"type" => "fixed")
);

function generate_config($input)
{
	//TODO optionnal (the user is admin) : filter input
	global $fields;
	
	$conf_file = realpath(dirname(__FILE__)) . "/config.php";
	$f_socket = fopen($conf_file,"w");
	fwrite($f_socket,"<?php\n");
	fwrite($f_socket,"#####################################################################################################
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
#####################################################################################################");
	fwrite($f_socket,"\n");
	foreach($fields as $i => $field)
	{
		$default = defined($field['name']) ? constant($field['name']) : $field['default'];
		$value = array_key_exists($field['name'], $input) ? $input[$field['name']] : $default;
		$fields[$i]['value'] = $value; // $fields[$i] is the real thing, $field is just a copy (php foreach mechanism)
		fwrite($f_socket,"define('".$field['name']."', '".addslashes($value)."');\n");
	}
	fwrite($f_socket,"?>");
}

generate_config($_POST);

// Include the brand new config file
include_once(realpath(dirname(__FILE__)) . "/config.php");
?>
<div id="contenu_int">
	<form action="" method="post">
	<fieldset style="margin : 5px; background-color: white;">
		<legend>Paramétrage du module de paiement CyberPlus Paiement</legend>
		<?php
		foreach($fields as $field)
		{
			$value = $field['value'];//defined($field['name']) ? constant($field['name']) : $field['default'];
			
			// Label
			echo '<label style="width:250px; display:block; float:left; margin-right:20px;text-align:right;">'.$field["label"].'</label>';
		
			// Input
			echo '<div style="display:block; float:left;">';
				switch ($field['type']) {
					case "text":
						echo '<input type="text" name="'.$field['name'].'" value="'.$value.'" size="75"/>';
					break;
					
					case "radio":
						foreach($field['options'] as $option)
						{
							echo '<input type="radio" name="'.$field['name'].'" value="'.$option.'"';
							echo ($value==$option) ? ' checked="checked"' : '';
							echo ' />';
							echo $option."&nbsp;&nbsp;";
						}
					break;
					
					default:
						echo $value;
					break;
				}
			echo '</div>';
			
			// css clear
			echo '<div style="clear:both; height:0.5em;"></div>';
		}
		?>
		<br/>
		<input type="submit" value="Valider" />
	</fieldset>
	</form>
</div>