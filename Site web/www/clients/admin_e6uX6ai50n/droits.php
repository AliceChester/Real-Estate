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
<?php if(! est_autorise("acces_configuration")) exit; ?>
<?php
	include_once("../classes/Administrateur.class.php");
	include_once("../classes/Autorisation.class.php");
	include_once("../classes/Autorisationdesc.class.php");
	include_once("../classes/Autorisation_administrateur.class.php");
	include_once("../classes/Autorisation_modules.class.php");
	include_once("../classes/Modules.class.php");
	include_once("../classes/Modulesdesc.class.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("title.php");?>

<script type="text/javascript" src="../lib/jquery/jquery.js"></script>

<script type="text/javascript">
	function changer_droits_admin(autorisation, mode, valeur){
		if(valeur != "")
			valeur = 1;
		else 
			valeur = 0;
 
		$.ajax({type:'GET', url:'ajax/droits.php', data:'type_droit=1&autorisation='+autorisation+'&administrateur=<?php echo $_GET['id']; ?>' + '&mode=' + mode + '&valeur=' + valeur})
	}

	function changer_droits_module(module, valeur){
		if(valeur == true)
			valeur = 1;
		else 
			valeur = 0;
 
		$.ajax({type:'GET', url:'ajax/droits.php', data:'type_droit=2&module='+module+'&administrateur=<?php echo $_GET['id']; ?>' + '&valeur=' + valeur})
		
	}

</script>
</head>

<body>
<div id="wrapper">
<div id="subwrapper">

<?php
	$menu="configuration";
	include_once("entete.php");
?>

<div id="contenu_int"> 
   <p align="left"><a href="accueil.php" class="lien04">Accueil</a>  <img src="gfx/suivant.gif" width="12" height="9" border="0" /> <a href="configuration.php" class="lien04">Configuration</a> <img src="gfx/suivant.gif" width="12" height="9" border="0" / <a href="droits.php" class="lien04">Gestion des droits</a></p>

<!-- bloc dŽclinaisons / colonne gauche -->  

<br />
	<div class="titre">
		<select onchange="location='droits.php?id=' + this.value">
			<option value="">S&eacute;lectionnez un administrateur ...</option>		
			<?php
				$administrateur = new Administrateur();
				$query = "select * from $administrateur->table where profil<>1";
				$resul = mysql_query($query, $administrateur->link);
				while($row = mysql_fetch_object($resul)){
			?>	
				<option value="<?php echo $row->id; ?>" <?php if(isset($_GET['id']) && $_GET['id'] == $row->id) { ?> selected="selected" <?php } ?>><?php echo $row->identifiant; ?></option>
			<?php		
				}
			?>
		</select>
	</div>
	
	<br /><br />
	
<?php
	if($_GET['id']){
?>
<div class="entete_liste_config">
	<div class="titre">DROITS GENERAUX</div>
</div>
<ul class="Nav_bloc_description">
		<li style="height:25px; width:258px;">Autorisation</li>
		<li style="height:25px; width:517px; border-left:1px solid #96A8B5;">Description</li>
		<li style="height:25px; width:55px; border-left:1px solid #96A8B5;">Acc&egrave;s</li>
</ul>
<div class="bordure_bottom">
 	<?php
  	
	$autorisation = new Autorisation();

 	$query = "select * from $autorisation->table";
  	$resul = mysql_query($query, $autorisation->link);
  	$i=0;
  	while($row = mysql_fetch_object($resul)){
			if(!($i%2)) $fond="ligne_claire_rub";
  			else $fond="ligne_fonce_rub";
  			$i++;

			$autorisationdesc = new Autorisationdesc();
			$autorisationdesc->charger($row->id);

			$autorisation_administrateur = new Autorisation_administrateur();
			$autorisation_administrateur->charger($row->id, $_GET['id']);
 	 ?>
		<ul class="<?php echo $fond; ?>">
			<li style="width:250px;"><?php echo $autorisationdesc->titre; ?></li>
			<li style="width:510px; border-left:1px solid #96A8B5;"><?php echo $autorisationdesc->description; ?></li>
			<li style="width:47px; border-left:1px solid #96A8B5;"><input type="checkbox" onchange="changer_droits_admin(<?php echo $row->id; ?>, 'lecture', this.checked)" <?php if($autorisation_administrateur->lecture) { ?> checked="checked" <?php } ?> /></li>
		</ul>
	 <?php } ?>
	
	<br />
	
	<div class="entete_liste_config">
		<div class="titre">DROITS SUR LES MODULES</div>
	</div>
	<ul class="Nav_bloc_description">
			<li style="height:25px; width:258px;">Module</li>
			<li style="height:25px; width:517px; border-left:1px solid #96A8B5;">Description</li>
			<li style="height:25px; width:55px; border-left:1px solid #96A8B5;">Acc&egrave;s</li>
	</ul>
	<div class="bordure_bottom">
	 	<?php

		$modules = new Modules();

	 	$query = "select * from $modules->table where actif='1'";
	  	$resul = mysql_query($query, $modules->link);
	  	$i=0;
	  	while($row = mysql_fetch_object($resul)){
		
				$autorisation_modules = new Autorisation_modules();
				$autorisation_modules->charger($row->id, $_GET['id']);
					
			   $trouve = 0;
		  	   $d = dir("../client/plugins/" . $row->nom);

			   while (false !== ($entry = $d->read())) {
			   		if( substr($entry, 0, 1) == ".") continue;
			   		if(strstr($entry, "_admin"))
				  	 $trouve = 1;
			   }
					
			    if(! $trouve)
					continue;
					
				if(!($i%2)) $fond="ligne_claire_rub";
	  			else $fond="ligne_fonce_rub";
	  			$i++;

				$modulesdesc = new Modulesdesc();
				$modulesdesc->charger($row->id);
	 	 ?>
			<ul class="<?php echo $fond; ?>">
				<li style="width:250px;"><?php echo $row->nom; ?></li>
				<li style="width:510px; border-left:1px solid #96A8B5;"><?php echo $modulesdesc->description; ?></li>
				<li style="width:47px; border-left:1px solid #96A8B5;"><input type="checkbox" onchange="changer_droits_module(<?php echo $row->id; ?>, this.checked)" <?php if($autorisation_modules->autorise) { ?> checked="checked" <?php } ?> /></li>
			</ul>
		 <?php } ?>

	</div>

	
</div>

<?php
	}
?>

</div>



	  
<?php include_once("pied.php");?>
</div>
</div>
</body>
</html>