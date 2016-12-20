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

	class Transzone extends Baseobj{

		var $id;
		var $transport;
		var $zone;

		const TABLE="transzone";
		var $table=self::TABLE;

		var $bddvars = array("id", "transport", "zone");

		function Transzone($id = 0){
			$this->Baseobj();

			if($id > 0)
 			  $this->charger_id($id);
		}

	    function charger_id(){
			$id = func_get_arg(0);

	    	return $this->getVars("select * from $this->table where id=\"$id\"");
        }

		function charger($transport, $zone){
			return $this->getVars("select * from $this->table where transport=\"$transport\" and zone=\"$zone\"");
		}


	}

?>