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
	include_once("classes/Adresse.class.php");
	
	/* Substitutions de type adresse */
		
	function substitadresse($texte){
		global $adresse;
		
		$tadresse = new Adresse();
	
		$query = "select * from $tadresse->table where id='$adresse'";
		$resul = mysql_query($query, $tadresse->link);
		$row = mysql_fetch_object($resul);
		
		if($row )
			$texte = str_replace("#ADRESSE_ID", "$row->id", $texte);
		$texte = str_replace("#ADRESSE_ACTIVE", "" . $_SESSION['navig']->adresse . "", $texte);
		
		return $texte;
	}
	
?>