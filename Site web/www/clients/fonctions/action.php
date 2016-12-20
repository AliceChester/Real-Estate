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

	// ajout panier
	function ajouter($ref, $quantite=1, $append=0, $nouveau=0){

		$testprod = new Produit();
		if(! $testprod->charger($ref))
			return 0;

		if($quantite =="" || $quantite <= 0)
			$quantite = 1;

		$perso = array();

		$i = 0;

		// v�rification si un produit avec la m�me d�clinaison est d�j� pr�sent
		foreach ($_REQUEST as $key => $valeur) {

			if(strstr($key, "declinaison")){
				$perso[$i] = new Perso();
				$perso[$i]->declinaison = substr($key, 11);
				$perso[$i]->valeur = stripslashes($valeur);
				$i++;

			}
		}

		$_SESSION['navig']->panier->ajouter($ref, $quantite, $perso, $append, $nouveau);

	}

	// changement de transport
	function transport($id){
		$transzone = new Transzone();

		$pays = new Pays();

        if($_SESSION['navig']->adresse != "" && $_SESSION['navig']->adresse != "0"){
            $adr = new Adresse();
            $adr->charger($_SESSION['navig']->adresse);
            $pays->charger($adr->pays);
        }

        else
             $pays->charger($_SESSION['navig']->client->pays);

		if( ! $transzone->charger($id, $pays->zone)) return;

		$_SESSION['navig']->commande->transport = $id;

	}

	// on fixe le code promo
	function codepromo($code){
		modules_fonction("avantpromo",$code);

		$promo = new Promo();
		$promo->charger($code);
		$_SESSION['navig']->promo = $promo;

		modules_fonction("aprespromo");
	}

	function calc_remise($total){
			$remise = 0;

			if($_SESSION['navig']->promo->id != ""){
				if($_SESSION['navig']->promo->type == "1" && $_SESSION['navig']->promo->mini <= $total) $remise = $_SESSION['navig']->promo->valeur;
				else if($_SESSION['navig']->promo->type == "2" && $_SESSION['navig']->promo->mini <= $total) $remise += $total * $_SESSION['navig']->promo->valeur / 100;
				
				if($remise > $total) $remise = $total;

				modules_fonction("calc_remise", $remise, $total);

				return $remise;
			}

	}

	// suppression d'un article du panier
	function supprimer($article){
			$_SESSION['navig']->panier->supprimer($article);
	}

	// modification de la quantit� d'un article
	function modifier($article, $quantite){
		if($quantite != "" && $quantite>=0)
			$_SESSION['navig']->panier->modifier($article, $quantite);

	}

	// connexion du client
	function connexion($email,$motdepasse){

		$client = New Client();
		$rec = $client->charger($email, $motdepasse);

		if($rec) {
			$_SESSION['navig']->client = $client;
			$_SESSION['navig']->connecte = 1;
			modules_fonction("apresconnexion", $client);

			if($_SESSION['navig']->urlpageret) redirige($_SESSION['navig']->urlpageret);
				else redirige("index.php");
		}

		else redirige("connexion.php?errconnex=1");

	}

	// d�connexion du client
	function deconnexion(){

		$_SESSION['navig']->client= new Client();
		$_SESSION['navig']->connecte = 0;
		$_SESSION['navig']->adresse = 0;
		$_SESSION['navig']->urlpageret = str_replace("action=deconnexion","",$_SESSION['navig']->urlpageret);
	}

	// modification de l'adresse en cours
	function modadresse($adresse){
		if ($adresse == 0) { $_SESSION['navig']->adresse=0; return; }
		$verif = new Adresse();
		$verif->charger($adresse);
		if($verif->client == $_SESSION['navig']->client->id)
			$_SESSION['navig']->adresse=$adresse;
	}

	// proc�dure de paiement
	function paiement($type_paiement){

		if(! $_SESSION['navig']->client->id || $_SESSION['navig']->panier->nbart < 1){
			header("Location: index.php");
			exit;
		}

		$total = 0;
		$nbart = 0;
		$poids = 0;
		$unitetr = 0;

		modules_fonction("avantcommande");

		$modules = new Modules();
		$modules->charger_id($type_paiement);
		if(! $modules->actif)
			return 0;

		$nomclass=$modules->nom;
		$nomclass[0] = strtoupper($nomclass[0]);

		include_once("client/plugins/" . $modules->nom . "/" . $nomclass . ".class.php");
		$modpaiement = new $nomclass();

		$commande = new Commande();
		$commande->transport = $_SESSION['navig']->commande->transport;
		$commande->client = $_SESSION['navig']->client->id;
		$commande->date = date("Y-m-d H:i:s");
		$commande->ref = "C" . date("ymdHis") . strtoupper(ereg_caracspec(substr($_SESSION['navig']->client->prenom,0, 3)));
		$commande->livraison = "L" . date("ymdHis") . strtoupper(ereg_caracspec(substr($_SESSION['navig']->client->prenom,0, 3)));
		$commande->remise = 0;

		$devise = new Devise();
		$devise->charger_nom($_SESSION['navig']->devise);
		$commande->devise = $devise->id;
		$commande->taux = $devise->taux;

		$client = New Client();
		$client->charger_id($_SESSION['navig']->client->id);

		$adr = new Venteadr();
		$adr->raison = $client->raison;
		$adr->entreprise = $client->entreprise;
		$adr->nom = $client->nom;
		$adr->prenom = $client->prenom;
		$adr->adresse1 = $client->adresse1;
		$adr->adresse2 = $client->adresse2;
		$adr->adresse3 = $client->adresse3;
		$adr->cpostal = $client->cpostal;
		$adr->ville = $client->ville;
		$adr->tel = $client->telfixe . "  " . $client->telport;
		$adr->pays = $client->pays;
		$adrcli = $adr->add();
		$commande->adrfact = $adrcli;

		$adr = new Venteadr();
		$livraison = new Adresse();

		if($livraison->charger($_SESSION['navig']->adresse)){

			$adr->raison = $livraison->raison;
			$adr->entreprise = $livraison->entreprise;
			$adr->nom = $livraison->nom;
			$adr->prenom = $livraison->prenom;
			$adr->adresse1 = $livraison->adresse1;
			$adr->adresse2 = $livraison->adresse2;
			$adr->adresse3 = $livraison->adresse3;
			$adr->cpostal = $livraison->cpostal;
			$adr->ville = $livraison->ville;
			$adr->tel = $livraison->tel;
			$adr->pays = $livraison->pays;

		}
		else {
			$adr->raison = $client->raison;
			$adr->entreprise = $client->entreprise;
			$adr->nom = $client->nom;
			$adr->prenom = $client->prenom;
			$adr->adresse1 = $client->adresse1;
			$adr->adresse2 = $client->adresse2;
			$adr->adresse3 = $client->adresse3;
			$adr->cpostal = $client->cpostal;
			$adr->ville = $client->ville;
			$adr->tel = $client->telfixe . "  " . $client->telport;
			$adr->pays = $client->pays;
		}

		$adrlivr = $adr->add();
		$commande->adrlivr = $adrlivr;

		$commande->facture = 0;

		$commande->statut="1";
		$commande->paiement = $type_paiement;

		$commande->lang = $_SESSION['navig']->lang;

		$commande->id = $commande->add();

		$pays = new Pays();
		$pays->charger($adr->pays);

		$venteprod = new Venteprod();

		for($i=0; $i<$_SESSION['navig']->panier->nbart; $i++){

			$declidisp = new Declidisp();
			$declidispdesc = new Declidispdesc();
			$declinaison = new Declinaison();
			$declinaisondesc = new Declinaisondesc();

			$dectexte = "\n";

			$produit = new Produit();


			$stock = new Stock();



			for($compt = 0; $compt<count($_SESSION['navig']->panier->tabarticle[$i]->perso); $compt++){

				if(is_numeric($_SESSION['navig']->panier->tabarticle[$i]->perso[$compt]->valeur) && $modpaiement->defalqcmd){

					// diminution des stocks de d�clinaison si on est sur un module de paiement qui d�falque de suite
					$stock->charger($_SESSION['navig']->panier->tabarticle[$i]->perso[$compt]->valeur, $_SESSION['navig']->panier->tabarticle[$i]->produit->id);
                	$stock->valeur-=$_SESSION['navig']->panier->tabarticle[$i]->quantite;
                	$stock->maj();
				}

		   		$tperso = $_SESSION['navig']->panier->tabarticle[$i]->perso[$compt];
				$declinaison->charger($tperso->declinaison);
				$declinaisondesc->charger($declinaison->id);
				// recup valeur declidisp ou string
				if($declinaison->isDeclidisp($tperso->declinaison)){
					$declidisp->charger($tperso->valeur);
					$declidispdesc->charger_declidisp($declidisp->id);
					$dectexte .= "- " . $declinaisondesc->titre . " : " . $declidispdesc->titre . "\n";
				}

				else $dectexte .= "- " . $declinaisondesc->titre . " : " . $tperso->valeur . "\n";

			}


			// diminution des stocks classiques si on est sur un module de paiement qui d�falque de suite

			$produit = new Produit();
			$produit->charger($_SESSION['navig']->panier->tabarticle[$i]->produit->ref);

			if($modpaiement->defalqcmd){
				$produit->stock-=$_SESSION['navig']->panier->tabarticle[$i]->quantite;
				$produit->maj();
			}

			/* Gestion TVA */
			$prix = $_SESSION['navig']->panier->tabarticle[$i]->produit->prix;
			$prix2 = $_SESSION['navig']->panier->tabarticle[$i]->produit->prix2;
			$tva = $_SESSION['navig']->panier->tabarticle[$i]->produit->tva;

			if($pays->tva != "" && (! $pays->tva || ($pays->tva && $_SESSION['navig']->client->intracom != ""))) {
				$prix = round($prix/(1+($tva/100)), 2);
				$prix2 = round($prix2/(1+($tva/100)), 2);
				$tva = 0;
			}

			$venteprod->quantite =  $_SESSION['navig']->panier->tabarticle[$i]->quantite;
			if( ! $_SESSION['navig']->panier->tabarticle[$i]->produit->promo)
				$venteprod->prixu =  $prix;
			else $venteprod->prixu =  $prix2;
			$venteprod->ref = $_SESSION['navig']->panier->tabarticle[$i]->produit->ref;
			$venteprod->titre = $_SESSION['navig']->panier->tabarticle[$i]->produitdesc->titre . " " . $dectexte;
			$venteprod->chapo = $_SESSION['navig']->panier->tabarticle[$i]->produitdesc->chapo;
			$venteprod->description = $_SESSION['navig']->panier->tabarticle[$i]->produitdesc->description;
		 	$venteprod->tva =  $tva;

			$venteprod->commande = $commande->id;
		 	$idvprod = $venteprod->add();

			// ajout dans ventedeclisp des declidisp associ�es au venteprod
			for($compt = 0; $compt<count($_SESSION['navig']->panier->tabarticle[$i]->perso); $compt++){
				$tperso = $_SESSION['navig']->panier->tabarticle[$i]->perso[$compt];
				$declinaison->charger($tperso->declinaison);

				// si declidisp (pas un champs libre)
				if($declinaison->isDeclidisp($tperso->declinaison)){
					$vdec = new Ventedeclidisp();
					$vdec->venteprod = $idvprod;
					$vdec->declidisp = $tperso->valeur;
					$vdec->add();
				}
			}


		 	$total += $venteprod->prixu * $venteprod->quantite;
		 	$nbart++;
		 	$poids+= $_SESSION['navig']->panier->tabarticle[$i]->produit->poids;

		}


			$pays = new Pays();
			$pays->charger($_SESSION['navig']->client->pays);

		 	if($_SESSION['navig']->client->pourcentage>0) $commande->remise = $total * $_SESSION['navig']->client->pourcentage / 100;

			$total -= $commande->remise;

		if($_SESSION['navig']->promo->id != ""){

			$commande->remise += calc_remise($total);

			$_SESSION['navig']->promo->utilise = 1;
            if(!empty($commande->remise))
                $commande->remise = round($commande->remise, 2);
			$commande->maj();
			$temppromo = new Promo();
			$temppromo->charger_id($_SESSION['navig']->promo->id);
			if(! $temppromo->illimite)
				$temppromo->utilise="1";
			$temppromo->maj();

			$promoutil = new Promoutil();
			$promoutil->commande = $commande->id;
			$promoutil->promo = $temppromo->id;
			$promoutil->add();
		}
		
		if($commande->remise > $total) $commande->remise = $total;

		$commande->port = port();
		if($commande->port == "" || $commande->port<0) $commande->port = 0;

		$_SESSION['navig']->promo = new Promo();
		$_SESSION['navig']->commande = $commande;

		$commande->transaction = $commande->id;		
        $zero = 6 - strlen($commande->transaction);
        for($i = 0; $i < $zero; $i++)
                $commande->transaction = "0" . $commande->transaction;

		$commande->maj();

	    $total = $_SESSION['navig']->panier->total(1,$_SESSION['navig']->commande->remise) + $_SESSION['navig']->commande->port;

		if($total<$_SESSION['navig']->commande->port)
			$total = $_SESSION['navig']->commande->port;


		$_SESSION['navig']->commande->total = $total;

		modules_fonction("aprescommande", $commande);

 		modules_fonction("mail", $commande, $modules->nom);

		$modpaiement->paiement($commande);

	}

	// cr�ation d'un compte
	function creercompte($raison, $entreprise, $siret, $intracom, $prenom, $nom, $adresse1, $adresse2, $adresse3, $cpostal, $ville, $pays, $telfixe, $telport, $email1, $email2, $motdepasse1, $motdepasse2, $parrain){

		global $obligetelfixe, $obligetelport;

		$client = New Client();
		$client->raison = strip_tags($raison);
		$client->nom = strip_tags($nom);
		$client->entreprise = strip_tags($entreprise);
		$client->ref = date("ymdHis") . strtoupper(ereg_caracspec(substr(strip_tags($prenom),0, 3)));
		$client->prenom = strip_tags($prenom);
		$client->telfixe = strip_tags($telfixe);
		$client->telport =strip_tags($telport);
		if( preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z.]+$/","$email1")
			&& $email1==$email2) $client->email = strip_tags($email1);
		$client->adresse1 = strip_tags($adresse1);
		$client->adresse2 = strip_tags($adresse2);
		$client->adresse3 = strip_tags($adresse3);
		$client->cpostal = strip_tags($cpostal);
		$client->ville = strip_tags($ville);
		$client->siret = strip_tags($siret);
		$client->intracom = strip_tags($intracom);
		$client->pays = strip_tags($pays);
		$client->type = "0";
		$client->lang = $_SESSION['navig']->lang;

		$testcli = new Client();
		if($parrain != "")
			if($testcli->charger_mail($parrain)) $parrain=$testcli->id;
			else $parrain=-1;
		else $parrain=0;

		if($testcli->id != "") $client->parrain=$testcli->id;

		if($motdepasse1 == $motdepasse2 && strlen($motdepasse1)>3 ) $client->motdepasse = strip_tags($motdepasse1);

		$_SESSION['navig']->formcli = $client;

		$obligeok = 1;

		if($obligetelfixe && $client->telfixe=="") $obligeok=0;
		if($obligetelport && $client->telport=="") $obligeok=0;

		modules_fonction("avantclient");

		if($client->raison!="" && $client->prenom!="" && $client->nom!="" && $client->email!="" && $client->motdepasse!=""
			&& $client->email && ! $client->existe($email1) && $client->adresse1 !="" && $client->cpostal!="" && $client->ville !="" && $client->pays !="" && $obligeok){
			$_SESSION['navig']->client = $client;

			$client->crypter();

			$client->id = $client->add();

       		$rec = $client->charger_mail($client->email);

            if($rec) {
                 $_SESSION['navig']->client = $client;
                 $_SESSION['navig']->connecte = 1;
	        }

			modules_fonction("apresclient", $client);

			redirige("nouveau.php");
		}

		else {

				redirige("formulerr.php?errform=1");
		}
	}

	// modification de compte
	function modifiercompte($raison, $entreprise, $siret, $intracom, $prenom, $nom, $adresse1, $adresse2, $adresse3, $cpostal, $ville, $pays, $telfixe, $telport, $email1, $email2, $motdepasse1, $motdepasse2){

		global $obligetelfixe, $obligetelport;

		$client = New Client();

		$client->charger_id($_SESSION['navig']->client->id);
		if( $motdepasse1 == "" ){
			$client->id = $_SESSION['navig']->client->id;
			$client->raison = strip_tags($raison);
			$client->siret = strip_tags($siret);
			$client->intracom = strip_tags($intracom);
			$client->entreprise = strip_tags($entreprise);
			$client->nom = strip_tags($nom);
			$client->prenom = strip_tags($prenom);
			$client->telfixe = strip_tags($telfixe);
			$client->telport =strip_tags($telport);

			if($email1 != $client->email){
				$test = new Client();
				if($test->existe($email1))
                    redirige("compte_modifiererr.php?errform=1");
			}

            if( preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z.]+$/","$email1")
                    && $email1==$email2 && $email1 != "") $client->email = strip_tags($email1);
            else
                    $client->email = "";

			$client->adresse1 = strip_tags($adresse1);
			$client->adresse2 = strip_tags($adresse2);
			$client->adresse3 = strip_tags($adresse3);
			$client->cpostal = strip_tags($cpostal);
			$client->ville = strip_tags($ville);
			$client->pays = strip_tags($pays);
			$client->motdepasse = $_SESSION['navig']->client->motdepasse;

			$_SESSION['navig']->formcli = $client;

		$obligeok = 1;

		if($obligetelfixe && $client->telfixe=="") $obligeok=0;
		if($obligetelport && $client->telport=="") $obligeok=0;

			modules_fonction("avantmodifcompte");

			if($client->raison!="" && $client->prenom!="" && $client->nom!="" && $client->email!=""
			&& $client->email && $client->adresse1 !="" && $client->cpostal!="" && $client->ville !="" && $client->pays !="" && $obligeok){
				$client->maj();
		 		$_SESSION['navig']->client = $client;
				modules_fonction("apresmodifcompte", $client);

		 	redirige($_SESSION['navig']->urlpageret);

			}

				else redirige("compte_modifiererr.php?errform=1");

			}


		else{

			if(  $motdepasse1 == $motdepasse2 && strlen($motdepasse1)>3 ) {
				$client->motdepasse = strip_tags($motdepasse1);
				$client->crypter();
		    	$client->maj();

				$_SESSION['navig']->client = $client;
				modules_fonction("apresmodifcompte", $client);

				redirige($_SESSION['navig']->urlpageret);
			}
			else  {
				$_SESSION['navig']->formcli->motdepasse = "";
				redirige("compte_modifiererr.php?errform=1");
			}


	   }





	}

	// cr�ation d'une adresse de livraison
	function creerlivraison($id, $libelle, $raison, $entreprise, $prenom, $nom, $adresse1, $adresse2, $adresse3, $cpostal, $ville, $tel, $pays){

		if($libelle != "" && $raison != "" && $prenom != "" && $nom != "" && $adresse1 != ""
			 && $cpostal != "" && $ville != "" && $pays != ""){

			$adresse = new Adresse();
			$adresse->libelle = strip_tags($libelle);
			$adresse->raison = strip_tags($raison);
			$adresse->entreprise = strip_tags($entreprise);
			$adresse->prenom = strip_tags($prenom);
			$adresse->nom = strip_tags($nom);
			$adresse->adresse1 = strip_tags($adresse1);
			$adresse->adresse2 = strip_tags($adresse2);
			$adresse->adresse3 = strip_tags($adresse3);
			$adresse->cpostal = strip_tags($cpostal);
			$adresse->ville = strip_tags($ville);
			$adresse->tel = strip_tags($tel);
			$adresse->pays = strip_tags($pays);
			$adresse->client = $_SESSION['navig']->client->id;
			$adresse->id = $adresse->add();

			$_SESSION['navig']->adresse=$adresse->id;

			modules_fonction("apres_creerlivraison", $adresse);

			redirige($_SESSION['navig']->urlpageret);

		}
	}


	// suppression d'une adresse de livraison
    function supprimerlivraison($id){

         $adresse = new Adresse();
         $adresse->charger($id);

		 if($adresse->client != $_SESSION['navig']->client->id) return;

         $adresse->delete();

		 if($_SESSION['navig']->adresse == $id)
			$_SESSION['navig']->adresse = 0;

    }

	// modification d'une adresse de livraison
	function modifierlivraison($id, $libelle, $raison, $entreprise, $prenom, $nom, $adresse1, $adresse2, $adresse3, $cpostal, $ville, $tel, $pays){


		$adresse = new Adresse();
		$adresse->charger($id);

		if($adresse->client != $_SESSION['navig']->client->id) return;

		if($libelle != "" && $raison != "" && $prenom != "" && $nom != "" && $adresse1 != ""
			 && $cpostal != "" && $ville != "" && $pays != ""){

			$adresse->id = $id;
			$adresse->libelle = strip_tags($libelle);
			$adresse->raison = strip_tags($raison);
			$adresse->entreprise = strip_tags($entreprise);
			$adresse->prenom = strip_tags($prenom);
			$adresse->nom = strip_tags($nom);
			$adresse->adresse1 = strip_tags($adresse1);
			$adresse->adresse2 = strip_tags($adresse2);
			$adresse->adresse3 = strip_tags($adresse3);
			$adresse->cpostal = strip_tags($cpostal);
			$adresse->ville = strip_tags($ville);
			$adresse->tel = strip_tags($tel);
			$adresse->pays = strip_tags($pays);
			$adresse->maj();

			modules_fonction("apres_modifierlivraison", $adresse);
		}
		redirige($_SESSION['navig']->urlpageret);
	}

	// changement du mot de passe
		function chmdp($email){
			$msg = new Message();
			$msgdesc = new Messagedesc();

			$tclient  = new Client();
			if( $tclient->charger_mail($email)){
				$pass = genpass(8);
				$tclient->motdepasse = $pass;
				$tclient->crypter();
				$tclient->maj();

				$msg->charger("changepass");
				$msgdesc->charger($msg->id);

				$sujet = $msgdesc->titre;

				$emailcontact = new Variable();
	            $emailcontact->charger("emailcontact");

				$nomsite = new Variable();
				$nomsite->charger("nomsite");

				$urlsite = new Variable();
				$urlsite->charger("urlsite");

	            $corps = $msgdesc->description;
	  			$corpstext = $msgdesc->descriptiontext;

				$corps = str_replace("__NOMSITE__",$nomsite->valeur,$corps);
				$corps = str_replace("__MOTDEPASSE__",$pass,$corps);
				$corps = str_replace("__URLSITE__",$urlsite->valeur,$corps);

				$corpstext = str_replace("__MOTDEPASSE__",$pass,$corpstext);

				$mail = new Mail();
				if($smtp->active){
					$mail->IsSMTP();
					$mail->Host = $smtp->serveur;
					$mail->Port = ($smtp->port!="")?$smtp->port:25;
					if($smtp->username != ""){
						$mail->SMTPAuth = true;
						$mail->Username = $smtp->username;
						$mail->Password = $smtp->password;

						$mail->SMTPSecure = ($smtp->secure != "")?$smtp->secure:"";
					}
				}
				else{
					$mail->IsMail();
				}
				$mail->IsMail();
				$mail->From = $emailcontact->valeur;
				$mail->FromName = $nomsite->valeur;
				$mail->Subject = $sujet;
				$mail->MsgHTML($corps);
				$mail->AltBody = $corpstext;
				$mail->AddAddress($tclient->email,$tclient->prenom . " " . $tclient->nom);
				$mail->send();

			}
			else{
				redirige("mdperreur.php");
			}

		}
?>
