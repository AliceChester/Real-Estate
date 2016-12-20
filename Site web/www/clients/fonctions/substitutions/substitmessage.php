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
	include_once("classes/Message.class.php");
	include_once("classes/Messagedesc.class.php");
	
	/* Substitutions de type message */
		
	function substitmessage($texte){


	    preg_match_all("`\#MESSAGE_([^\(]+)\(([^\)]+)\)`", $texte, $cut);

	    $tab1 = "";
	    $tab2 = "";

	    for($i=0; $i<count($cut[1]); $i++){
			$message = new Message();
			$message->charger($cut[2][$i]);
			$messagedesc = new Messagedesc();
			$messagedesc->charger($message->id, $_SESSION['navig']->lang);

			if($cut[1][$i] == "TITRE") {
				$tab1[$i] = "#MESSAGE_" . $cut[1][$i] . "(" . $cut[2][$i] . ")";
		        $tab2[$i] = $messagedesc->titre;			
			}
	
			else if($cut[1][$i] == "CHAPO") {
				$tab1[$i] = "#MESSAGE_" . $cut[1][$i] . "(" . $cut[2][$i] . ")";
		        $tab2[$i] = $messagedesc->chapo;			
			}
			
			else if($cut[1][$i] == "DESCRIPTION") {
				$tab1[$i] = "#MESSAGE_" . $cut[1][$i] . "(" . $cut[2][$i] . ")";
		        $tab2[$i] = $messagedesc->description;			
			}

	    }

	    $texte = str_replace($tab1, $tab2, $texte);
	    return $texte;
	

	}
?>