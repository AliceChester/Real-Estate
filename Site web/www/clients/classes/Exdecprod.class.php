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

	// Classe Activite

	// id --> identifiant activite
	// desc --> nom de l'activit�

	class Exdecprod extends Baseobj{

		var $id;
		var $produit;
		var $declidisp;



		const TABLE="exdecprod";
		var $table=self::TABLE;

		var $bddvars = array("id", "produit", "declidisp");

		function Exdecprod($produit = 0, $declidisp = 0){
			$this->Baseobj();

			if($produit > 0 && $declidisp > 0)
 			  $this->charger($produit, $declidisp);
		}

		function charger(){
			$produit = func_get_arg(0);
			$declidisp = func_get_arg(1);

			return $this->getVars("select * from $this->table where produit=\"$produit\" and declidisp=\"$declidisp\"");

		}


	}


?>