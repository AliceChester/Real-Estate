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
	include_once("../classes/Caracteristique.class.php");
	include_once("../fonctions/divers.php");
	include_once("../lib/JSON.php");

	include_once("../classes/Lang.class.php");
	include_once("../classes/Caracdisp.class.php");
	include_once("../classes/Rubcaracteristique.class.php");
	include_once("../classes/Rubrique.class.php");

	if(!isset($action)) $action="";
	if(!isset($lang)) $lang="1";
	if(!isset($tabdisp)) $tabdisp="";
	if(!isset($affiche)) $affiche="";

?>
<?php
	switch($action){
		case 'modclassement' : modclassement($id, $type); break;
		case 'modifier' : modifier($id, $lang, $titre, $chapo, $description, $tabdisp, $affiche); break;
		case 'maj' : maj($id, $lang, $titre, $chapo, $description, $tabdisp, $affiche); break;
		case 'ajouter' : ajouter($lang, $id, $titre, $chapo, $description, $tabdisp, $affiche, $ajoutrub); break;
		case 'ajcaracdisp' : ajcaracdisp($id, $caracdisp, $lang); break;
		case 'majcaracdisp' : majcaracdisp($id, $lang); break;
		case 'supprimer' : supprimer($id); break;
		case 'suppcaracdisp' : suppcaracdisp($caracdisp);
		case 'modclassementcaracdisp' : modclassementcaracdisp($id, $cacacdispdesc, $type, $lang); break;
		case 'setclassementcaracdisp' : setclassementcaracdisp($id, $caracdispdesc, $classement, $lang); break;
	}

?>
<?php
	function modclassement($id, $type){

      	$car = new Caracteristique();
        $car->charger($id);
        $car->changer_classement($id, $type);

	    header("Location: caracteristique.php");

	}

	function modifier($id, $lang, $titre, $chapo, $description, $tabdisp, $affiche){


		if(!$lang) $lang=1;

		$caracteristique = new Caracteristique();
		$caracteristiquedesc = new Caracteristiquedesc();
		$caracteristique->charger($id);
		$res = $caracteristiquedesc->charger($caracteristique->id, $lang);

		if(!$res){
			$temp = new Caracteristiquedesc();
			$temp->caracteristique=$caracteristique->id;
			$temp->lang=$lang;
			$temp->add();
			$caracteristiquedesc->charger($caracteristique->id, $lang);

		}

		 if($affiche!="") $caracteristique->affiche = 1;
		 else $caracteristique->affiche = 0;

		 $caracteristiquedesc->chapo = $chapo;
		 $caracteristiquedesc->description = $description;
		 $caracteristiquedesc->titre = $titre;

	 	 $caracteristiquedesc->chapo = str_replace("\n", "<br/>", $caracteristiquedesc->chapo);
		 $caracteristiquedesc->description = str_replace("\n", "<br/>", $caracteristiquedesc->description);

		 $caracteristique->maj();
		 $caracteristiquedesc->maj();

	     header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id);
	}

	function ajouter($lang, $id, $titre, $chapo, $description, $tabdisp, $affiche, $ajoutrub){

	 $caracteristique = new Caracteristique();
	 $caracteristique->charger($id);

   	 if($caracteristique->id) return;

	 $caracteristique = new Caracteristique();

	 $query = "select max(classement) as maxClassement from $caracteristique->table";

	 $resul = mysql_query($query, $caracteristique->link);
     $maxClassement = mysql_result($resul, 0, "maxClassement");


	 $caracteristique->id = $id;
	 if($affiche!="") $caracteristique->affiche = 1;
	 else $caracteristique->affiche = 0;

	 $caracteristique->classement =  $maxClassement + 1;

	 $lastid = $caracteristique->add();

	 $caracteristiquedesc = new Caracteristiquedesc();

	 $caracteristiquedesc->chapo = $chapo;
	 $caracteristiquedesc->description = $description;
	 $caracteristiquedesc->caracteristique = $lastid;
	 $caracteristiquedesc->lang = 1;
	 $caracteristiquedesc->titre = $titre;

	 $caracteristiquedesc->chapo = str_replace("\n", "<br/>", $caracteristiquedesc->chapo);
     $caracteristiquedesc->description = str_replace("\n", "<br/>", $caracteristiquedesc->description);

	 $caracteristiquedesc->add();

	if (intval($ajoutrub) == 1)
	{
		 $rubrique = new Rubrique();
		 $query = "select * from $rubrique->table";
		 $resul = mysql_query($query, $rubrique->link);

		 while($row = mysql_fetch_object($resul)){
			$rubcaracteristique = new Rubcaracteristique();
			$rubcaracteristique->rubrique = $row->id;
			$rubcaracteristique->caracteristique = $lastid;
			$rubcaracteristique->add();
		 }
	 }

	 header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $lastid);

	}

	function supprimer($id){

		$caracdisp = new Caracdisp();
		$rubcaracteristique = new Rubcaracteristique();

		$query = "select * from $caracdisp->table where caracteristique='$id'";
		$resul = mysql_query($query, $caracdisp->link);

		while($row = mysql_fetch_object($resul)){
			$caracdisp->charger($row->id);
			$caracdisp->supprimer();
		}

		$query = "delete from $rubcaracteristique->table where caracteristique='$id'";
		$resul = mysql_query($query, $rubcaracteristique->link);

		$caracteristique = new Caracteristique();
		$caracteristique->charger($id);
		$caracteristique->supprimer();

	    header("Location: caracteristique.php");

	}

	function suppcaracdisp($caracdisp){
                $tcaracdisp = new Caracdisp();
		$tcaracdisp->charger($caracdisp);
		$tcaracdisp->supprimer();

	}

	function ajcaracdisp($id, $caracdisp, $lang){

     	if(!$lang) $lang=1;


		$tcaracdisp = new Caracdisp();
		$tcaracdisp->caracteristique = $id;
		$res = $tcaracdisp->add();

		$tcaracdispdesc = new Caracdispdesc();
		$tcaracdispdesc->caracdisp = $res;
		$tcaracdispdesc->lang = $lang;
		$tcaracdispdesc->titre = $caracdisp;

		$tcaracdispdesc->classement = 1 + maxClassement($id, $lang);

		$tcaracdispdesc->add();
	}


	function majcaracdisp($id, $lang){

		global $caracdispdesc_titre;

		foreach($caracdispdesc_titre as $idcaracdisp => $valeur)
		{
			$caracdispdesc = new Caracdispdesc();

			$existe = $caracdispdesc->charger_caracdisp($idcaracdisp, $lang);

			$caracdispdesc->caracdisp = $idcaracdisp;
			$caracdispdesc->lang = $lang;
			$caracdispdesc->titre = $valeur;

			if (! $existe)
			{
				$caracdispdesc->classement = 1 + maxClassement($id, $lang);

				$caracdispdesc->add();
			}
			else
			{
				$caracdispdesc->maj();
			}
		}
	}

	/* Tri des valeurs de Caracdisp */

	function maxClassement($idcaracteristique, $lang)
	{
		$caracdispdesc = new Caracdispdesc();
		$caracdisp = new Caracdisp();

		$query = "
			select
				max(ddd.classement) as maxClassement
			from
				$caracdispdesc->table ddd
			left join
				$caracdisp->table dd on dd.id = ddd.caracdisp
			where
				lang=$lang
			and
				dd.caracteristique=$idcaracteristique
		";

		$resul = $caracdispdesc->query($query);

     	return intval(mysql_result($resul, 0, "maxClassement"));
	}

	function modclassementcaracdisp($idcaracteristique, $idcaracdispdesc, $type, $lang)
	{
		$caracdispdesc = new Caracdispdesc();

		if ($caracdispdesc->charger($idcaracdispdesc, $lang))
		{
			$remplace = new Caracdispdesc();

			if ($type == "M")
			{
				$where = "classement<" . $caracdispdesc->classement . " order by classement desc";
			}
			else if ($type == "D")
			{
				$where  = "classement>" . $caracdispdesc->classement . " order by classement";
			}

			$caracdisp = new Caracdisp();

			$query = "
				select
					*
				from
					$caracdispdesc->table
				where
					lang=$lang
				and
					caracdisp in (select id from $caracdisp->table where caracteristique = $idcaracteristique)
				and
					$where
				limit
					0, 1
			";

			if ($remplace->getVars($query))
			{
				$sauv = $remplace->classement;

				$remplace->classement = $caracdispdesc->classement;
				$caracdispdesc->classement = $sauv;

            	$remplace->maj();
            	$caracdispdesc->maj();
			}
		}
	}

	function setclassementcaracdisp($idcaracteristique, $idcaracdispdesc, $classement, $lang)
	{
		$caracdispdesc = new Caracdispdesc();

		if ($caracdispdesc->charger($idcaracdispdesc, $lang))
		{
			if ($classement == $caracdispdesc->classement) return;

			if ($classement > $caracdispdesc->classement)
			{
				$offset = -1;
				$between = "$caracdispdesc->classement and $classement";
			}
			else
			{
				$offset = 1;
				$between = "$classement and $caracdispdesc->classement";
			}

			$caracdisp = new Caracdisp();

			$query = "
				select
					id
				from
					$caracdispdesc->table
				where
					lang=$lang
				and
					caracdisp in (select id from $caracdisp->table where caracteristique = $idcaracteristique)
				and
					classement BETWEEN $between
			";

			$resul = mysql_query($query, $caracdispdesc->link);

			$ddd = new Caracdispdesc();

			while($row = mysql_fetch_object($resul))
			{
				if ($ddd->charger($row->id, $lang))
				{
					$ddd->classement += $offset;
					$ddd->maj();
				}
			}

			$caracdispdesc->classement = $classement;
			$caracdispdesc->maj();
		}
	}

	function ecrire_bloc_classement($idcaracteristique, $caracdispdesc, $lang, $existe) {

		// On n'affiche rien si l'element n'existe pas encore
		if (! $existe) return;

		$cour = intval($caracdispdesc->classement);
		$haut = $cour - 1;
		$bas = $cour + 1;
		$url = "caracteristique_modifier.php?action=modclassementcaracdisp&id=$idcaracteristique&cacacdispdesc=$caracdispdesc->id&lang=$lang&type=";

		$res = '
			<div class="bloc_classement">
	    		<div class="classement"><a href="'.$url.'M"><img src="gfx/up.gif" border="0" /></a></div>
	    		<div class="classement"><span id="caracdispdesc_'.$caracdispdesc->id.'" class="classement_edit">'.$cour.'</span></div>
	    		<div class="classement"><a href="'.$url.'D"><img src="gfx/dn.gif" border="0" /></a></div>
	 		</div>
	 	';

		return $res;
	}

?>
<?php
	$caracteristique = new Caracteristique();
	$caracteristiquedesc = new Caracteristiquedesc();

	$caracteristique->charger($id);
	$caracteristiquedesc->charger($caracteristique->id, $lang);


	$caracteristiquedesc->chapo = str_replace("<br/>", "\n", $caracteristiquedesc->chapo);
	$caracteristiquedesc->description = str_replace("<br/>", "\n", $caracteristiquedesc->description);

	$caracdisp = new Caracdisp();
	$caracdispdesc = new Caracdispdesc();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once("title.php"); ?>
<script type="text/javascript" src="../lib/jquery/jquery.js"></script>
<script type="text/javascript" src="../lib/jquery/jeditable.js"></script>
<script type="text/javascript">

	  function ajout(){

		  if(document.getElementById('zoneid').value != ""){

	  	 	document.getElementById('zoneaction').value='ajcaracdisp';
	  	 	document.getElementById('form_modif').submit();
		 }

		  else alert("Veuillez d'abord creer votre caracteristique");

	  }

	  function maj(){

		  if(document.getElementById('zoneid').value != ""){

	  	 	document.getElementById('zoneaction').value='majcaracdisp';
	  	 	document.getElementById('form_modif').submit();
		 }

		  else alert("Veuillez d'abord creer votre caracteristique");

	  }

	  function suppr(caracdisp){
	  	if(confirm("Voulez-vous vraiment supprimer cette entree ?")) location="<?php echo($_SERVER['PHP_SELF'] ); ?>?id=<?php echo($id); ?>&action=suppcaracdisp&caracdisp=" + caracdisp;

	  }

	  $(document).ready(function() {

			$(".classement_edit").editable(
				function(value, settings) {
					// L'ID est de la forme quelquechose_N, ou N est l'ID du caracdispdesc
					// On récupère l'ID uniquement.
					var idcaracdispdesc = $(this).attr('id').replace(/^[^_]+_/, '');

					var loc = "<?php echo($_SERVER['PHP_SELF'] ); ?>?id=<?php echo($id); ?>"
						     + "&action=setclassementcaracdisp"
						     + "&caracdispdesc=" + idcaracdispdesc
						     + "&lang=<?php echo $lang ?>"
						     + "&classement="+value;

					location = loc;

				    return value;
				},
				{
			      select : true,
			      onblur: "submit",
			      cssclass : "ajaxedit"
				 }
			  );
	  });

</script>
</head>

<body>
<div id="wrapper">
<div id="subwrapper">

<?php
	$menu="configuration";
	include_once("entete.php");

	if(!$lang) $lang=1;
?>

<div id="contenu_int">
   <p><span class="lien04"><a href="accueil.php" class="lien04">Accueil</a></span> <a href="#" onclick="document.getElementById('form_modif').submit()"><img src="gfx/suivant.gif" width="12" height="9" border="0" /></a><a href="configuration.php" class="lien04"> Configuration </a><img src="gfx/suivant.gif" width="12" height="9" border="0" /></a><a href="caracteristique.php" class="lien04"> Gestion des caract&eacute;ristiques </a><img src="gfx/suivant.gif" width="12" height="9" border="0" />  <?php if( !$id) { ?>Ajouter<?php } else { ?> Modifier <?php } ?></p>

<!-- bloc caractéristiques /colonne gauche -->
<div id="bloc_description">
 <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="form_modif" ENCTYPE="multipart/form-data">
	<input type="hidden" name="action" id="zoneaction" value="<?php if(!$id) { ?>ajouter<?php } else { ?>modifier<?php } ?>" />
	<input type="hidden" id="zoneid" name="id" value="<?php echo($id); ?>" />
 	<input type="hidden" name="lang" value="<?php echo($lang); ?>" />
	<!-- bloc entete des caractéristiques -->
<div class="entete_liste_config">
	<div class="titre">MODIFICATION DES CARACTERISTIQUES</div>
	<div class="fonction_valider"><a href="#" onclick="document.getElementById('form_modif').submit()">VALIDER LES MODIFICATIONS</a></div>
</div>

<!-- bloc descriptif de la caractéristique -->
<table width="100%" cellpadding="5" cellspacing="0">
    <tr class="claire">
        <th class="designation">Changer la langue</th>
        <th>
      						<?php
								$langl = new Lang();
								$query = "select * from $langl->table";
								$resul = mysql_query($query);
								while($row = mysql_fetch_object($resul)){
									$langl->charger($row->id);
						    ?>
		<div class="flag">
			<a href="<?php echo($_SERVER['PHP_SELF']); ?>?id=<?php echo($id); ?>&lang=<?php echo($langl->id); ?>">
				<img src="gfx/lang<?php echo($langl->id); ?>.gif" />
			</a>
		</div>
		<?php } ?>
		</th>
   	</tr>
   	<tr class="fonce">
        <td class="designation">Titre de la caractéristique</td>
        <td><input name="titre" id="titre" type="text" class="form_long" value="<?php echo($caracteristiquedesc->titre); ?>"/></td>
   	</tr>
   	<tr class="claire">
        <td class="designation">Chapo<br /><span class="note">(courte description d'introduction)</span></td>
        <td> <textarea name="chapo" id="chapo" cols="40" rows="2" class="form_long"><?php echo($caracteristiquedesc->chapo); ?></textarea></td>
   	</tr>
   	<tr class="fonce">
        <td class="designation">Description<br /><span class="note">(description complète)</span></td>
        <td><textarea name="description" id="description" cols="53" rows="2" class="form"><?php echo($caracteristiquedesc->description); ?></textarea></td>
   	</tr>
	<tr class="claire">
        <td class="designation">Visible</td>
        <td>
        <input name="affiche" type="checkbox" class="form" <?php if($caracteristique->affiche || $id == "" ) { ?> checked="cheked" <?php } ?>/><span class="note">(permet de rendre visible ou non cette caractéristique à l'affichage dans une boucle)</span></td>
    </tr>
   	<?php if(!$id) { ?>
   	<tr class="fonce">
        <td class="designation">Ajout automatique</td>
        <td><input type="checkbox" name="ajoutrub" value="1" checked="checked" />Ajouter cette caractéristique à toutes les rubriques</td>
   	</tr>
   	<?php } ?>
</table>
<?php
	admin_inclure("caracteristiquemodifier");
?>
	<?php if($id != ""){ ?>
<div class="entete_liste_config">
	<div class="titre">INFORMATIONS SUR LA CARACTERISTIQUE</div>
</div>
<table width="100%" cellpadding="5" cellspacing="0">
    <tr class="claire">
    	<th class="designation" style="width:134px;">ID</th>
        <th><?php echo($caracteristique->id); ?></th>
   	</tr>
</table>
	<?php } ?>
  </div>
<!-- fin du bloc de description / colonne de gauche -->
<?php if($id != ""){ ?>
  <!-- bloc de gestion des valeurs de la caractéristique / colonne de droite-->
<div id="bloc_colonne_droite">
	<div class="entete_config">
		<div class="titre">AJOUTER UNE VALEUR</div>
	</div>
	<!-- bloc d'ajout des valeurs -->
			<ul class="ligne1">
				<li>
					<input type="hidden" name="id" value="<?php echo($id); ?>" />
      				<input name="caracdisp" type="text" class="form_inputtext" />
				</li>
				<li><a href="#" onclick="ajout()">AJOUTER</a></li>
			</ul>


	<div class="entete_config" style="margin:10px 0 0 0;">
		<div class="titre">VALEURS DISPONIBLES</div>

		<div class="maj">
      		<a href="#" onclick="maj()">METTRE A JOUR</a>
     	</div>
	</div>
	<!-- bloc des valeurs disponibles -->
	<?php
               if(!$lang) $lang=1;

                $query = "
                	select
                		dd.*
                	from
                		$caracdisp->table dd
                	left join
                		$caracdispdesc->table ddd on ddd.caracdisp = dd.id and lang = $lang
                	where
                		dd.caracteristique='$id'
                	order by
                		ddd.classement, dd.id";

                $resul = mysql_query($query);

                $caracdispdesclang = new Caracdispdesc();
                $i=0;
                while($row = mysql_fetch_object($resul)){
                        $query2 = "select * from $caracdispdesc->table where caracdisp='$row->id' and lang='1' order by classement";
                        $resul2 = mysql_query($query2);
                        while($row2 = mysql_fetch_object($resul2)){
                                $caracdispdesc->charger($row2->id, 1);
                                $caracdispdesclang->charger_caracdisp($row2->caracdisp, $lang);

                                if(!($i%2)) $fond="claire";
  								else $fond="fonce";
  								$i++;
            ?>

			<ul class="<?php echo($fond); ?>">
				<li style="width:50px;">ID : <?php echo($row->id); ?></li>
				<?php if($lang == "1") { ?>
				<li><input type="text" name="caracdispdesc_titre[<?php echo($row->id); ?>]" value="<?php echo($caracdispdesc->titre); ?>" class="form_court" /></li>
				<li style="padding-left: 90px;"><?php echo ecrire_bloc_classement($row->caracteristique, $caracdispdesc, $lang, $caracdispdesc->id != 0) ?></li>
				<li style="text-align:right; width:20px;">
	  			  	<a href="#" onclick="suppr('<?php echo($row->id); ?>')"><img src="gfx/supprimer.gif" width="9" height="9" border="0" /></a>
				</li>
    			<?php } else { ?>
	   				<li><input type="text" name="caracdispdesc_titre[<?php echo($row->id); ?>]" value="<?php echo($caracdispdesclang->titre); ?>" class="form_court" /></li>
	   				<li style="text-align:left; width:105px; overflow:hidden;"><?php echo($caracdispdesc->titre); ?></li>
					<li><?php echo ecrire_bloc_classement($row->caracteristique, $caracdispdesclang, $lang, $caracdispdesclang->id != 0) ?></li>
   				<?php } ?>
			</ul>
			 <?php
              }
             }
             ?>
</div>
<!-- fin du bloc colonne de droite -->
<?php } ?>
  </form>

</div>
<?php include_once("pied.php");?>
</div>
</div>
</body>
</html>