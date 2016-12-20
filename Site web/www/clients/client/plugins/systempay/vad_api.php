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

/**
 * Classe impl�mentant la g�n�ration de formulaire et la v�rification de signature
 *
 */
class VADS_API
{
	//TODO il manque certains param�tres facultatifs (user_info, order_info2/3, theme_config...)
	
	/* ********* *
	 * ATTRIBUTS *
	 * ********* */
	/* PARAMETRES D'ENVOI OBLIGATOIRES */
	var $version='V1';		// Version de la plateforme de paiement
	var $currency='978';	// Monnaie � utiliser selon norme ISO 4217 (http://www.iso.org/iso/support/currency_codes_list-1.htm)
	var $payment_cards='';	// Liste des types de cartes pouvant �tre utilis�es pour le paiement
							// vide = tout type accept�, sinon une combinaison des codes suivants s�par�s par ";" : AMEX;CB;MASTERCARD;VISA

	var $amount; 			// Montant de la trasaction (en cents)
	var $capture_delay; 	// D�lais en jour avant remis en banque (si vide, param�tre par d�faut d�fini dans le back office)
	var $ctx_mode;			// Mode de solicitation de la plateforme (TEST ou PRODUCTION)
	
	var $payment_config; 	// Type de paiement (SINGLE ou MULTI)
							/*Exemple pour un paiement de 10000 cents (100 euros) :
							 payment_config=SINGLE (en une fois)
							 ou
							 payment_config=MULTI:first=5000;count=3;period=30 (en plusieurs fois)
							 (Premier paiement de 5000 cents aujourd'hui + "capture_delay"
							 Deuxi�me paiement de 2500 cents � aujourd'hui + "capture_delay"+ 30 jours
							 Troisi�me paiement de 2500 cents � aujourd'hui + "capture_delay" + 60 jours)*/
	var $signature;			// Utilis�e pour authentifier les �changes avec la plateforme (cf. calculSignature() )
	var $site_id;			// Disponible dans le back office de la plateforme de paiement
	var $trans_date;		// Date locale du site (format : AAAAMMJJHHMMSS)
	var $trans_id;			// Constitu� de 6 caract�res num�riques, unique pour le site et pour la journ�e enti�re (cf. function calculTransId() )
	var $validation_mode;	// Si validation manuelle du commer�ant. Par d�faut param�tre d�fini dans le backoffice

	var $platform_url;	// Url de la plateforme de paiement

	var $key_test;			// Cl� fournie par la plateforme servant � calculer la signature
	var $key_prod;			// idem en mode production

	/* PARAMETRES D'ENVOI FACULTATIFS */
	var $cust_id;			// Identifiant client pour le marchand
	var $cust_name;			// Nom du client
	var $cust_title;		// Civilit� du client
	var $cust_email;		// Adresse e-mail du client (envoi d'un mail r�capitulatif de la transaction)
	var $cust_address;		// Adresse du client
	var $cust_zip;			// Code postal du client
	var $cust_city;			// Ville du client
	var $cust_phone;		// Num�ro de t�l�phone du client
	var $cust_country;		// Pays du client (Norme ISO 3166 http://www.iso.org/iso/fr/country_codes/iso_3166_code_lists/english_country_names_and_code_elements.htm)
	var $language;			// Langue de la page de paiement Norme ISO 639-1 (par d�faut le fran�ais est s�lectionn�)
							//valeurs possibles : fr (d�faut), de, en, zh, es, fr, it, ja
	var $order_id;			// Num�ro de commande (rappel� dans l'e-mail de confirmation du client), 32 caract�res alpha-num�riques maximum
	var $order_info;		// R�sum� de la commande
	var $url_return;		// Url par d�faut (apr�s appui du bouton "retourner � la boutique" par le client sur la plateforme)
	var $url_success;		// Url en cas de succ�s du paiement (apr�s appui du bouton "retourner � la boutique")
	var $url_referral;		// Url en cas de refus d'autorisation, code 02 "referral" (apr�s appui du bouton "retourner � la boutique")
	var $url_refused;		// Url en cas de refus autre que "referral" (apr�s appui du bouton "retourner � la boutique")
	var $url_cancel;		// Url en cas d'annulation par le client (apr�s appui sur "annuler et retourner sur la boutique")
	var $url_error;			// Url en cas d'erreur interne
	var $url_check;			// Url appel�e par la plateforme de paiement pour confirmer le paiement
							// Pour une s�curit� optimale, ne pas utiliser ce param�tre. Le configurer dans le backoffice de la plateforme
	var $contrib;			// code identifiant le plugin de paiement (par ex. "thelia_v2.0")
	var $redirect_enabled;	// Activer ou non la redirection automatique du client vers la boutique
	var $redirect_success_timeout;	// si $redirect_enabled, d�finit le temps en secondes (0-300) avant la redirection automatique
	var $redirect_success_message;	// si $redirect_enabled, d�finit le message affich� avant la redirection automatique
	var $redirect_error_timeout;	// si $redirect_enabled, d�finit le temps avant redirection automatique, lorsque le paiement a �chou�
	var $redirect_error_message;	// si $redirect_enabled, d�finit le message affich� avant redirection automatique, lorsque le paiement a �chou�


	/* PARAMETRES DE REPONSE DE LA PLATEFORME */
	var $auth_result;		// Code retour de la demande d'autorisation retourn�e par la banque �mettrice, si disponible (vide sinon).
	var $auth_mode;			// Indique comment a �t� r�alis�e la demande d�autorisation. Ce champ peut prendre les valeurs suivantes :
							#- FULL : correspond � une autorisation du montant total de la transaction dans le cas d�un paiement unitaire avec remise � moins de 6 jours,
							# 		ou � une autorisation du montant du premier paiement dans le cas du paiement en N fois, dans le cas d�une remise de ce premier paiement � moins de 6 jours.
							#- MARK : correspond � une prise d�empreinte de la carte, dans le cas ou le paiement est envoy� en banque � plus de 6 jours.
	var $auth_number;		// Num�ro d'autorisation retourn� par le serveur bancaire, si disponible (vide sinon).
	var $card_brand;		// Type de carte utilis� pour le paiement, si disponible (vide sinon).
	var $card_number;		// Num�ro de carte masqu�.
	var $extra_result;		// Code compl�mentaire de r�ponse. Sa signification d�pend de la valeur renseign�e dans result.
							# Lorsque result vaut 30 (erreur de requ�te), alors extra_result contient un code indiquant quel champ a �t� mal rempli
	var $warranty_result;	// Si l�autorisation a �t� r�alis�e avec succ�s, indique la garantie du paiement, li�e � 3D-Secure :
							# YES => Le paiement est garanti
							# NO => Le paiement n�est pas garanti
							# UNKNOWN => Suite � une erreur technique, le paiement ne peut pas �tre garanti
							# Non valoris� => Garantie de paiement non applicable
	var $payment_certificate;// Si l�autorisation a �t� r�alis�e avec succ�s, la plateforme de paiement d�livre un certificat de paiement. Pour toute question concernant un paiement r�alis� sur la plateforme, cette information devra �tre communiqu�e.
	var $result;			// Code retour.
							#- 00 : Paiement r�alis� avec succ�s.
							#- 02 : Le commer�ant doit contacter la banque du porteur.
							#- 05 : Paiement refus�.
							#- 17 : Annulation client.
							#- 30 : Erreur de format de la requ�te. A mettre en rapport avec la valorisation du champ extra_result.
							#- 96 : Erreur technique lors du paiement.
	var $hash;				// Valeur retour de serveur � serveur permettant de calculer la signature de retour
	
	var $received_signature;// Signature re�ue en POST au retour de la plateforme

	
	/* VARIABLES LIEES L'OBJET */
	private $timestamp='';		//Timestamp lors de la cr�ation du formulaire

	private $tab_auth_result;	// Tableau de r�ponses de confirmation (code => traduction)
	private $tab_warranty_result;// Tableau de r�ponses 3D Secure
	private $tab_result;		// Tableau de r�ponses globales
	private $tab_extra_result;	// Tableau de r�ponses globales d�taill�es

	
	/* LISTES DES ATTRIBUTS DE L'OBJET utiles pour les foreach... */
	// li�es � la requ�te (sauf key et signature)
	private $request_mandatory = array(
		'amount','capture_delay','currency','ctx_mode','payment_cards','payment_config','site_id','trans_date','trans_id',
		'validation_mode','version'
	);
	private $request_optionnal = array(
		'cust_id','cust_name','cust_title','cust_address','cust_zip','cust_city','cust_phone','cust_country','language','order_id','order_info',
		'cust_email','url_return','url_success','url_referral','url_refused','url_cancel','url_error','url_check','contrib',
		'redirect_success_timeout','redirect_success_message','redirect_error_timeout','redirect_error_message'
	);
	private $request_signature = array(
		'version','site_id','ctx_mode','trans_id','trans_date','validation_mode','capture_delay','payment_config','payment_cards','amount',
		'currency'
	);
	
	// li�es � la r�ponse (sauf key, signature et hash)
	private $response_specific = array(
		'auth_result','auth_number','auth_mode','card_brand','card_number','warranty_result','payment_certificate','result','extra_result'
	);
	private $response_requestlike = array(
		// same as response
		'amount','currency','payment_config','site_id','trans_date','trans_id','version','payment_src','order_info','cust_address',
		'cust_country','cust_email','cust_id','cust_name','cust_phone','cust_title','cust_city','cust_zip',
		// same as response or default
		'capture_delay','language','validation_mode',
	);
	private $response_signature = array(
		'version','site_id','ctx_mode','trans_id','trans_date','validation_mode','capture_delay','payment_config','card_brand','card_number',
		'amount','currency','auth_mode','auth_result','auth_number','warranty_result','payment_certificate','result'
	);
	
	// Autres attributs
	private $misc = array('key_test','key_prod','hash','redirect_enabled','platform_url','signature','received_signature');
	
	
	/* ********************************* *
	 * GETTERS/SETTERS SUR LES VARIABLES *
	 * ********************************* */
	/**
	 * renvoie un tableau contenant les noms des attributs li�s � telle ou telle fonction de l'objet
	 */
	function getAttributeList($type=null)
	{
		switch($type)
		{
			case "request_mandatory":
				return $this->request_mandatory;
			case "request_optionnal":
				return $this->request_optionnal;
			case "request_all":
				return array_merge($this->request_mandatory,$this->request_optionnal);
				
			case "response_specific":
				return $this->response_specific;
			case "response_requestlike":
				return $this->response_requestlike;
			case "response_all":
				return array_merge($this->response_specific, $this->response_requestlike);
				
			case "request_signature":
				return $this->request_signature;
			case "response_signature":
				return $this->response_signature;
				
			case "misc":
				return $this->misc;
			case "all":
			default:
				return array_unique(array_merge(
					$this->request_mandatory, $this->request_optionnal, $this->request_signature,
					$this->response_specific, $this->response_requestlike, $this->response_signature,
					$this->misc
				));
		}
	}
	
	/**
	 * renvoie la valeur d'un attribut public
	 */
	function get($name='')
	{
		$result = null;
		if( in_array($name, $this->getAttributeList("all")) )
		{
			$result = $this->$name;
		}
		if($name=="key")
		{
			$result = ($this->ctx_mode=="TEST") ? $this->key_test : $this->key_prod;
		}
		return $result;
	}
	
	/**
	 * Modifie la valeur d'un attribut public
	 * @return boolean true si r�ussite, false sinon
	 */
	function set($name='',$value=null)
	{
		if( in_array($name, $this->getAttributeList("all")) )
		{
			$this->$name = $value;
			return true;
		}
		return false;
	}
	
	/**
	 * Modifie les valeurs d'attributs publics � partir d'un tableau
	 * @param $params tableau de param�tres format nom=>valeur
	 * @return boolean true si toutes les valeurs du tableau ont pu �tre enregistr�es, false si non
	 */
	function setFromArray($params)
	{
		$result = true;
		foreach ($params as $name => $value)
		{
			$temp_result = $this->set($name,$value);
			if( $temp_result == false )
				$result = false;
		}
		return $result;
	}
	
	/* ************ *
	 * CONSTRUCTEUR *
	 * ************ */
	//TODO verif / simplifier liste params
	function VADS_API($get_platform_url=null,$get_key_test=null,$get_key_prod=null,$get_amount=null,$get_capture_delay=null,$get_currency=null,$get_cust_email=null,
	$get_ctx_mode=null,$get_payment_cards=null,$get_payment_config=null,$get_site_id=null,$get_validation_mode=null,$get_url_return=null,
	$get_cust_id=null,$get_cust_name=null,$get_cust_title=null,$get_cust_address=null,$get_cust_zip=null,$get_cust_city=null,
	$get_cust_phone=null,$get_cust_country=null,$get_language=null,$get_order_id=null,$get_order_info=null,$get_url_success=null,
	$get_url_referral=null, $get_url_refused=null, $get_url_cancel=null, $get_url_error=null, $get_url_check=null, $get_contrib=null, $get_redirect_enabled=null,
	$get_redirect_success_timeout=null, $get_redirect_success_message=null, $get_redirect_error_timeout=null, $get_redirect_error_message=null)
	{
		// Initialisation des variables publiques
		foreach($this->getAttributeList("all") as $var_name)
		{
			$argument_name = 'get_'.$var_name;
			$this->$var_name = isset($$argument_name) ? $$argument_name : null;
		}

		// Intialisation des variables priv�es
		$this->timestamp=time();
		$this->loadResponsesTranslation();	//tab_auth_result
		$auth_result='';
		$auth_mode='';
		$auth_number='';
		$card_brand='';
		$card_number='';
		$extra_result='';
		$warranty_result='';
		$payment_certificate='';
		$result='';
		$hash='';

		//Calcul
		$this->generateTrans_id();
		$this->getTrans_date();
//		$this->getSignature();
	}

	/**
	 * Chargement des traductions des codes retour dans tab_auth_result
	 * Les constantes MODULE_PAYMENT_VADS_* sont suppos�es charg�es depuis un fichier de langue
	 */
	function loadResponsesTranslation(){
		$missing_msg = defined('MODULE_PAYMENT_VADS_MISSING_RESULT_TRANSLATION') ? MODULE_PAYMENT_VADS_MISSING_RESULT_TRANSLATION : "missing translation for result code ";

		# warranty_result
		$this->tab_warranty_result['YES'] = defined('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_GARANTI') ? MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_GARANTI : $missing_msg.'YES';
		$this->tab_warranty_result['NO'] = defined('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_PAS_GARANTI') ? MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_PAS_GARANTI : $missing_msg.'NO';
		$this->tab_warranty_result['UNKNOWN'] = defined('MODULE_PAYMENT_VADS_REPONSE_INCIDENT_TECHNIQUE_PAIEMENT_PAS_GARANTI') ? MODULE_PAYMENT_VADS_REPONSE_INCIDENT_TECHNIQUE_PAIEMENT_PAS_GARANTI : $missing_msg.'UNKNOWN';

		# result
		$this->tab_result['00'] = defined('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_REALISE_SUCCES') ? MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_REALISE_SUCCES : $missing_msg.'00';
		$this->tab_result['02'] = defined('MODULE_PAYMENT_VADS_REPONSE_COMMERCANT_CONTACTER_BANQUE_PORTEUR') ? MODULE_PAYMENT_VADS_REPONSE_COMMERCANT_CONTACTER_BANQUE_PORTEUR : $missing_msg.'02';
		$this->tab_result['05'] = defined('MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_REFUSE') ? MODULE_PAYMENT_VADS_REPONSE_PAIEMENT_REFUSE : $missing_msg.'05';
		$this->tab_result['17'] = defined('MODULE_PAYMENT_VADS_REPONSE_ANNULATION_CLIENT') ? MODULE_PAYMENT_VADS_REPONSE_ANNULATION_CLIENT : $missing_msg.'17';
		$this->tab_result['30'] = defined('MODULE_PAYMENT_VADS_REPONSE_ERREUR_FORMAT_REQUETE') ? MODULE_PAYMENT_VADS_REPONSE_ERREUR_FORMAT_REQUETE : $missing_msg.'30';
		$this->tab_result['96'] = defined('MODULE_PAYMENT_VADS_REPONSE_ERREUR_TECHNIQUE_LORS_PAIEMENT') ? MODULE_PAYMENT_VADS_REPONSE_ERREUR_TECHNIQUE_LORS_PAIEMENT : $missing_msg.'96';

		$missing_msg = defined('MODULE_PAYMENT_VADS_MISSING_EXTRA_RESULT_TRANSLATION') ? MODULE_PAYMENT_VADS_MISSING_EXTRA_RESULT_TRANSLATION : "missing translation for extra result code ";
		# extra_result
		$this->tab_extra_result['01'] = defined('MODULE_PAYMENT_VADS_REPONSE_VERSION_MODE_PAIEMENT_BPL') ? 'Version => '.MODULE_PAYMENT_VADS_REPONSE_VERSION_MODE_PAIEMENT_BPL : $missing_msg.'01';
		$this->tab_extra_result['02'] = defined('MODULE_PAYMENT_VADS_REPONSE_ATTRIBUER_LORS_INSCIPTION_COMMERCANT') ? 'Site_id => '.MODULE_PAYMENT_VADS_REPONSE_ATTRIBUER_LORS_INSCIPTION_COMMERCANT : $missing_msg.'02';
		$this->tab_extra_result['03'] = defined('MODULE_PAYMENT_VADS_REPONSE_UNIQUE_POUR_SITE_POUR_1_JOURNEE') ? 'Trans_id => '.MODULE_PAYMENT_VADS_REPONSE_UNIQUE_POUR_SITE_POUR_1_JOURNEE : $missing_msg.'03';
		$this->tab_extra_result['04'] = defined('MODULE_PAYMENT_VADS_REPONSE_DATE_LOCALE_SITE') ? 'Trans_date => '.MODULE_PAYMENT_VADS_REPONSE_DATE_LOCALE_SITE : $missing_msg.'04';
		$this->tab_extra_result['05'] = defined('MODULE_PAYMENT_VADS_REPONSE_SI_VALIDATION_MANUELLE_COMMERCANT') ? 'Validation_mode => '.MODULE_PAYMENT_VADS_REPONSE_SI_VALIDATION_MANUELLE_COMMERCANT : $missing_msg.'05';
		$this->tab_extra_result['06'] = defined('MODULE_PAYMENT_VADS_REPONSE_DELAI_NB_JOUR_REMISE_BANQUE') ? 'Capture_delay => '.MODULE_PAYMENT_VADS_REPONSE_DELAI_NB_JOUR_REMISE_BANQUE : $missing_msg.'06';
		$this->tab_extra_result['07'] = defined('MODULE_PAYMENT_VADS_REPONSE_TYPE_PAIEMENT') ? 'Payment_config => '.MODULE_PAYMENT_VADS_REPONSE_TYPE_PAIEMENT : $missing_msg.'07';
		$this->tab_extra_result['08'] = defined('MODULE_PAYMENT_VADS_REPONSE_LISTE_CARTES_DISPO') ? 'Payment_cards => '.MODULE_PAYMENT_VADS_REPONSE_LISTE_CARTES_DISPO : $missing_msg.'08';
		$this->tab_extra_result['09'] = defined('MODULE_PAYMENT_VADS_REPONSE_MONTANT_TRANSACTION') ? 'Amount => '.MODULE_PAYMENT_VADS_REPONSE_MONTANT_TRANSACTION : $missing_msg.'09';
		$this->tab_extra_result['10'] = defined('MODULE_PAYMENT_VADS_REPONSE_MONNAIE_UTILISER_ISO') ? 'Currency => '.MODULE_PAYMENT_VADS_REPONSE_MONNAIE_UTILISER_ISO : $missing_msg.'10';
		$this->tab_extra_result['11'] = defined('MODULE_PAYMENT_VADS_REPONSE_MODE_PLATEFORME') ? 'Ctx_mode => '.MODULE_PAYMENT_VADS_REPONSE_MODE_PLATEFORME : $missing_msg.'11';
		$this->tab_extra_result['12'] = defined('MODULE_PAYMENT_VADS_REPONSE_LANGUE_PAGE_PAIEMENT') ? 'Language => '.MODULE_PAYMENT_VADS_REPONSE_LANGUE_PAGE_PAIEMENT : $missing_msg.'12';
		$this->tab_extra_result['13'] = defined('MODULE_PAYMENT_VADS_REPONSE_NUMERO_COMMANDE') ? 'Order_id => '.MODULE_PAYMENT_VADS_REPONSE_NUMERO_COMMANDE : $missing_msg.'13';
		$this->tab_extra_result['14'] = defined('MODULE_PAYMENT_VADS_REPONSE_RESUME_COMMANDE') ? 'Order_info => '.MODULE_PAYMENT_VADS_REPONSE_RESUME_COMMANDE : $missing_msg.'14';
		$this->tab_extra_result['15'] = defined('MODULE_PAYMENT_VADS_REPONSE_ADRESSE_EMAIL_CLIENT') ? 'Cust_email => '.MODULE_PAYMENT_VADS_REPONSE_ADRESSE_EMAIL_CLIENT : $missing_msg.'15';
		$this->tab_extra_result['16'] = defined('MODULE_PAYMENT_VADS_REPONSE_IDENTIFIANT_CLIENT_POUR_MARCHANT') ? 'Cust_id => '.MODULE_PAYMENT_VADS_REPONSE_IDENTIFIANT_CLIENT_POUR_MARCHANT : $missing_msg.'16';
		$this->tab_extra_result['17'] = defined('MODULE_PAYMENT_VADS_REPONSE_CIVILITE_CLIENT') ? 'Cust_title => '.MODULE_PAYMENT_VADS_REPONSE_CIVILITE_CLIENT : $missing_msg.'17';
		$this->tab_extra_result['18'] = defined('MODULE_PAYMENT_VADS_REPONSE_NOM_CLIENT') ? 'Cust_name => '.MODULE_PAYMENT_VADS_REPONSE_NOM_CLIENT : $missing_msg.'18';
		$this->tab_extra_result['19'] = defined('MODULE_PAYMENT_VADS_REPONSE_ADRESSE_CLIENT') ? 'Cust_address => '.MODULE_PAYMENT_VADS_REPONSE_ADRESSE_CLIENT : $missing_msg.'19';
		$this->tab_extra_result['20'] = defined('MODULE_PAYMENT_VADS_REPONSE_CODE_POSTAL_CLIENT') ? 'Cust_zip => '.MODULE_PAYMENT_VADS_REPONSE_CODE_POSTAL_CLIENT : $missing_msg.'20';
		$this->tab_extra_result['21'] = defined('MODULE_PAYMENT_VADS_REPONSE_VILLE_CLIENT') ? 'Cust_city => '.MODULE_PAYMENT_VADS_REPONSE_VILLE_CLIENT : $missing_msg.'21';
		$this->tab_extra_result['22'] = defined('MODULE_PAYMENT_VADS_REPONSE_PAYS_CLIENT_ISO') ? 'Cust_country => '.MODULE_PAYMENT_VADS_REPONSE_PAYS_CLIENT_ISO : $missing_msg.'22';
		$this->tab_extra_result['23'] = defined('MODULE_PAYMENT_VADS_REPONSE_TELEPHONE_CLIENT') ? 'Cust_phone => '.MODULE_PAYMENT_VADS_REPONSE_TELEPHONE_CLIENT : $missing_msg.'23';
		$this->tab_extra_result['24'] = defined('MODULE_PAYMENT_VADS_REPONSE_URL_SUCCESS') ? 'Url_success => '.MODULE_PAYMENT_VADS_REPONSE_URL_SUCCESS : $missing_msg.'24';
		$this->tab_extra_result['25'] = defined('MODULE_PAYMENT_VADS_REPONSE_URL_REFUS') ? 'Url_refused => '.MODULE_PAYMENT_VADS_REPONSE_URL_REFUS : $missing_msg.'25';
		$this->tab_extra_result['26'] = defined('MODULE_PAYMENT_VADS_REPONSE_URL_REFUS_AUTORISATION') ? 'Url_referral => '.MODULE_PAYMENT_VADS_REPONSE_URL_REFUS_AUTORISATION : $missing_msg.'26';
		$this->tab_extra_result['27'] = defined('MODULE_PAYMENT_VADS_REPONSE_URL_ANNULATION') ? 'Url_cancel => '.MODULE_PAYMENT_VADS_REPONSE_URL_ANNULATION : $missing_msg.'27';
		$this->tab_extra_result['28'] = defined('MODULE_PAYMENT_VADS_REPONSE_URL_DEFAUT') ? 'Url_return => '.MODULE_PAYMENT_VADS_REPONSE_URL_DEFAUT : $missing_msg.'28';
		$this->tab_extra_result['29'] = defined('MODULE_PAYMENT_VADS_REPONSE_URL_ERREUR') ? 'Url_error => '.MODULE_PAYMENT_VADS_REPONSE_URL_ERREUR : $missing_msg.'29';
		$this->tab_extra_result['99'] = defined('MODULE_PAYMENT_VADS_REPONSE_ERREUR_INCONNUE_DANS_REQUETE') ? MODULE_PAYMENT_VADS_REPONSE_ERREUR_INCONNUE_DANS_REQUETE : $missing_msg.'99';
	}

	/* ******************* *
	 * CALCUL DE SIGNATURE *
	 * ******************* */
	/**
	 * G�n�re la signature � envoyer � la plateforme � partir des champs enregistr�s, la stocke
	 * dans $this->signature et la renvoie.
	 * @param $hashed boolean true par d�faut ; mettre � false pour obtenir la signature avant hachage
	 * @return string la signature calcul�e
	 */
	function generateRequestSignature($hashed=true)
	{
		$sign_content = "";
		foreach ($this->request_signature as $field)
		{
			$sign_content .= $this->$field;
			$sign_content .= "+";
		}
		$sign_content .= $this->get("key");
		$this->signature = $hashed ? sha1($sign_content) : $sign_content;
		return $this->signature;
	}
	
	/**
	 * G�n�re la signature de la r�ponse � partir des champs enregistr�s, la stocke
	 * dans $this->signature et la renvoie.
	 * @param $hashed boolean true par d�faut ; mettre � false pour obtenir la signature avant hachage
	 * @return string la signature calcul�e
	 */
	function generateResponseSignature($hashed=true)
	{
		$sign_content = "";
		foreach ($this->response_signature as $field)
		{
			$sign_content .= $this->$field;
			$sign_content .= "+";
		}
		$sign_content .= ($this->hash != '') ? $this->hash."+" : "";
		$sign_content .= $this->get("key");
		$this->signature = $hashed ? sha1($sign_content) : $sign_content;
		return $this->signature;
	}
	
	
	/* ****************************************** *
	 * CONSTRUCTION DE LA REQUETE A LA PLATEFORME *
	 * ****************************************** */
	/**
	 * Renvoie le code html du formulaire utilis� pour rediriger le client vers la plateforme de paiement
	 * @param $enteteMethod	POST ou GET ; utilisez de pr�f�rence POST, sinon voir aussi getRequestUrlEncodedFields
	 * @param $enteteAdd attributs suppl�mentaires pour la balise <form>
	 * @param $inputType type des entr�es, hidden par d�faut
	 * @param $buttonValue texte du bouton
	 * @param $buttonAdd attributs suppl�mentaires du bouton
	 * @param $buttonType type du bouton, par d�faut submit
	 * @return string
	 */
	function getRequestHtmlForm($enteteAdd='',$inputType='hidden',
								$buttonValue='Aller sur la plateforme de paiement',$buttonAdd='',$buttonType='submit')
	{
		$html  = "";
		$html .= '<form action="'.$this->platform_url.'" method="POST" '.$enteteAdd.'>';
		$html .= "\n";
		$html .= $this->getRequestHtmlInputs($inputType);
		$html .= '<input type="'.$buttonType.'" value="'.$buttonValue.'" '.$buttonAdd.'/>';
		$html .= "\n";
		$html .= '</form>';
		return $html;
	}
	
	/**
	 * Renvoie le code html des inputs du formulaire de redirection vers la plateforme
	 * @param $inputType par d�faut hidden
	 * @return string
	 */
	function getRequestHtmlInputs($inputType='hidden')
	{
		$html = "";
		foreach ($this->getAttributeList("request_mandatory") as $field_name)
		{
			$value = $this->$field_name;
			if($value !== null)
			{
				$html .= '<input type="'.$inputType.'" name="'.$field_name.'" value="'.$value.'" />';
				$html .= "\n";
			}
			else
			{
				//TODO lever une erreur ou action similaire
			}
		}
		foreach ($this->getAttributeList("request_optionnal") as $field_name)
		{
			if( substr($field_name,0,8) == 'redirect' && !$this->isRedirectEnabled() )
			{
				continue;
			}
			$value = $this->$field_name;
			if($value != '')
			{
				$html .= '<input type="'.$inputType.'" name="'.$field_name.'" value="'.$value.'" />';
				$html .= "\n";
			}
		}
		$sign = $this->generateRequestSignature();
		$html .= '<input type="'.$inputType.'" name="signature" value="'.$sign.'" />';
		$html .= "\n";
		return $html;
	}
	
	/**
	 * Renvoie l'url de la plateforme avec les param�tres � transmettre encod�s (m�thode GET)
	 * Utiliser de pr�f�rence un formulaire POST (url plus propre, pas de limite � la longueur des param�tres),
	 * cf. getRequestHtmlForm
	 * @return unknown_type
	 */
	function getRequestUrl()
	{
		return $this->platform_url . '?' . $this->getRequestUrlEncodedFields();
	}
	
	/**
	 * Renvoie les param�tres url encod�s � transmettre lors de la redirection vers la plateforme,
	 * si vous utilisez un lien plut�t qu'un formulaire.
	 * Utilisez de pr�f�rence un formulaire POST (url plus propre, pas de limite � la longueur de param�tres) ou
	 * �vitez d'utiliser les param�tres optionnels trop longs
	 * @return string ex : amount=1000&order_id=123&order_info=10%20euros%20%E0%20payer&...
	 */
	function getRequestUrlEncodedFields()
	{
		$fields = "";
		foreach ($this->getAttributeList("request_mandatory") as $field_name)
		{
			$value = $this->$field_name;
			if($value !== null)
			{
				$fields .= $field_name."=".rawurlencode($value);
				$fields .= "&";
			}
			else
			{
				//TODO lever une erreur ou action similaire
			}
		}
		foreach ($this->getAttributeList("request_optionnal") as $field_name)
		{
			if( substr($field_name,0,8) == 'redirect' && !$this->isRedirectEnabled() )
			{
				continue;
			}
			$value = $this->$field_name;
			if($value !== null)
			{
				$fields .= $field_name."=".rawurlencode($value);
				$fields .= "&";
			}
		}
		$sign  = $this->generateRequestSignature();
		$fields .= "signature=$sign";
		return $fields;
	}
	
	/**
	 * return whether the automatic redirection is enabled or not
	 * (true if redirect_enabled = true or c.i. "true")
	 * @return boolean
	 */
	function isRedirectEnabled()
	{
		if($this->redirect_enabled === true || strtolower($this->redirect_enabled) == 'true')
		{
			return true;
		}
		return false;
	}
	
	/**
	 * G�n�ration d'un trans_id unique pour la transaction de ce site pour la journ�e
	 * Le renvoie et le stocke dans $this->trans_id
	 * @return string
	 */
	function generateTrans_id()
	{
		$temp=substr($this->timestamp,-5,5).rand(0,9);

		$this->trans_id=$temp;
		return $this->trans_id;
	}
	
	/**
	 * Renvoie et stocke dans $this->trans_date la date au format AAAAMMJJHHmmSS
	 * @return string
	 */
	function getTrans_date(){
		$temp=date('YmdHis',$this->timestamp);

		$this->trans_date=$temp;
		return $this->trans_date;
	}
	
	
	/* ********************************** *
	 * ANALYSE DE LA REPONSE DE LA BANQUE *
	 * ********************************** */
	/**
	 * Set the response-related attributes from given tab ($_POST by default)
	 * @param $tab
	 */
	function setResponseFromPost($tab=null, $key_test=null, $key_prod=null, $ctx_mode=null)
	{
		$tab = isset($tab) ? $tab : $_POST;
		if (isset($key_test)) {$this->key_test = $key_test;}
		if (isset($key_prod)) {$this->key_prod = $key_prod;}
		if (isset($ctx_mode)) {$this->ctx_mode = $ctx_mode;}
		foreach ( $this->getAttributeList("response_all") as $field_name )
		{
			$this->$field_name = isset($tab[$field_name]) ? $tab[$field_name] : null;
		}
		$this->hash = isset($tab['hash']) ? $tab['hash'] : null;
		$this->received_signature = isset($tab['signature']) ? $tab['signature'] : null;
	}
	
	/**
	 * Compare la signature soumise avec celle calcul�e � partir des champs
	 * @param string $post_signature
	 * @return boolean true si les deux signatures sont identiques
	 */
	function isAuthentifiedResponse()
	{
		return ($this->generateResponseSignature() == $this->received_signature);
	}
	
	/**
	 * Renvoie true si le code retour enregistr� correspond � un paiement r�ussi, false sinon
	 * @return boolean
	 */
	function isAcceptedPayment()
	{
		return ($this->result == '00');
	}
	
	/**
	 * Renvoie, selon le param�tre type, le code retour de la r�ponse de la banque ou sa traduction
	 * @param $type 'detail' : renvoie le message et les d�tails �ventuels ; 'id' : renvoie le code retour ; sinon juste le message
	 * @return string
	 */
	function getResponseMessage($type=''){
		$return = $this->tab_result[$this->result];
		if( $type == 'detail' && $this->result=='30')
		{
			$return .= $this->tab_extra_result[$this->extra_result];
		}
		if($type == 'id')
			$return = $this->result;
		else
			$return = ($return ? $return : MODULE_PAYMENT_VADS_POSSIBILITE_ERREUR_PAIEMENT);

		return $return;
	}
	
	/**
	 * Renvoie la traduction du code retour 3D secure
	 * @return string
	 */
	function getReponse3DSec(){
		$return = '';
		if($this->warranty_result!=''){
			$return .= $this->tab_warranty_result[$this->warranty_result];
		}

		return $return;
	}
}
?>