<?php
declare(strict_types=1);

namespace GeodisBundle\Domain;

use GeodisBundle\Domain\Base\Model;

/**
 * Class ListEnvoi.
 * @property bool   horsSite                        Facultatif      Expédition depuis un autre site
 * @property int    codeSa                          Obligatoire     Code Agence GEODIS  001044
 * @property int    codeClient                      Obligatoire     Compte facturation client   074777 ou 074535
 * @property string codeProduit                     Obligatoire     Code prestation commerciale ATK ou CXI
 * @property string reference1                      Facultatif      Référence 1 client
 * @property string reference2                      Facultatif      Référence 2  client
 * @property string dateDepartEnlevement            Obligatoire     YYYY/MM/DD  Date de départ  J-30 à J+30
 * @property int    noRecepisse                     Facultatif      Numéro de cérépissé GEODIS  Défini par l'application et renvoyé dans la réponse. A renseigner si modification sur une Expédition
 * @property int    noSuivi                         Facultatif      Numéro de Suivi GEODIS  Défini par l'application et renvoyé dans la réponse. A renseigner si modification sur une Expédition
 * @property int    poidsTotal                      Facultatif      Poids total Expédition  Obligatoire si poids unitaire non renseigné
 * @property int    volumeTotal                     Facultatif      Volume total Expédition
 * @property int    longueurTotale                  Facultatif      Longueur total Expédition
 * @property int    largeurTotale                   Facultatif      Largeur Totale Expédition
 * @property int    hauteurTotale                   Facultatif      Hauteur totale Expédition
 * @property bool   animauxPlumes                   Facultatif      Animaux à plumes
 * @property string optionLivraison                 Facultatif      BRT / RDW / RDT / DSL / SAM Facultatif      Options à la livraison
 * @property int    codeSaBureauRestant             Facultatif      Code agence GEODIS de livraison A renseigner si option livraison= BRT
 * @property int    idPointRelais                   Facultatif      Identifiant du Point relais de livraison    A renseigner si code produit= RCX
 * @property string dateLivraison                   Facultatif      YYYY/MM/DD  Date souhaitée de livraison Contrôle sur calendrier Espace
 * @property string instructionEnlevement           Facultatif      Instructions à l'Enlèvement
 * @property string instructionLivraison            Facultatif      Instructions à la livraison
 * @property string periodePreferenceEnlevement     Facultatif      MAT / APM   Facultatif  MAT: Matin APM: Après-midi  Créneau Enlèvement
 * @property string natureMarchandise               Facultatif      Nature de marchandise
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
 * @property int    poidsQteLimiteeMD               Facultatif      Poids qté limitée MD
 * @property int    dangerEnvQteLimiteeMD           Facultatif      Poids Qté exceptée MD
 * @property int    nbColisQteExcepteeMD            Facultatif      Nbre colis Qté exceptée
 * @property bool   dangerEnvQteExcepteeMD          Facultatif      Produit dangereux pour l'environnement
 * @property int    nosUmsAEtiqueter                Facultatif      Numero du colis à étiqueter
 * @property array  destinataire					Obligatoire		Array of destinataire datas
 * @property array  expediteur						Obligatoire		Array of expediteur datas
 * @property array  listUmgs 						Obligatoire		Array of shipping datas
 *
 *
 * * // Not sure where the following propreties go \\
 * Donnée Expédition
 * @property int    qteUniteTaxation                Facultatif      Quantité unité de taxation
 * @property int    codeUniteTaxation               Facultatif      Code unité taxation
 * @property int    montantValeurDeclaree           Facultatif      Montant de la Valeur déclarée
 * @property int    codeDeviseValeurDeclaree        Facultatif      Code devise pour la Valeur déclarée Contrôle sur devise espace
 * @property int    montantContreRemboursement      Facultatif      Montant du Contre-remboursement
 * @property int    codeDeviseCodeContreRemboursement Facultatif    Code devise du Contre-remboursement Contrôle sur devise espace
 *
 * Matières Dangereuses
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
 */

class ListEnvoi extends Model
{
    protected $horsSite;
    protected $codeSa;
    protected $codeClient;
    protected $codeProduit;
    protected $reference1;
    protected $reference2;
    protected $dateDepartEnlevement;
    protected $noRecepisse;
    protected $noSuivi;
    protected $poidsTotal;
    protected $volumeTotal;
    protected $longueurTotale;
    protected $largeurTotale;
    protected $hauteurTotale;
    protected $animauxPlumes;
    protected $optionLivraison;
    protected $codeSaBureauRestant;
    protected $idPointRelais;
    protected $dateLivraison;
    protected $instructionEnlevement;
    protected $instructionLivraison;
    protected $periodePreferenceEnlevement;
    protected $natureMarchandise;
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
    protected $nosUmsAEtiqueter;
    protected $destinataire;
    protected $expediteur;
    protected $listUmgs;

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
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * @param mixed $destinataire
     *
     * @return self
     */
    public function setDestinataire($destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

    /**
     * @param mixed $expediteur
     *
     * @return self
     */
    public function setExpediteur($expediteur)
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getListUmgs()
    {
        return $this->listUmgs;
    }

    /**
     * @param mixed $listUmgs
     *
     * @return self
     */
    public function setListUmgs($listUmgs)
    {
        $this->listUmgs = $listUmgs;

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
