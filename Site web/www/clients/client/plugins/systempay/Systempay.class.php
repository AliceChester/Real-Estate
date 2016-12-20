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
include_once(realpath(dirname(__FILE__)) . "/../../../classes/PluginsPaiements.class.php");
include_once(realpath(dirname(__FILE__)) . "/config.php");

class Systempay extends PluginsPaiements{

	function PluginsPaiements($nom="systempay"){
		$this->Plugins($nom);
	}
	
	function init()
	{
		$this->ajout_desc("CyberPlus Paiement - paiement par CB", "CyberPlus Paiement - paiement par CB", "", 1);
	}

	function paiement($commande){
		header("Location: client/plugins/systempay/paiement.php");
	}
}

?>