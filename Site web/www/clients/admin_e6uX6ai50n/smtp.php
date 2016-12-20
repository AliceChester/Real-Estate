<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                            		 */
/*                                                                                   */
/*      Copyright (c) Octolys Development		                                     */
/*		email : thelia@octolys.fr		        	                             	 */
/*      web : http://www.octolys.fr						   							 */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 2 of the License, or            */
/*      (at your option) any later version.                                          */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*      along with this program; if not, write to the Free Software                  */
/*      Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA    */
/*                                                                                   */
/*************************************************************************************/
?>
<?php
	include_once("pre.php");
	include_once("auth.php");
?>
<?php if(! est_autorise("acces_configuration")) exit; 
	
	include_once("../classes/Smtpconfig.class.php");
	
	if(isset($action)){
		switch($action){
			case "modifier":
				modification($serveur,$port,$username,$password,$secure,$active);
				break;
		}
	}
	
	function modification($serveur,$port,$username,$password,$secure,$active){
		$smtp  = new Smtpconfig();
		$smtp->charger(1);
		
		$smtp->serveur = $serveur;
		$smtp->port = $port;
		$smtp->username = $username;
		$smtp->password = $password;
		$smtp->secure = $secure;
		if($active == "on") $smtp->active = 1;
		else $smtp->active = 0;
		
		if($smtp->id != "") $smtp->maj();
		else $smtp->add();
		header("location: smtp.php");
	}
	
	$smtp = new Smtpconfig();
	$smtp->charger(1);
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("title.php");?>
</head>

<body>
<div id="wrapper">
<div id="subwrapper">

<?php
	$menu="configuration";
	include_once("entete.php");
?>

<div id="contenu_int"> 
   <p align="left"><a href="accueil.php" class="lien04">Accueil</a> <img src="gfx/suivant.gif" width="12" height="9" border="0" / <a href="configuration.php" class="lien04">Configuration</a> <img src="gfx/suivant.gif" width="12" height="9" border="0" / <a href="smtp.php" class="lien04">Configuration du mail</a></p>
   
<!-- bloc déclinaisons / colonne gauche -->  
<div id="bloc_description">
<div class="entete_liste_config">
	<div class="titre">CONFIGURATION DU MAIL</div>
	<div class="fonction_valider"><a href="javascript:document.getElementById('validation').submit()">VALIDER LES MODIFICATIONS</a></div>
</div>
<div class="bordure_bottom">
	<form method="post" action="smtp.php" id="validation">
		<input type="hidden" name="action" value="modifier">
		<ul class="claire">
			<li style="width:200px;">Serveur</li>
			<li style="width:360px; border-left:1px solid #96A8B5;"><input name="serveur" type="text" class="form" value="<?php echo $smtp->serveur; ?>" size="50" /></li>
		</ul>
		<ul class="fonce">
			<li style="width:200px;">port</li>
			<li style="width:360px; border-left:1px solid #96A8B5;"><input name="port" type="text" class="form" value="<?php if($smtp->port == "") echo "25"; else echo $smtp->port ?>" size="50" /></li>
		</ul>
		<ul class="claire">
			<li style="width:200px;">Nom d'utilisateur</li>
			<li style="width:360px; border-left:1px solid #96A8B5;"><input name="username" type="text" class="form" value="<?php echo $smtp->username; ?>" size="50" /></li>
		</ul>
		<ul class="fonce">
			<li style="width:200px;">Mot de passe</li>
			<li style="width:360px; border-left:1px solid #96A8B5;"><input name="password" type="password" class="form" value="<?php echo $smtp->password; ?>" size="50" /></li>
		</ul>
		<ul class="claire">
			<li style="width:200px;">Protocole sécurisé (tls,ssl,...)</li>
			<li style="width:360px; border-left:1px solid #96A8B5;"><input name="secure" type="text" class="form" value="<?php echo $smtp->secure; ?>" size="50" /></li>
		</ul>
		<ul class="fonce">
			<li style="width:200px;">Actif</li>
			<li style="width:360px; border-left:1px solid #96A8B5;"><input type="checkbox" class="form" name="active" <?php if($smtp->active) echo "checked";?>></li>
		</ul>
     
   </form>

</div>    
</div>
<!-- fin du bloc de description / colonne de gauche -->
</div>
<?php include_once("pied.php");?>
</div>
</div>
</body>
</html>
