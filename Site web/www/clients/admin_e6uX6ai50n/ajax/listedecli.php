<?php
include_once(realpath(dirname(__FILE__)) . "/../../classes/Administrateur.class.php");
include_once(realpath(dirname(__FILE__)) . "/../../classes/Navigation.class.php");

session_start();

if( ! isset($_SESSION["util"]->id) ) {header("Location: ../index.php");exit;}

include_once(realpath(dirname(__FILE__)) . "/../../fonctions/divers.php");

if(! est_autorise("acces_configuration")) exit;

include_once("../../classes/Declinaisondesc.class.php");

header('Content-Type: text/html; charset=ISO-8859-1');

$data = explode('_', $_POST['id']);

$modif = $data[0];
$id = intval($data[1]);

if ($modif == "titredecli")
{
	 $objdesc = new Declinaisondesc();

	 if ($objdesc->charger($id))
	 {
		$objdesc->titre = $_POST['value'];
		$objdesc->maj();

		echo $objdesc->titre;
	 }
}
?>