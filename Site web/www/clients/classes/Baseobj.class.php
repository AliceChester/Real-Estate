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
	include_once(realpath(dirname(__FILE__)) . "/Requete.class.php");
	include_once(realpath(dirname(__FILE__)) . "/CacheBase.class.php");

	// Classe Baseobj

	class Baseobj extends Requete{

		var $bddvars = array();

		function Baseobj(){
			$this->Requete();
		}

		function getListVarsSql(){
			$listvars="";

			foreach($this->bddvars as $var) {
				$listvars .= '`'.$var. "`,";
			}

			return rtrim($listvars, ',');
		}


		function getListValsSql(){
			$listvals="";

			foreach($this->bddvars as $var){
				$tempvar = $this->$var;

				 if(get_magic_quotes_gpc())
			  		$tempvar = stripslashes($tempvar);

				$tempvar = mysql_real_escape_string($tempvar, $this->link);

				$listvals .= "\"" . $tempvar . "\",";
			}

			return rtrim($listvals, ',');
		}

        function getVars($query){
         	$row=CacheBase::getCache()->get($query);
            if ($row==FALSE)
            {
            	if(! $resul = $this->query($query))
                {
                 	CacheBase::getCache()->set($query,"-");
                	return 0;
                }
                 $row = mysql_fetch_object($resul);
                 if($row=="")
                   $row="-";
                   CacheBase::getCache()->set($query,$row);
            }

            if($row && $row!="-")
            {
                foreach($this->bddvars as $var)
                {
                    $this->$var = $row->$var;
                }

                return 1;
            }
            else
            {
                return 0;
            }

            // return mysql_num_rows($resul);
        }

		function serialise_js(){

			$this->link="";

 			$json = new Services_JSON();
			return $json->encode($this);
		}

	}
?>