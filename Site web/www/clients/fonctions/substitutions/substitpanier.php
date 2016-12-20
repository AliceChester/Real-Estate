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
	
	/* Substitutionss de type panier */
		
	function substitpanier($texte){

		$total = 0;
        $totalht = 0;
        $totaleco = 0;
        $totaltaxe = 0;

		$nb_article = 0;

		if($_SESSION['navig']->adresse){
			$adr = new Adresse();
			$adr->charger($_SESSION['navig']->adresse);
			$idpays = $adr->pays;
		} else {
			$idpays = $_SESSION['navig']->client->pays;
		}

		$pays = new Pays();
		$pays->charger($idpays);
	
	
		$total = $_SESSION['navig']->panier->total();
		$totalht = $_SESSION['navig']->panier->total(0);
		$totaleco = $_SESSION['navig']->panier->totalecotaxe();
		$tva = $total - $totalht;
		$nb_article = $_SESSION['navig']->panier->nbart();
		

		$port = port();
		if($port<0)
			$port = 0;		
		
		$totcmdport = $total + $port;
			
		$remise=0;
		
	 	if($_SESSION['navig']->client->pourcentage>0) $remise = $total * $_SESSION['navig']->client->pourcentage / 100;
		
		$remise += calc_remise($total);
		
        $totcmdport -= $remise;
		$totremise = $total-$remise;

	    if($totcmdport<$port)
		    $totcmdport = $port;
		
        $totcmdportht = $totalht+$port;
		
		
		$totalht = number_format($totalht, 2, ".", "");
		$total = number_format($total, 2, ".", "");
		$totaleco = number_format($totaleco, 2, ".", "");
		$totaltaxe = number_format($totaltaxe, 2, ".", "");
		$port = number_format($port, 2, ".", "");
		$totcmdport = number_format($totcmdport, 2, ".", "");
		$remise = number_format($remise, 2, ".", "");
		$totremise = number_format($totremise,2,".","");
        $totcmdportht = number_format($totcmdportht, 2, ".", "");
		$tva = number_format($tva,2,".","");
		
		$totpoids = $_SESSION['navig']->panier->poids();
		
		$texte = str_replace("#PANIER_TOTALHT", "$totalht", $texte);
		$texte = str_replace("#PANIER_TOTALECO","$totaleco",$texte);
		$texte = str_replace("#PANIER_TOTALTVA","$tva",$texte); // total TVA du panier = #PANIER_TVA
		$texte = str_replace("#PANIER_TOTAL", "$total", $texte);
		$texte = str_replace("#PANIER_PORT", "$port", $texte);
        $texte = str_replace("#PANIER_TOTPORTHT", "$totcmdportht", $texte);
		$texte = str_replace("#PANIER_TOTPORT", "$totcmdport", $texte);
		$texte = str_replace("#PANIER_TOTREMISE","$totremise",$texte);
		$texte = str_replace("#PANIER_REMISE", "$remise", $texte);
		$texte = str_replace("#PANIER_NBART", "" . $nb_article . "", $texte);
		$texte = str_replace("#PANIER_POIDS", "$totpoids", $texte);
		$texte = str_replace("#PANIER_TVA","$tva",$texte); // total TVA du panier
		
		return $texte;
	
	}
?>