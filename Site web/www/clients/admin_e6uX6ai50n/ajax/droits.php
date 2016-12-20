<?php
	include_once(realpath(dirname(__FILE__)) . "/../../classes/Administrateur.class.php");
	include_once(realpath(dirname(__FILE__)) . "/../../classes/Navigation.class.php");
	session_start();
	if( ! isset($_SESSION["util"]->id) ) {header("Location: ../index.php");exit;}
	include_once(realpath(dirname(__FILE__)) . "/../../fonctions/divers.php");
	
	include_once(realpath(dirname(__FILE__)) . "/../../classes/Autorisation.class.php");
	include_once(realpath(dirname(__FILE__)) . "/../../classes/Autorisation_administrateur.class.php");
	include_once(realpath(dirname(__FILE__)) . "/../../classes/Autorisation_modules.class.php");
	header('Content-Type: text/html; charset=ISO-8859-1');
	
?>
<?php if(! est_autorise("acces_configuration")) exit; ?>

<?php

  if($_GET['type_droit'] == "1"){
	$autorisation = new Autorisation();
	$autorisation->charger_id($_GET['autorisation']);
	$autorisation_administrateur = new Autorisation_administrateur();
	$autorisation_administrateur->charger($autorisation->id, $_GET['administrateur']);

	if($autorisation->type == "1"){

		if($_GET['valeur'] == 1){
			$autorisation_administrateur->lecture = 1;
			$autorisation_administrateur->ecriture = 1;
		} else {
			$autorisation_administrateur->lecture = 0;
			$autorisation_administrateur->ecriture = 0;
		}
		
	} else if($autorisation->type == "2"){
		
		
	}


	if($autorisation_administrateur->id)
		$autorisation_administrateur->maj();
	else {
		$autorisation_administrateur->autorisation = $autorisation->id;
		$autorisation_administrateur->administrateur = $_GET['administrateur'];
		$autorisation_administrateur->add();
	}
 } else if($_GET['type_droit'] == "2"){
	
		$autorisation_modules = new Autorisation_modules();
		$autorisation_modules->charger($_GET['module'], $_GET['administrateur']);
		
		if($_GET['valeur'] == 1)
			$autorisation_modules->autorise = 1;
	 	else 
			$autorisation_modules->autorise = 0;

		if($autorisation_modules->id)
			$autorisation_modules->maj();
		else {
			$autorisation_modules->module = $_GET['module'];
			$autorisation_modules->administrateur = $_GET['administrateur'];
			$autorisation_modules->add();
		}	
 }
?>