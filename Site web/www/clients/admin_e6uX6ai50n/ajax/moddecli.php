<?php
include_once(realpath(dirname(__FILE__)) . "/../../classes/Administrateur.class.php");
include_once(realpath(dirname(__FILE__)) . "/../../classes/Navigation.class.php");
session_start();
if( ! isset($_SESSION["util"]->id) ) {header("Location: ../index.php");exit;}
include_once(realpath(dirname(__FILE__)) . "/../../fonctions/divers.php");
?>
<?php if(! est_autorise("acces_catalogue")) exit; ?>
<?php
	include_once("../../classes/Exdecprod.class.php");
	header('Content-Type: text/html; charset=ISO-8859-1');

	print_r($_REQUEST);

	function moddecli($produit, $declidisp, $type){

		$exdecprod = new Exdecprod();

		mysql_query("delete from $exdecprod->table where produit=$produit and declidisp=$declidisp");

		if ($type != 0)
		{
			$exdecprod->produit = $produit;
			$exdecprod->declidisp = $declidisp;
			$exdecprod->add();
		}
	}

	moddecli(intval($_POST['produit']), intval($_POST['declidisp']), intval($_POST['type']));
?>