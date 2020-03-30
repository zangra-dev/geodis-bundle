<?php

namespace GeodisBundle\Model;

use GeodisBundle\Model\Base\Model;


/**
 * Class Shipment
 *
 * @property bool   impressionEtiquette             Facultatif      Impresion étiquette Valeur false par défaut si non renseigné
 * @property string typeImpressionEtiquette         Facultatif      P: PDF 2 par page T: PDF A4 Z: Thermique Zpl E: Thermique Epl   Format étiquette
 * @property bool   validationEnvoi                 Facultatif      Validation vers GEODIS
 * @property bool   suppressionSiEchecValidation    Facultatif
 * @property bool   impressionBordereau             Facultatif      Impression du Bordereau chauffeur PDF
 * @property bool   impressionRecapitulatif         Facultatif      Impression du récapitulatif des Expéditions PDF
 * @property int    noRecepisse                     Facultatif      Numéro de cérépissé GEODIS  Défini par l'application et renvoyé dans la réponse. A renseigner si modification sur une Expédition
 * @property int    noSuivi                         Facultatif      Numéro de Suivi GEODIS  Défini par l'application et renvoyé dans la réponse. A renseigner si modification sur une Expédition
 *
 * Données d'Expédition
 * @property bool   horsSite                        Facultatif      Expédition depuis un autre site
 * @property int    codeSa                          Obligatoire     Code Agence GEODIS  001044
 * @property int    codeClient                      Obligatoire     Compte facturation client   074777 ou 074535
 * @property string codeProduit                     Obligatoire     Code prestation commerciale ATK ou CXI
 * @property string reference1                      Facultatif      Référence 1 client
 * @property string reference2                      Facultatif      Référence 2  client
 * @property string nomEnl                          Obligatoire     Nom Expéditeur  ALGAM NATIONAL
 * @property string adresse1Enl                     Obligatoire     Adesse 1 Enlèvement PA DES PETITES LANDES
 * @property string adresse2Enl                     Obligatoire     Adresse 2 Enlèvement    2 RUE DE MILAN
 * @property int    codePostalEnl                   Obligatoire     Code postal du site Enlèvement  44470
 * @property string villeEnl                        Obligatoire     Localité Enlèvement THOUARE SUR LOIRE
 * @property string codePaysEnl                     Obligatoire     Code pays Enlèvement    FR
 * @property string nomContactEnl                   Facultatif      Nom contact client site Enlèvement
 * @property string emailEnl                        Facultatif      Email contact client
 * @property int    telFixeEnl                      Facultatif      Téléphone contact Enlèvement
 * @property string indTelMobileEnl                 Facultatif      Ind. Pays mobile Enlèvement
 * @property int    telMobileEnl                    Facultatif      Portable Enlèvement
 * @property int    codePorteEnl                    Facultatif      Code Porte
 * @property int    codeTiersEnl                    Facultatif
 * @property string noEntrepositaireAgreeEnl        Facultatif      N° Entrepositaire cleint Expéditeur
 * @property string dateDepartEnlevement            Obligatoire     YYYY/MM/DD  Date de départ  J-30 à J+30
 * @property string periodePreferenceEnlevement     Facultatif      MAT / APM   Facultatif  MAT: Matin APM: Après-midi  Créneau Enlèvement
 * @property string instructionEnlevement           Facultatif      Instructions à l'Enlèvement
 * @property string nom                             Obligatoire     Nom destinataire
 * @property string adresse1                        Obligatoire     Adresse 1 destinataire
 * @property string adresse2                        Obligatoire     Adresse 2 destinataire
 * @property int    codePostal                      Obligatoire     CP destinataire
 * @property string ville                           Obligatoire     Localité destinataire
 * @property string codePays                        Obligatoire     Code pays destinataire
 * @property string nomContact                      Facultatif      Contact destinataire    Obligatoire si option livraison= RDW
 * @property string email                           Facultatif      Mail destinataire
 * @property int    telFixe                         Facultatif      Téléphone destinataire
 * @property int    indTelMobile                    Facultatif      Ind. Portable destinataire
 * @property int    telMobile                       Facultatif      Numéro portable destinataire
 * @property int    codePorte                       Facultatif      Code port destinataire
 * @property int    codeTiers                       Facultatif      Code destinataire   Obligatoire si Regroupement
 * @property int    noEntrepositaireAgree           Facultatif      Numéro Entrepositaire agréé destinataire
 * @property bool   particulier                     Facultatif      Type destinataire
 *
 * Données Unité de Manutentions (répéter les lignes autant de fois que d'unité de manutention)
 * @property bool   palette0                        Facultatif      UM= palette true si um= palette
 * @property bool   paletteConsignee0               Facultatif      UM= Palette consignée   true si palette consignée
 * @property int    quantite0                       Obligatoire     Nombre d'UM
 * @property int    poidsUnitaire0                  Facultatif      Poids UM    Obligatoire si Poids Total non renseigné
 * @property int    volumeUnitaire0                 Facultatif      Volume UM
 * @property int    longueurUnitaire0               Facultatif      Longueur UM
 * @property int    largeurUnitaire0                Facultatif      Largeur UM
 * @property int    hauteurUnitaire0                Facultatif      Hauteur UM
 * @property string referenceColis0                 Facultatif      Référence UM
 *
 * Donnée Expédition
 * @property int    poidsTotal                      Facultatif      Poids total Expédition  Obligatoire si poids unitaire non renseigné
 * @property int    volumeTotal                     Facultatif      Volume total Expédition
 * @property int    longueurTotale                  Facultatif      Longueur total Expédition
 * @property int    largeurTotale                   Facultatif      Largeur Totale Expédition
 * @property int    hauteurTotale                   Facultatif      Hauteur totale Expédition
 * @property int    qteUniteTaxation                Facultatif      Quantité unité de taxation
 * @property int    codeUniteTaxation               Facultatif      Code unité taxation
 * @property bool   animauxPlumes                   Facultatif      Animaux à plumes
 * @property string optionLivraison                 Facultatif      BRT / RDW / RDT / DSL / SAM Facultatif      Options à la livraison
 * @property int    codeSaBureauRestant             Facultatif      Code agence GEODIS de livraison A renseigner si option livraison= BRT
 * @property int    idPointRelais                   Facultatif      Identifiant du Point relais de livraison    A renseigner si code produit= RCX
 * @property string dateLivraison                   Facultatif      YYYY/MM/DD  Date souhaitée de livraison Contrôle sur calendrier Espace
 * @property string instructionLivraison            Facultatif      Instructions à la livraison
 * @property string natureMarchandise               Facultatif      Nature de marchandise
 * @property int    montantValeurDeclaree           Facultatif      Montant de la Valeur déclarée
 * @property int    codeDeviseValeurDeclaree        Facultatif      Code devise pour la Valeur déclarée Contrôle sur devise espace
 * @property int    montantContreRemboursement      Facultatif      Montant du Contre-remboursement
 * @property int    codeDeviseCodeContreRemboursement Facultatif    Code devise du Contre-remboursement Contrôle sur devise espace
 * @property int    codeIncotermConditionLivraison  Facultatif      Code incoterm   Contrôle sur code incoterm espece
 * @property bool   sadSwap                         Facultatif      Service echange simple
 * @property bool   sadLivEtage                     Facultatif      Service livraison à l'étage Contrôle si service autorisé sur fiche client
 * @property bool   sadMiseLieuUtil                 Facultatif      Service mise en lieu d'utilisation  Contrôle si service autorisé sur fiche client
 * @property bool   sadDepotage                     Facultatif      Service dépotage    Contrôle si service autorisé sur fiche client
 * @property int    etage                           Facultatif      Numéro d'étage  Obligatoire si Montée à l'etage= true
 * @property string emailNotificationDestinataire   Facultatif      Adresse mail pour la notification mail au destinataire  Obligatoire si option à la livraison= RDW
 * @property int    smsNotificationDestinataire     Facultatif      Numéro portable pour la notification SMS au destinataire
 * @property string emailNotificationExpediteur     Facultatif      Adresse mail destinataire pour la notification mail au destinataire
 * @property string emailConfirmationEnlevement     Facultatif      Adresse mail destinataire pour la confirmation d'enlèvement
 * @property string emailPriseEnChargeEnlevement    Facultatif      Adresse mail destinataire pour la prise en charge d'enlèvement
 *
 * Matières Dangereuses
 * @property int    poidsQteLimiteeMD               Facultatif      Poids qté limitée MD
 * @property int    dangerEnvQteLimiteeMD           Facultatif      Poids Qté exceptée MD
 * @property int    nbColisQteExcepteeMD            Facultatif      Nbre colis Qté exceptée
 * @property bool   dangerEnvQteExcepteeMD          Facultatif      Produit dangereux pour l'environnement
 * @property int    noONU0                          Facultatif      Numéro ONU
 * @property int    groupeEmballage0                Facultatif      Groupe d'emballage
 * @property int    classeADR0                      Facultatif      Classe ADR
 * @property string codeTypeEmballage0              Facultatif      Type emballage
 * @property int    nbEmballages0                   Facultatif      Nbre d'emballage
 * @property string nomTechnique0                   Facultatif      Nom technique
 * @property string codeQuantite0                   Facultatif      Unité
 * @property int    quantite0                       Facultatif      Qté
 * @property bool   dangerEnv0                      Facultatif      Produit dangereux pour l'environnement
 *
 * Vins et Spiritueux
 * @property string regimeFiscal0                   Facultatif      Régime Fiscal
 * @property int    nbCols0                         Facultatif      Nbre colis Qté exceptée
 * @property int    contenance0                     Facultatif      Contenance
 * @property int    volumeEnDroits0                 Facultatif      Volume en droits
 * @property int    noTitreMvtRefAdmin0             Facultatif      N° titre de mouvement
 * @property int    dureeTransport0                 Facultatif      Durée transport
 *
 * Colis a étiqueter
 * @property int    nosUmsAEtiqueter                Facultatif      Numero du colis à étiqueter


 */

class Shipment extends Model
{
    protected $impressionEtiquette;
    protected $typeImpressionEtiquette;
    protected $validationEnvoi;
    protected $suppressionSiEchecValidation;
    protected $impressionBordereau;
    protected $impressionRecapitulatif;
    protected $noRecepisse;
    protected $noSuivi;
    protected $Expédition;
    protected $horsSite;
    protected $codeSa;
    protected $codeClient;
    protected $codeProduit;
    protected $reference1;
    protected $reference2;
    protected $nomEnl;
    protected $adresse1Enl;
    protected $adresse2Enl;
    protected $codePostalEnl;
    protected $villeEnl;
    protected $codePaysEnl;
    protected $nomContactEnl;
    protected $emailEnl;
    protected $telFixeEnl;
    protected $indTelMobileEnl;
    protected $telMobileEnl;
    protected $codePorteEnl;
    protected $codeTiersEnl;
    protected $noEntrepositaireAgreeEnl;
    protected $dateDepartEnlevement;
    protected $periodePreferenceEnlevement;
    protected $instructionEnlevement;
    protected $nom;
    protected $adresse1;
    protected $adresse2;
    protected $codePostal;
    protected $ville;
    protected $codePays;
    protected $nomContact;
    protected $email;
    protected $telFixe;
    protected $indTelMobile;
    protected $telMobile;
    protected $codePorte;
    protected $codeTiers;
    protected $noEntrepositaireAgree;
    protected $particulier;
    protected $palette0;
    protected $paletteConsignee0;
    protected $quantite0;
    protected $poidsUnitaire0;
    protected $volumeUnitaire0;
    protected $longueurUnitaire0;
    protected $largeurUnitaire0;
    protected $hauteurUnitaire0;
    protected $referenceColis0;
    protected $poidsTotal;
    protected $volumeTotal;
    protected $longueurTotale;
    protected $largeurTotale;
    protected $hauteurTotale;
    protected $qteUniteTaxation;
    protected $codeUniteTaxation;
    protected $animauxPlumes;
    protected $optionLivraison;
    protected $codeSaBureauRestant;
    protected $idPointRelais;
    protected $dateLivraison;
    protected $instructionLivraison;
    protected $natureMarchandise;
    protected $montantValeurDeclaree;
    protected $codeDeviseValeurDeclaree;
    protected $montantContreRemboursement;
    protected $codeDeviseCodeContreRemboursement;
    protected $codeIncotermConditionLivraison;
    protected $sadSwap;
    protected $sadLivEtage;
    protected $sadMiseLieuUtil;
    protected $sadDepotage;
    protected $etage;
    protected $emailNotificationDestinataire;
    protected $smsNotificationDestinataire;
    protected $emailNotificationExpediteur;
    protected $emailConfirmationEnlevement;
    protected $emailPriseEnChargeEnlevement;
    protected $poidsQteLimiteeMD;
    protected $dangerEnvQteLimiteeMD;
    protected $nbColisQteExcepteeMD;
    protected $dangerEnvQteExcepteeMD;
    protected $noONU0;
    protected $groupeEmballage0;
    protected $classeADR0;
    protected $codeTypeEmballage0;
    protected $nbEmballages0;
    protected $nomTechnique0;
    protected $codeQuantite0;
    protected $dangerEnv0;
    protected $Spiritueux;
    protected $regimeFiscal0;
    protected $nbCols0;
    protected $contenance0;
    protected $volumeEnDroits0;
    protected $noTitreMvtRefAdmin0;
    protected $dureeTransport0;
    protected $étiqueter;
    protected $nosUmsAEtiqueter;


    /**
     * @return mixed
     */
    public function getImpressionEtiquette()
    {
        return $this->impressionEtiquette;
    }

    /**
     * @param mixed $impressionEtiquette
     *
     * @return self
     */
    public function setImpressionEtiquette($impressionEtiquette)
    {
        $this->impressionEtiquette = $impressionEtiquette;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypeImpressionEtiquette()
    {
        return $this->typeImpressionEtiquette;
    }

    /**
     * @param mixed $typeImpressionEtiquette
     *
     * @return self
     */
    public function setTypeImpressionEtiquette($typeImpressionEtiquette)
    {
        $this->typeImpressionEtiquette = $typeImpressionEtiquette;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValidationEnvoi()
    {
        return $this->validationEnvoi;
    }

    /**
     * @param mixed $validationEnvoi
     *
     * @return self
     */
    public function setValidationEnvoi($validationEnvoi)
    {
        $this->validationEnvoi = $validationEnvoi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuppressionSiEchecValidation()
    {
        return $this->suppressionSiEchecValidation;
    }

    /**
     * @param mixed $suppressionSiEchecValidation
     *
     * @return self
     */
    public function setSuppressionSiEchecValidation($suppressionSiEchecValidation)
    {
        $this->suppressionSiEchecValidation = $suppressionSiEchecValidation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImpressionBordereau()
    {
        return $this->impressionBordereau;
    }

    /**
     * @param mixed $impressionBordereau
     *
     * @return self
     */
    public function setImpressionBordereau($impressionBordereau)
    {
        $this->impressionBordereau = $impressionBordereau;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImpressionRecapitulatif()
    {
        return $this->impressionRecapitulatif;
    }

    /**
     * @param mixed $impressionRecapitulatif
     *
     * @return self
     */
    public function setImpressionRecapitulatif($impressionRecapitulatif)
    {
        $this->impressionRecapitulatif = $impressionRecapitulatif;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoRecepisse()
    {
        return $this->noRecepisse;
    }

    /**
     * @param mixed $noRecepisse
     *
     * @return self
     */
    public function setNoRecepisse($noRecepisse)
    {
        $this->noRecepisse = $noRecepisse;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoSuivi()
    {
        return $this->noSuivi;
    }

    /**
     * @param mixed $noSuivi
     *
     * @return self
     */
    public function setNoSuivi($noSuivi)
    {
        $this->noSuivi = $noSuivi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpédition()
    {
        return $this->Expédition;
    }

    /**
     * @param mixed $Expédition
     *
     * @return self
     */
    public function setExpédition($Expédition)
    {
        $this->Expédition = $Expédition;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorsSite()
    {
        return $this->horsSite;
    }

    /**
     * @param mixed $horsSite
     *
     * @return self
     */
    public function setHorsSite($horsSite)
    {
        $this->horsSite = $horsSite;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeSa()
    {
        return $this->codeSa;
    }

    /**
     * @param mixed $codeSa
     *
     * @return self
     */
    public function setCodeSa($codeSa)
    {
        $this->codeSa = $codeSa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeClient()
    {
        return $this->codeClient;
    }

    /**
     * @param mixed $codeClient
     *
     * @return self
     */
    public function setCodeClient($codeClient)
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeProduit()
    {
        return $this->codeProduit;
    }

    /**
     * @param mixed $codeProduit
     *
     * @return self
     */
    public function setCodeProduit($codeProduit)
    {
        $this->codeProduit = $codeProduit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference1()
    {
        return $this->reference1;
    }

    /**
     * @param mixed $reference1
     *
     * @return self
     */
    public function setReference1($reference1)
    {
        $this->reference1 = $reference1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference2()
    {
        return $this->reference2;
    }

    /**
     * @param mixed $reference2
     *
     * @return self
     */
    public function setReference2($reference2)
    {
        $this->reference2 = $reference2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomEnl()
    {
        return $this->nomEnl;
    }

    /**
     * @param mixed $nomEnl
     *
     * @return self
     */
    public function setNomEnl($nomEnl)
    {
        $this->nomEnl = $nomEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse1Enl()
    {
        return $this->adresse1Enl;
    }

    /**
     * @param mixed $adresse1Enl
     *
     * @return self
     */
    public function setAdresse1Enl($adresse1Enl)
    {
        $this->adresse1Enl = $adresse1Enl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse2Enl()
    {
        return $this->adresse2Enl;
    }

    /**
     * @param mixed $adresse2Enl
     *
     * @return self
     */
    public function setAdresse2Enl($adresse2Enl)
    {
        $this->adresse2Enl = $adresse2Enl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePostalEnl()
    {
        return $this->codePostalEnl;
    }

    /**
     * @param mixed $codePostalEnl
     *
     * @return self
     */
    public function setCodePostalEnl($codePostalEnl)
    {
        $this->codePostalEnl = $codePostalEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVilleEnl()
    {
        return $this->villeEnl;
    }

    /**
     * @param mixed $villeEnl
     *
     * @return self
     */
    public function setVilleEnl($villeEnl)
    {
        $this->villeEnl = $villeEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePaysEnl()
    {
        return $this->codePaysEnl;
    }

    /**
     * @param mixed $codePaysEnl
     *
     * @return self
     */
    public function setCodePaysEnl($codePaysEnl)
    {
        $this->codePaysEnl = $codePaysEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomContactEnl()
    {
        return $this->nomContactEnl;
    }

    /**
     * @param mixed $nomContactEnl
     *
     * @return self
     */
    public function setNomContactEnl($nomContactEnl)
    {
        $this->nomContactEnl = $nomContactEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailEnl()
    {
        return $this->emailEnl;
    }

    /**
     * @param mixed $emailEnl
     *
     * @return self
     */
    public function setEmailEnl($emailEnl)
    {
        $this->emailEnl = $emailEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelFixeEnl()
    {
        return $this->telFixeEnl;
    }

    /**
     * @param mixed $telFixeEnl
     *
     * @return self
     */
    public function setTelFixeEnl($telFixeEnl)
    {
        $this->telFixeEnl = $telFixeEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndTelMobileEnl()
    {
        return $this->indTelMobileEnl;
    }

    /**
     * @param mixed $indTelMobileEnl
     *
     * @return self
     */
    public function setIndTelMobileEnl($indTelMobileEnl)
    {
        $this->indTelMobileEnl = $indTelMobileEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelMobileEnl()
    {
        return $this->telMobileEnl;
    }

    /**
     * @param mixed $telMobileEnl
     *
     * @return self
     */
    public function setTelMobileEnl($telMobileEnl)
    {
        $this->telMobileEnl = $telMobileEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePorteEnl()
    {
        return $this->codePorteEnl;
    }

    /**
     * @param mixed $codePorteEnl
     *
     * @return self
     */
    public function setCodePorteEnl($codePorteEnl)
    {
        $this->codePorteEnl = $codePorteEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeTiersEnl()
    {
        return $this->codeTiersEnl;
    }

    /**
     * @param mixed $codeTiersEnl
     *
     * @return self
     */
    public function setCodeTiersEnl($codeTiersEnl)
    {
        $this->codeTiersEnl = $codeTiersEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoEntrepositaireAgreeEnl()
    {
        return $this->noEntrepositaireAgreeEnl;
    }

    /**
     * @param mixed $noEntrepositaireAgreeEnl
     *
     * @return self
     */
    public function setNoEntrepositaireAgreeEnl($noEntrepositaireAgreeEnl)
    {
        $this->noEntrepositaireAgreeEnl = $noEntrepositaireAgreeEnl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDepartEnlevement()
    {
        return $this->dateDepartEnlevement;
    }

    /**
     * @param mixed $dateDepartEnlevement
     *
     * @return self
     */
    public function setDateDepartEnlevement($dateDepartEnlevement)
    {
        $this->dateDepartEnlevement = $dateDepartEnlevement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodePreferenceEnlevement()
    {
        return $this->periodePreferenceEnlevement;
    }

    /**
     * @param mixed $periodePreferenceEnlevement
     *
     * @return self
     */
    public function setPeriodePreferenceEnlevement($periodePreferenceEnlevement)
    {
        $this->periodePreferenceEnlevement = $periodePreferenceEnlevement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstructionEnlevement()
    {
        return $this->instructionEnlevement;
    }

    /**
     * @param mixed $instructionEnlevement
     *
     * @return self
     */
    public function setInstructionEnlevement($instructionEnlevement)
    {
        $this->instructionEnlevement = $instructionEnlevement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse1()
    {
        return $this->adresse1;
    }

    /**
     * @param mixed $adresse1
     *
     * @return self
     */
    public function setAdresse1($adresse1)
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresse2()
    {
        return $this->adresse2;
    }

    /**
     * @param mixed $adresse2
     *
     * @return self
     */
    public function setAdresse2($adresse2)
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     *
     * @return self
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     *
     * @return self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePays()
    {
        return $this->codePays;
    }

    /**
     * @param mixed $codePays
     *
     * @return self
     */
    public function setCodePays($codePays)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomContact()
    {
        return $this->nomContact;
    }

    /**
     * @param mixed $nomContact
     *
     * @return self
     */
    public function setNomContact($nomContact)
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * @param mixed $telFixe
     *
     * @return self
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIndTelMobile()
    {
        return $this->indTelMobile;
    }

    /**
     * @param mixed $indTelMobile
     *
     * @return self
     */
    public function setIndTelMobile($indTelMobile)
    {
        $this->indTelMobile = $indTelMobile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelMobile()
    {
        return $this->telMobile;
    }

    /**
     * @param mixed $telMobile
     *
     * @return self
     */
    public function setTelMobile($telMobile)
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodePorte()
    {
        return $this->codePorte;
    }

    /**
     * @param mixed $codePorte
     *
     * @return self
     */
    public function setCodePorte($codePorte)
    {
        $this->codePorte = $codePorte;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeTiers()
    {
        return $this->codeTiers;
    }

    /**
     * @param mixed $codeTiers
     *
     * @return self
     */
    public function setCodeTiers($codeTiers)
    {
        $this->codeTiers = $codeTiers;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoEntrepositaireAgree()
    {
        return $this->noEntrepositaireAgree;
    }

    /**
     * @param mixed $noEntrepositaireAgree
     *
     * @return self
     */
    public function setNoEntrepositaireAgree($noEntrepositaireAgree)
    {
        $this->noEntrepositaireAgree = $noEntrepositaireAgree;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParticulier()
    {
        return $this->particulier;
    }

    /**
     * @param mixed $particulier
     *
     * @return self
     */
    public function setParticulier($particulier)
    {
        $this->particulier = $particulier;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPalette0()
    {
        return $this->palette0;
    }

    /**
     * @param mixed $palette0
     *
     * @return self
     */
    public function setPalette0($palette0)
    {
        $this->palette0 = $palette0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaletteConsignee0()
    {
        return $this->paletteConsignee0;
    }

    /**
     * @param mixed $paletteConsignee0
     *
     * @return self
     */
    public function setPaletteConsignee0($paletteConsignee0)
    {
        $this->paletteConsignee0 = $paletteConsignee0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantite0()
    {
        return $this->quantite0;
    }

    /**
     * @param mixed $quantite0
     *
     * @return self
     */
    public function setQuantite0($quantite0)
    {
        $this->quantite0 = $quantite0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoidsUnitaire0()
    {
        return $this->poidsUnitaire0;
    }

    /**
     * @param mixed $poidsUnitaire0
     *
     * @return self
     */
    public function setPoidsUnitaire0($poidsUnitaire0)
    {
        $this->poidsUnitaire0 = $poidsUnitaire0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolumeUnitaire0()
    {
        return $this->volumeUnitaire0;
    }

    /**
     * @param mixed $volumeUnitaire0
     *
     * @return self
     */
    public function setVolumeUnitaire0($volumeUnitaire0)
    {
        $this->volumeUnitaire0 = $volumeUnitaire0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongueurUnitaire0()
    {
        return $this->longueurUnitaire0;
    }

    /**
     * @param mixed $longueurUnitaire0
     *
     * @return self
     */
    public function setLongueurUnitaire0($longueurUnitaire0)
    {
        $this->longueurUnitaire0 = $longueurUnitaire0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLargeurUnitaire0()
    {
        return $this->largeurUnitaire0;
    }

    /**
     * @param mixed $largeurUnitaire0
     *
     * @return self
     */
    public function setLargeurUnitaire0($largeurUnitaire0)
    {
        $this->largeurUnitaire0 = $largeurUnitaire0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHauteurUnitaire0()
    {
        return $this->hauteurUnitaire0;
    }

    /**
     * @param mixed $hauteurUnitaire0
     *
     * @return self
     */
    public function setHauteurUnitaire0($hauteurUnitaire0)
    {
        $this->hauteurUnitaire0 = $hauteurUnitaire0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceColis0()
    {
        return $this->referenceColis0;
    }

    /**
     * @param mixed $referenceColis0
     *
     * @return self
     */
    public function setReferenceColis0($referenceColis0)
    {
        $this->referenceColis0 = $referenceColis0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoidsTotal()
    {
        return $this->poidsTotal;
    }

    /**
     * @param mixed $poidsTotal
     *
     * @return self
     */
    public function setPoidsTotal($poidsTotal)
    {
        $this->poidsTotal = $poidsTotal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolumeTotal()
    {
        return $this->volumeTotal;
    }

    /**
     * @param mixed $volumeTotal
     *
     * @return self
     */
    public function setVolumeTotal($volumeTotal)
    {
        $this->volumeTotal = $volumeTotal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongueurTotale()
    {
        return $this->longueurTotale;
    }

    /**
     * @param mixed $longueurTotale
     *
     * @return self
     */
    public function setLongueurTotale($longueurTotale)
    {
        $this->longueurTotale = $longueurTotale;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLargeurTotale()
    {
        return $this->largeurTotale;
    }

    /**
     * @param mixed $largeurTotale
     *
     * @return self
     */
    public function setLargeurTotale($largeurTotale)
    {
        $this->largeurTotale = $largeurTotale;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHauteurTotale()
    {
        return $this->hauteurTotale;
    }

    /**
     * @param mixed $hauteurTotale
     *
     * @return self
     */
    public function setHauteurTotale($hauteurTotale)
    {
        $this->hauteurTotale = $hauteurTotale;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQteUniteTaxation()
    {
        return $this->qteUniteTaxation;
    }

    /**
     * @param mixed $qteUniteTaxation
     *
     * @return self
     */
    public function setQteUniteTaxation($qteUniteTaxation)
    {
        $this->qteUniteTaxation = $qteUniteTaxation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeUniteTaxation()
    {
        return $this->codeUniteTaxation;
    }

    /**
     * @param mixed $codeUniteTaxation
     *
     * @return self
     */
    public function setCodeUniteTaxation($codeUniteTaxation)
    {
        $this->codeUniteTaxation = $codeUniteTaxation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnimauxPlumes()
    {
        return $this->animauxPlumes;
    }

    /**
     * @param mixed $animauxPlumes
     *
     * @return self
     */
    public function setAnimauxPlumes($animauxPlumes)
    {
        $this->animauxPlumes = $animauxPlumes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptionLivraison()
    {
        return $this->optionLivraison;
    }

    /**
     * @param mixed $optionLivraison
     *
     * @return self
     */
    public function setOptionLivraison($optionLivraison)
    {
        $this->optionLivraison = $optionLivraison;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeSaBureauRestant()
    {
        return $this->codeSaBureauRestant;
    }

    /**
     * @param mixed $codeSaBureauRestant
     *
     * @return self
     */
    public function setCodeSaBureauRestant($codeSaBureauRestant)
    {
        $this->codeSaBureauRestant = $codeSaBureauRestant;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPointRelais()
    {
        return $this->idPointRelais;
    }

    /**
     * @param mixed $idPointRelais
     *
     * @return self
     */
    public function setIdPointRelais($idPointRelais)
    {
        $this->idPointRelais = $idPointRelais;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    /**
     * @param mixed $dateLivraison
     *
     * @return self
     */
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstructionLivraison()
    {
        return $this->instructionLivraison;
    }

    /**
     * @param mixed $instructionLivraison
     *
     * @return self
     */
    public function setInstructionLivraison($instructionLivraison)
    {
        $this->instructionLivraison = $instructionLivraison;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNatureMarchandise()
    {
        return $this->natureMarchandise;
    }

    /**
     * @param mixed $natureMarchandise
     *
     * @return self
     */
    public function setNatureMarchandise($natureMarchandise)
    {
        $this->natureMarchandise = $natureMarchandise;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMontantValeurDeclaree()
    {
        return $this->montantValeurDeclaree;
    }

    /**
     * @param mixed $montantValeurDeclaree
     *
     * @return self
     */
    public function setMontantValeurDeclaree($montantValeurDeclaree)
    {
        $this->montantValeurDeclaree = $montantValeurDeclaree;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeDeviseValeurDeclaree()
    {
        return $this->codeDeviseValeurDeclaree;
    }

    /**
     * @param mixed $codeDeviseValeurDeclaree
     *
     * @return self
     */
    public function setCodeDeviseValeurDeclaree($codeDeviseValeurDeclaree)
    {
        $this->codeDeviseValeurDeclaree = $codeDeviseValeurDeclaree;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMontantContreRemboursement()
    {
        return $this->montantContreRemboursement;
    }

    /**
     * @param mixed $montantContreRemboursement
     *
     * @return self
     */
    public function setMontantContreRemboursement($montantContreRemboursement)
    {
        $this->montantContreRemboursement = $montantContreRemboursement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeDeviseCodeContreRemboursement()
    {
        return $this->codeDeviseCodeContreRemboursement;
    }

    /**
     * @param mixed $codeDeviseCodeContreRemboursement
     *
     * @return self
     */
    public function setCodeDeviseCodeContreRemboursement($codeDeviseCodeContreRemboursement)
    {
        $this->codeDeviseCodeContreRemboursement = $codeDeviseCodeContreRemboursement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeIncotermConditionLivraison()
    {
        return $this->codeIncotermConditionLivraison;
    }

    /**
     * @param mixed $codeIncotermConditionLivraison
     *
     * @return self
     */
    public function setCodeIncotermConditionLivraison($codeIncotermConditionLivraison)
    {
        $this->codeIncotermConditionLivraison = $codeIncotermConditionLivraison;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSadSwap()
    {
        return $this->sadSwap;
    }

    /**
     * @param mixed $sadSwap
     *
     * @return self
     */
    public function setSadSwap($sadSwap)
    {
        $this->sadSwap = $sadSwap;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSadLivEtage()
    {
        return $this->sadLivEtage;
    }

    /**
     * @param mixed $sadLivEtage
     *
     * @return self
     */
    public function setSadLivEtage($sadLivEtage)
    {
        $this->sadLivEtage = $sadLivEtage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSadMiseLieuUtil()
    {
        return $this->sadMiseLieuUtil;
    }

    /**
     * @param mixed $sadMiseLieuUtil
     *
     * @return self
     */
    public function setSadMiseLieuUtil($sadMiseLieuUtil)
    {
        $this->sadMiseLieuUtil = $sadMiseLieuUtil;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSadDepotage()
    {
        return $this->sadDepotage;
    }

    /**
     * @param mixed $sadDepotage
     *
     * @return self
     */
    public function setSadDepotage($sadDepotage)
    {
        $this->sadDepotage = $sadDepotage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * @param mixed $etage
     *
     * @return self
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailNotificationDestinataire()
    {
        return $this->emailNotificationDestinataire;
    }

    /**
     * @param mixed $emailNotificationDestinataire
     *
     * @return self
     */
    public function setEmailNotificationDestinataire($emailNotificationDestinataire)
    {
        $this->emailNotificationDestinataire = $emailNotificationDestinataire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSmsNotificationDestinataire()
    {
        return $this->smsNotificationDestinataire;
    }

    /**
     * @param mixed $smsNotificationDestinataire
     *
     * @return self
     */
    public function setSmsNotificationDestinataire($smsNotificationDestinataire)
    {
        $this->smsNotificationDestinataire = $smsNotificationDestinataire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailNotificationExpediteur()
    {
        return $this->emailNotificationExpediteur;
    }

    /**
     * @param mixed $emailNotificationExpediteur
     *
     * @return self
     */
    public function setEmailNotificationExpediteur($emailNotificationExpediteur)
    {
        $this->emailNotificationExpediteur = $emailNotificationExpediteur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailConfirmationEnlevement()
    {
        return $this->emailConfirmationEnlevement;
    }

    /**
     * @param mixed $emailConfirmationEnlevement
     *
     * @return self
     */
    public function setEmailConfirmationEnlevement($emailConfirmationEnlevement)
    {
        $this->emailConfirmationEnlevement = $emailConfirmationEnlevement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailPriseEnChargeEnlevement()
    {
        return $this->emailPriseEnChargeEnlevement;
    }

    /**
     * @param mixed $emailPriseEnChargeEnlevement
     *
     * @return self
     */
    public function setEmailPriseEnChargeEnlevement($emailPriseEnChargeEnlevement)
    {
        $this->emailPriseEnChargeEnlevement = $emailPriseEnChargeEnlevement;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoidsQteLimiteeMD()
    {
        return $this->poidsQteLimiteeMD;
    }

    /**
     * @param mixed $poidsQteLimiteeMD
     *
     * @return self
     */
    public function setPoidsQteLimiteeMD($poidsQteLimiteeMD)
    {
        $this->poidsQteLimiteeMD = $poidsQteLimiteeMD;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDangerEnvQteLimiteeMD()
    {
        return $this->dangerEnvQteLimiteeMD;
    }

    /**
     * @param mixed $dangerEnvQteLimiteeMD
     *
     * @return self
     */
    public function setDangerEnvQteLimiteeMD($dangerEnvQteLimiteeMD)
    {
        $this->dangerEnvQteLimiteeMD = $dangerEnvQteLimiteeMD;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbColisQteExcepteeMD()
    {
        return $this->nbColisQteExcepteeMD;
    }

    /**
     * @param mixed $nbColisQteExcepteeMD
     *
     * @return self
     */
    public function setNbColisQteExcepteeMD($nbColisQteExcepteeMD)
    {
        $this->nbColisQteExcepteeMD = $nbColisQteExcepteeMD;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDangerEnvQteExcepteeMD()
    {
        return $this->dangerEnvQteExcepteeMD;
    }

    /**
     * @param mixed $dangerEnvQteExcepteeMD
     *
     * @return self
     */
    public function setDangerEnvQteExcepteeMD($dangerEnvQteExcepteeMD)
    {
        $this->dangerEnvQteExcepteeMD = $dangerEnvQteExcepteeMD;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoONU0()
    {
        return $this->noONU0;
    }

    /**
     * @param mixed $noONU0
     *
     * @return self
     */
    public function setNoONU0($noONU0)
    {
        $this->noONU0 = $noONU0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupeEmballage0()
    {
        return $this->groupeEmballage0;
    }

    /**
     * @param mixed $groupeEmballage0
     *
     * @return self
     */
    public function setGroupeEmballage0($groupeEmballage0)
    {
        $this->groupeEmballage0 = $groupeEmballage0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClasseADR0()
    {
        return $this->classeADR0;
    }

    /**
     * @param mixed $classeADR0
     *
     * @return self
     */
    public function setClasseADR0($classeADR0)
    {
        $this->classeADR0 = $classeADR0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeTypeEmballage0()
    {
        return $this->codeTypeEmballage0;
    }

    /**
     * @param mixed $codeTypeEmballage0
     *
     * @return self
     */
    public function setCodeTypeEmballage0($codeTypeEmballage0)
    {
        $this->codeTypeEmballage0 = $codeTypeEmballage0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbEmballages0()
    {
        return $this->nbEmballages0;
    }

    /**
     * @param mixed $nbEmballages0
     *
     * @return self
     */
    public function setNbEmballages0($nbEmballages0)
    {
        $this->nbEmballages0 = $nbEmballages0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomTechnique0()
    {
        return $this->nomTechnique0;
    }

    /**
     * @param mixed $nomTechnique0
     *
     * @return self
     */
    public function setNomTechnique0($nomTechnique0)
    {
        $this->nomTechnique0 = $nomTechnique0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodeQuantite0()
    {
        return $this->codeQuantite0;
    }

    /**
     * @param mixed $codeQuantite0
     *
     * @return self
     */
    public function setCodeQuantite0($codeQuantite0)
    {
        $this->codeQuantite0 = $codeQuantite0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDangerEnv0()
    {
        return $this->dangerEnv0;
    }

    /**
     * @param mixed $dangerEnv0
     *
     * @return self
     */
    public function setDangerEnv0($dangerEnv0)
    {
        $this->dangerEnv0 = $dangerEnv0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpiritueux()
    {
        return $this->Spiritueux;
    }

    /**
     * @param mixed $Spiritueux
     *
     * @return self
     */
    public function setSpiritueux($Spiritueux)
    {
        $this->Spiritueux = $Spiritueux;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegimeFiscal0()
    {
        return $this->regimeFiscal0;
    }

    /**
     * @param mixed $regimeFiscal0
     *
     * @return self
     */
    public function setRegimeFiscal0($regimeFiscal0)
    {
        $this->regimeFiscal0 = $regimeFiscal0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbCols0()
    {
        return $this->nbCols0;
    }

    /**
     * @param mixed $nbCols0
     *
     * @return self
     */
    public function setNbCols0($nbCols0)
    {
        $this->nbCols0 = $nbCols0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContenance0()
    {
        return $this->contenance0;
    }

    /**
     * @param mixed $contenance0
     *
     * @return self
     */
    public function setContenance0($contenance0)
    {
        $this->contenance0 = $contenance0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolumeEnDroits0()
    {
        return $this->volumeEnDroits0;
    }

    /**
     * @param mixed $volumeEnDroits0
     *
     * @return self
     */
    public function setVolumeEnDroits0($volumeEnDroits0)
    {
        $this->volumeEnDroits0 = $volumeEnDroits0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoTitreMvtRefAdmin0()
    {
        return $this->noTitreMvtRefAdmin0;
    }

    /**
     * @param mixed $noTitreMvtRefAdmin0
     *
     * @return self
     */
    public function setNoTitreMvtRefAdmin0($noTitreMvtRefAdmin0)
    {
        $this->noTitreMvtRefAdmin0 = $noTitreMvtRefAdmin0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDureeTransport0()
    {
        return $this->dureeTransport0;
    }

    /**
     * @param mixed $dureeTransport0
     *
     * @return self
     */
    public function setDureeTransport0($dureeTransport0)
    {
        $this->dureeTransport0 = $dureeTransport0;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getÉtiqueter()
    {
        return $this->étiqueter;
    }

    /**
     * @param mixed $étiqueter
     *
     * @return self
     */
    public function setÉtiqueter($étiqueter)
    {
        $this->étiqueter = $étiqueter;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNosUmsAEtiqueter()
    {
        return $this->nosUmsAEtiqueter;
    }

    /**
     * @param mixed $nosUmsAEtiqueter
     *
     * @return self
     */
    public function setNosUmsAEtiqueter($nosUmsAEtiqueter)
    {
        $this->nosUmsAEtiqueter = $nosUmsAEtiqueter;

        return $this;
    }
}
