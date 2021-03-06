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

	class Promo extends Baseobj{

		var $id;
		var $code;
		var $type;
		var $valeur;
		var $mini;
		var $utilise;
		var $illimite;
		var $datefin;

		const TABLE="promo";
		var $table=self::TABLE;

		var $bddvars = array("id", "code", "type", "valeur", "mini", "utilise", "illimite", "datefin");

		function Promo(){
			$this->Baseobj();
		}

		function charger(){
			$code = func_get_arg(0);
			$datedj = date("Y-m-d H:i:s");
		 	return $this->getVars("select * from $this->table where code=\"$code\" and (datefin>'$datedj' or datefin='0000-00-00') and utilise='0'");

		}

		function charger_id($id){
			return $this->getVars("select * from $this->table where id=\"$id\"");
		}

	}

?>