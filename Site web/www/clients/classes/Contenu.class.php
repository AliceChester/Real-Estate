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
	include_once(realpath(dirname(__FILE__)) . "/Contenudesc.class.php");
	include_once(realpath(dirname(__FILE__)) . "/Image.class.php");
	include_once(realpath(dirname(__FILE__)) . "/Document.class.php");

	class Contenu extends Baseobj{

		var $id;
		var $datemodif;
		var $ligne;
		var $dossier;
		var $classement;

		const TABLE="contenu";
		var $table=self::TABLE;

		var $bddvars=array("id", "datemodif", "ligne", "dossier", "classement");

		function Contenu($id = 0){
			$this->Baseobj();

			if($id > 0)
 			  $this->charger($id);
		}


		function charger(){
			$id = func_get_arg(0);

			return $this->getVars("select * from $this->table where id=\"$id\"");

		}

		function changer_classement($id, $type){

			$this->charger($id);
			$remplace = new Contenu();

			if($type == "M")
				$res = $remplace->getVars("select * from $this->table where dossier=\"" . $this->dossier. "\" and classement<" . $this->classement . " order by classement desc limit 0,1");

			else if($type == "D")
				$res  = $remplace->getVars("select * from $this->table where dossier=\"" . $this->dossier. "\" and classement>" . $this->classement . " order by classement limit 0,1");

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

			$image = new Image();
			
			$query = "select * from $image->table where contenu=\"" . $this->id . "\" AND dossier=\"0\" AND produit=\"0\" AND rubrique=\"0\" ";
			$resul = mysql_query($query, $image->link);
			while($row = mysql_fetch_object($resul)){
				$tmp = new Image();
				$tmp->charger($row->id);
				$tmp->supprimer();

			}

			$document = new Document();

			$query = "select * from $document->table where contenu=\"" . $this->id . "\" AND dossier=\"0\" AND produit=\"0\" AND rubrique=\"0\" ";
			$resul = mysql_query($query, $document->link);
			while($row = mysql_fetch_object($resul)){
				$tmp = new Document();
				$tmp->charger($row->id);
				$tmp->supprimer();

			}

			$contenudesc =  new Contenudesc();


			$this->delete("delete from $this->table where id=\"$this->id\"");
			$this->delete("delete from $contenudesc->table where contenu=\"$this->id\"");

			$queryclass="select * from $this->table where dossier=$this->dossier order by classement";
			$resclass = mysql_query($queryclass);

			if(mysql_num_rows($resclass) > 0){

				$i=1;
				while($rowclass = mysql_fetch_object($resclass)){
					$cont = new Contenu();
					$cont->charger($rowclass->id);
					$cont->classement = $i;
					$cont->maj();
					$i++;
				}
			}


			return 1;

		}


	}

?>