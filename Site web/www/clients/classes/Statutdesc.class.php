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

	// Classe Statudesc

	// id --> identifiant activite
	// desc --> nom de l'activit�

	class Statutdesc extends Baseobj{

		var $id;
		var $statut;
		var $lang;
		var $titre;
		var $chapo;
		var $description;

		const TABLE="statutdesc";
		var $table=self::TABLE;

		var $bddvars = array("id", "statut", "lang", "titre", "chapo", "description");

		function Statutdesc($statut = 0, $lang = 1){
			$this->Baseobj();

			if($statut > 0)
 			  $this->charger($statut, $lang);
		}

		function charger(){
			$statut = func_get_arg(0);
            $lang = (func_num_args() > 1) ? func_get_arg(1) : 1;
			return $this->getVars("select * from $this->table where statut=\"$statut\" and lang=\"$lang\"");

		}

	}

?>