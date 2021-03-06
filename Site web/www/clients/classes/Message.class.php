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
	include_once(realpath(dirname(__FILE__)) . "/Messagedesc.class.php");

	class Message extends Baseobj{

		var $id;
		var $nom;
		var $protege;

		const TABLE="message";
		var $table=self::TABLE;

		var $bddvars = array("id", "nom", "protege");

		function Message($nom = ""){
			$this->Baseobj();

			if($nom != "")
 			  $this->charger($nom);
		}

		function charger(){
			$nom = func_get_arg(0);
			return $this->getVars("select * from $this->table where nom=\"$nom\"");
		}

		function delete($requete){
				$resul = mysql_query($requete);
		}

		function supprimer(){
            if($this->id == "")
                    return 0;

			$messagedesc =  new Messagedesc();

			$this->delete("delete from $this->table where id=\"$this->id\"");
			$this->delete("delete from $messagedesc->table where message=\"$this->id\"");

			return 1;

		}


	}

?>