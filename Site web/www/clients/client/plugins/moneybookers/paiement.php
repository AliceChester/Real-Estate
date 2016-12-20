<?php
/*****************************************************************************
 *
 * Auteur   : Bruno | atnos.com (contact: contact@atnos.com)
 * Version  : 0.1
 * Date     : 29/07/2007
 *
 * Copyright (C) 2007 Bruno PERLES
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 *****************************************************************************/

	include_once(realpath(dirname(__FILE__)) . "/../../../classes/Navigation.class.php");
	include_once(realpath(dirname(__FILE__)) . "/../../../classes/Venteprod.class.php");
	include_once(realpath(dirname(__FILE__)) . "/config.php");
		
	session_start();

	$total = 0;

    $total = $_SESSION['navig']->commande->total;

?>

<html>
<head>
</head>
<body onload="document.getElementById('formmoneybookers').submit()">
<?php
//"
// Référence
$Reference_Cde = urlencode($_SESSION['navig']->commande->transaction);

// Montant
$Montant          = $total;
$Montant		  -= $_SESSION["navig"]->commande->remise;
//echo $Montant; exit;

?>

	<br />
	

	
	<form action="<?php echo $serveur; ?>" id="formmoneybookers" method="post">
		
		<?php
		$raison = array("Mrs","Miss","Mr");
		?>
		
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="status_url" value="<?php echo $confirm; ?>" />
		<input type="hidden" name="status_url2" value="<?php echo $compte_moneybookers; ?>" />
		<input type="hidden" name="pay_from_email" value="<?php echo $_SESSION["navig"]->client->email; ?>" />
		<input type="hidden" name="title" value="<?php echo $raison[($_SESSION["navig"]->client->raison)-1]; ?>" />
		<input type="hidden" name="firstname" value="<?php echo $_SESSION["navig"]->client->prenom; ?>" />
		<input type="hidden" name="lastname" value="<?php echo $_SESSION["navig"]->client->nom; ?>" />
		<input type="hidden" name="address" value="<?php echo $_SESSION["navig"]->client->adresse1; ?>" />
		<?php
		if($_SESSION["navig"]->client->adresse2 != ""){
		?>
		<input type="hidden" name="address2" value="<?php echo $_SESSION["navig"]->client->adresse2; ?>" />
		<?php
		}
		?>
		<input type="hidden" name="phone_number" value="<?php echo str_replace(' ','',$_SESSION["navig"]->client->telfixe); ?>" />
		<input type="hidden" name="postal_code" value="<?php echo $_SESSION["navig"]->client->cpostal; ?>" />
		<input type="hidden" name="city" value="<?php echo $_SESSION["navig"]->client->ville; ?>" />
		<input type="hidden" name="country" value="GBR" />
		
		<input type="hidden" name="amount" value="<?php echo $Montant; ?>" />
		<input type="hidden" name="shipping_1" value="<?php echo $_SESSION["navig"]->commande->port; ?>" />

		
		<input type="hidden" name="pay_to_email" value="<?php echo $compte_moneybookers; ?>" />
		<input type="hidden" name="cmd" value="_cart" />
		<input type="hidden" name="currency" value="<?php echo $Devise; ?>" />
		<input type="hidden" name="payer_id" value="<?php echo $_SESSION["navig"]->client->id; ?>" />
		<input type="hidden" name="payer_email" value="<?php echo $_SESSION["navig"]->client->email; ?>" />
		<input type="hidden" name="return_url" value="<?php echo $retourok; ?>" />
		<input type="hidden" name="return_url_text" value="<?php echo $return_url_text ?>" />
		<input type="hidden" name="return_url_target" value="1" />
		<input type="hidden" name="cancel_url" value="<?php echo $retournok; ?>" />
		<input type="hidden" name="return_url_target" value="1" />
		<input type="hidden" name="transaction_id" value="<?php echo $Reference_Cde; ?>" />
		<input type="hidden" name="language" value="<?php echo $Code_Langue; ?>" />
		<input type="hidden" name="hide_login" value="1" />
		<input type="hidden" name="payment_methods" value="<?php echo $_POST['choix'] ?>" />
		
		
	</form>
	

	
</body>
</html>
