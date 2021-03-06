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

	class Contenudesc extends Baseobj{

		var $id;
		var $contenu;
		var $titre;
		var $chapo;
		var $description;
		var $lang;
		var $postscriptum;

		const TABLE="contenudesc";
		var $table=self::TABLE;

		var $bddvars=array("id", "contenu", "titre", "chapo", "description", "lang", "postscriptum");

		function Contenudesc($contenu = 0, $lang = 1){
			$this->Baseobj();
			if($contenu > 0)
 			  $this->charger($contenu, $lang);
		}

		function charger(){
			$contenu = func_get_arg(0);
            $lang = (func_num_args() > 1) ? func_get_arg(1) : 1;
   			return $this->getVars("select * from $this->table where contenu=\"$contenu\" and lang=\"$lang\"");
		}

		function charger_id(){
		     $id = func_get_arg(0);
		     return $this->getVars("select * from $this->table where id=\"$id\"");
		 }

	}

?>