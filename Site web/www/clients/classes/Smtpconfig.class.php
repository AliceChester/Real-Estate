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


class Smtpconfig extends Baseobj{
	
	var $id;
	var $serveur;
	var $port;
	var $username;
	var $password;
	var $secure;
	var $active;
	
	var $table = "smtpconfig";
	var $bddvars = array("id","serveur","port","username","password","secure","active");
	
	function Smtpconfig(){
		$this->Baseobj();
		if(func_num_args() > 0){
		  $this->charger(func_get_arg(0));
		}
	}
	
	function charger(){
		$id = func_get_arg(0);
		return $this->getVars("select * from $this->table where id=$id");
	}	
}
?>