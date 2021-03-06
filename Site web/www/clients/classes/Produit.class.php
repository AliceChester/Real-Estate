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
	include_once(realpath(dirname(__FILE__)) . "/Baseobj.class.php");
	include_once(realpath(dirname(__FILE__)) . "/Produitdesc.class.php");
	include_once(realpath(dirname(__FILE__)) . "/Stock.class.php");
	include_once(realpath(dirname(__FILE__)) . "/Image.class.php");
	include_once(realpath(dirname(__FILE__)) . "/Document.class.php");

	class Produit extends Baseobj{

		var $id;
		var $ref;
		var $datemodif;
		var $prix;
		var $ecotaxe;
		var $promo;
		var $ligne;
		var $garantie;
		var $prix2;
		var $rubrique;
		var $nouveaute;
		var $perso;
		var $stock;
		var $poids;
		var $tva;
		var $classement;

		const TABLE="produit";
		var $table=self::TABLE;

		var $bddvars=array("id", "ref", "datemodif", "prix", "ecotaxe", "promo", "ligne", "garantie", "prix2", "rubrique", "nouveaute", "perso", "stock", "poids", "tva", "classement");

		function Produit($ref = ""){
			$this->Baseobj();

			if($ref != "")
 			  $this->charger($ref);
		}

		function charger(){
			$ref = func_get_arg(0);
			return $this->getVars("select * from $this->table where ref=\"$ref\"");

		}

		function charger_id(){
			$id = func_get_arg(0);
			return $this->getVars("select * from $this->table where id=\"$id\"");

		}

		function changer_classement($ref, $type){

			$this->charger($ref);
			$remplace = new Produit();

			if($type == "M")
				$res = $remplace->getVars("select * from $this->table where rubrique=\"" . $this->rubrique. "\" and classement<" . $this->classement . " order by classement desc limit 0,1");

			else if($type == "D")
				$res  = $remplace->getVars("select * from $this->table where rubrique=\"" . $this->rubrique. "\" and classement>" . $this->classement . " order by classement limit 0,1");

			if(! $res)
				return "";

			$sauv = $remplace->classement;

			$remplace->classement = $this->classement;
			$this->classement = $sauv;

            $remplace->maj();
            $this->maj();

		}

		function delete(){
				$requete = func_get_arg(0);
				$resul = mysql_query($requete);
		}

		function supprimer(){

			if ($this->id == 0 || $this->id == "") return;

			$stock = new Stock();
			$query = "delete from $stock->table where produit='" . $this->id . "'";
			$resul = mysql_query($query, $stock->link);

			$image = new Image();
			
			$query = "select * from $image->table where produit=\"" . $this->id . "\" AND dossier=\"0\" AND contenu=\"0\" AND rubrique=\"0\" ";
			$resul = mysql_query($query, $image->link);
			while($row = mysql_fetch_object($resul)){
				$tmp = new Image();
				$tmp->charger($row->id);
				$tmp->supprimer();

			}

			$document = new Document();

			$query = "select * from $document->table where produit=\"" . $this->id . "\" AND dossier=\"0\" AND contenu=\"0\" AND rubrique=\"0\" ";
			$resul = mysql_query($query, $document->link);
			while($row = mysql_fetch_object($resul)){
				$tmp = new Document();
				$tmp->charger($row->id);
				$tmp->supprimer();

			}

			$produitdesc =  new Produitdesc();

			$this->delete("delete from $this->table where id=\"$this->id\"");
			$this->delete("delete from $produitdesc->table where produit=\"$this->id\"");

			return 1;

		}


	}

?>