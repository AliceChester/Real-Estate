<?php
include_once(realpath(dirname(__FILE__)) . "/../../classes/Administrateur.class.php");
include_once(realpath(dirname(__FILE__)) . "/../../classes/Navigation.class.php");
session_start();
if( ! isset($_SESSION["util"]->id) ) {header("Location: ../index.php");exit;}
include_once(realpath(dirname(__FILE__)) . "/../../fonctions/divers.php");
?>
<?php if(! est_autorise("acces_catalogue")) exit; ?>
<?php
include_once("../../classes/Produit.class.php");
include_once("../../classes/Produitdesc.class.php");
header('Content-Type: text/html; charset=ISO-8859-1');

$sep = explode( "_", $_GET['id']);

$pos = strpos($_GET['id'], "_");

$modif = substr($_GET['id'], 0, $pos);

$prod = new Produit();

$valeur = $_GET["modif"];
$rubrique = substr($_GET['id'], $pos+1);
$query = mysql_query("select * from $prod->table where rubrique=$rubrique");
$list = "";
while($row = mysql_fetch_object($query)){
	$list .= $row->id.",";
}
$list = substr($list,0,strlen($list)-1);

$query = mysql_query("UPDATE $prod->table set $modif=$valeur where id IN($list)");
?>