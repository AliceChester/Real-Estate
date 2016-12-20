<?php
#####################################################################################################
#
#					Module pour la plateforme de paiement Systempay
#						Version : V1.0a
#									########################
#					D�velopp� pour Thelia
#						Version : 1.4.2.1
#									########################
#					Auteur Lyra Network
#						03/2010
#						Contact : supportvad@lyra-network.com
#
#####################################################################################################

## VADS_API french constants ##
define('MODULE_PAYMENT_VADS_MISSING_RESULT_TRANSLATION', "Traduction manquante pour le code de retour ");
define('MODULE_PAYMENT_VADS_MISSING_EXTRA_RESULT_TRANSLATION', "Traduction manquante pour le code de retour compl�mentaire ");

# warranty_result
define('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_GARANTI', 'Le paiement est garanti');
define('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_PAS_GARANTI', 'Le paiement n�est pas garanti');
define('MODULE_PAYMENT_VADS_REPONSE_INCIDENT_TECHNIQUE_PAIEMENT_PAS_GARANTI', 'Suite � une erreur technique, le paiement ne peut pas �tre garanti');

# result
define('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_REALISE_SUCCES', 'Paiement r�alis� avec succ�s');
define('MODULE_PAYMENT_VADS_REPONSE_COMMERCANT_CONTACTER_BANQUE_PORTEUR', 'Le commer�ant doit contacter la banque du porteur');
define('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_REFUSE', 'Paiement refus�');
define('MODULE_PAYMENT_VADS_REPONSE_ANNULATION_CLIENT', 'Annulation client');
define('MODULE_PAYMENT_VADS_REPONSE_ERREUR_FORMAT_REQUETE', 'Erreur de format de la requ�te');
define('MODULE_PAYMENT_VADS_REPONSE_ERREUR_TECHNIQUE_LORS_PAIEMENT', 'Erreur technique lors du paiement');

# extra_result
define('MODULE_PAYMENT_VADS_REPONSE_VERSION_MODE_PAIEMENT_BPL', "Version du module de paiement (normalement : 1.0a)");
define('MODULE_PAYMENT_VADS_REPONSE_ATTRIBUER_LORS_INSCIPTION_COMMERCANT', "Attribu� lors de l'inscription du commer�ant");
define('MODULE_PAYMENT_VADS_REPONSE_UNIQUE_POUR_SITE_POUR_1_JOURNEE', "Unique pour le site et pour la journ�e");
define('MODULE_PAYMENT_VADS_REPONSE_DATE_LOCALE_SITE', "Date locale du site");
define('MODULE_PAYMENT_VADS_REPONSE_SI_VALIDATION_MANUELLE_COMMERCANT', "Si validation manuelle du commer�ant");
define('MODULE_PAYMENT_VADS_REPONSE_DELAI_NB_JOUR_REMISE_BANQUE', "D�lais en jour avant remise en banque");
define('MODULE_PAYMENT_VADS_REPONSE_TYPE_PAIEMENT', "Type de paiement (en une ou plusieurs fois)");
define('MODULE_PAYMENT_VADS_REPONSE_LISTE_CARTES_DISPO', "Liste des types de cartes disponibles");
define('MODULE_PAYMENT_VADS_REPONSE_MONTANT_TRANSACTION', "Montant de la trasaction (en cents)");
define('MODULE_PAYMENT_VADS_REPONSE_MONNAIE_UTILISER_ISO', "Monnaie � utiliser selon norme ISO 4217");
define('MODULE_PAYMENT_VADS_REPONSE_MODE_PLATEFORME', "Mode de solicitation de la plateforme");
define("MODULE_PAYMENT_VADS_REPONSE_LANGUE_PAGE_PAIEMENT", "Langue de la page de paiement Norme ISO 639-1");
define('MODULE_PAYMENT_VADS_REPONSE_NUMERO_COMMANDE', "Num�ro de commande");
define('MODULE_PAYMENT_VADS_REPONSE_RESUME_COMMANDE', "R�sum� de la commande");
define('MODULE_PAYMENT_VADS_REPONSE_ADRESSE_EMAIL_CLIENT', "Adresse e-mail du client");
define('MODULE_PAYMENT_VADS_REPONSE_IDENTIFIANT_CLIENT_POUR_MARCHANT', "Identifiant client pour le marchand");
define('MODULE_PAYMENT_VADS_REPONSE_CIVILITE_CLIENT', "Civilit� du client");
define('MODULE_PAYMENT_VADS_REPONSE_NOM_CLIENT', "Nom du client");
define('MODULE_PAYMENT_VADS_REPONSE_ADRESSE_CLIENT', "Adresse du client");
define('MODULE_PAYMENT_VADS_REPONSE_CODE_POSTAL_CLIENT', "Code postal du client");
define('MODULE_PAYMENT_VADS_REPONSE_VILLE_CLIENT', "Ville du client");
define('MODULE_PAYMENT_VADS_REPONSE_PAYS_CLIENT_ISO', "Pays du client (Norme ISO 3166 )");
define('MODULE_PAYMENT_VADS_REPONSE_TELEPHONE_CLIENT', "T�l�phone du client");
define('MODULE_PAYMENT_VADS_REPONSE_ERREUR_INCONNUE_DANS_REQUETE', "Erreur inconnue dans la requ�te");
define('MODULE_PAYMENT_VADS_REPONSE_URL_SUCCESS',"Url de retour lorsque le paiement est r�ussi");
define('MODULE_PAYMENT_VADS_REPONSE_URL_REFUS',"Url de retour lorsque le paiement est refus�");
define('MODULE_PAYMENT_VADS_REPONSE_URL_REFUS_AUTORISATION',"Url de retour lorsque le paiement n'a pas �t� autoris�");
define('MODULE_PAYMENT_VADS_REPONSE_URL_ANNULATION',"Url de retour lorsque le client annule le paiement");
define('MODULE_PAYMENT_VADS_REPONSE_URL_DEFAUT',"Url de retour par d�faut");
define('MODULE_PAYMENT_VADS_REPONSE_URL_ERREUR',"Url de retour en cas d'erreur");

?>