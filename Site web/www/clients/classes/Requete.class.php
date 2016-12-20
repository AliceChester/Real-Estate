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

	include_once(realpath(dirname(__FILE__)) . "/Cnx.class.php");

	// Classe Request

	// table --> table à requêter

	class Requete extends Cnx{

		var $table = "";

		function Requete(){
			$this->Cnx();
		}

		function charger(){
			$varid = $this->bddvars[0];
			return $this->getVars("select * from `$this->table` where `$varid`=\"" . $this->$varid . "\"");

		}

		function add(){

			$query = "insert into `$this->table` (" . $this->getListVarsSql() . ") values(" . $this->getListValsSql() . ")";
			$resul = $this->query($query);
			CacheBase::getCache()->reset_cache();
			return mysql_insert_id();

		}


		function delete(){
			$varid = $this->bddvars[0];
			$query = "delete from `$this->table` where `$varid`=\"" . $this->$varid . "\"";
			if($this->$varid != ""){
				$resul = $this->query($query);
				CacheBase::getCache()->reset_cache();
			}
		}

		function maj(){
			$listv = "";

			$varid = $this->bddvars[0];

			foreach($this->bddvars as $var){
				$val = $this->$var;

				if(get_magic_quotes_gpc())
					$val = stripslashes($val);

				$val = mysql_real_escape_string($val, $this->link);

				$listv.= '`'.$var . "`=\"" . $val . "\",";
			}

			$query = "update `$this->table` set " . rtrim($listv, ',') . " where `$varid`=\"" . $this->$varid . "\"";

			if($this->$varid != "") {
				$resul = $this->query($query);

				CacheBase::getCache()->reset_cache();
			}

			return $query;
		}

		function purge(){
			$query = "truncate table `$this->table` ";
			$resul = $this->query($query);
		}
	}

?>