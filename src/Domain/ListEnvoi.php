<?php
declare(strict_types=1);

namespace GeodisBundle\Domain;

use GeodisBundle\Domain\Base\Model;

/**
 * Class ListEnvoi.
 * codeClient                               Compte facturation client 074777 ou 074535
 * codeProduit                              Code prestation commerciale ATK ou CXI
 * codeSa                                   Code Agence GEODIS001044
 * dateDepartEnlevement                     YYYY/MM/DDDate de départJ-30 à J+30
 * destinataire                             Array of destinataire datas
 * expediteur                               Array of expediteur datas
 * listUmgs                                 Array of shipping datas
 * codeIncotermConditionLivraison           Code incoterm   Contrôle sur code incoterm espece
 * dangerEnvQteExcepteeMD                   Produit dangereux pour l'environnement
 * emailNotificationDestinataire            Adresse mail pour la notification mail au destinataire Obligatoire si option à la livraison= RDW
 * emailPriseEnChargeEnlevement             Adresse mail destinataire pour la prise en charge d'enlèvement
 * horsSite                                 Expédition depuis un autre site
 * instructionLivraison                     Instructions à la livraison
 * longueurTotale                           Longueur total Expédition
 * nbColisQteExcepteeMD                     Nbre colis Qté exceptée
 * nosUmsAEtiqueter                         Numero du colis à étiqueter
 * poidsTotal                               Poids total ExpéditionObligatoire si poids unitaire non renseigné
 * reference1                               Référence 1 client
 * reference2                               Référence 2client
 * animauxPlumes                            Animaux à plumes
 * codeSaBureauRestant                      Code agence GEODIS de livraison A renseigner si option livraison= BRT
 * dangerEnvQteLimiteeMD                    Poids Qté exceptée MD
 * dateLivraison                            YYYY/MM/DDDate souhaitée de livraison Contrôle sur calendrier Espace
 * emailConfirmationEnlevement              Adresse mail destinataire pour la confirmation d'enlèvement
 * emailNotificationExpediteur              Adresse mail destinataire pour la notification mail au destinataire
 * etage                                    Numéro d'étageObligatoire si Montée à l'etage= true
 * hauteurTotale                            Hauteur totale Expédition
 * idPointRelais                            Identifiant du Point    relais de livraison    A renseigner si code produit= RCX
 * instructionEnlevement                    Instructions à l'Enlèvement
 * largeurTotale                            Largeur Totale Expédition
 * natureMarchandise                        Nature de marchandise
 * noRecepisse                              Numéro de cérépissé GEODIS Défini par l'application et renvoyé dans la réponse. A renseigner si modification sur une Expédition
 * noSuivi                                  Numéro de Suivi GEODIS Défini par l'application et renvoyé dans la réponse. A renseigner si modification sur une Expédition
 * optionLivraison                          BRT / RDW / RDT / DSL / SAM Facultatif    Options à la livraison
 * periodePreferenceEnlevement              MAT / APM FacultatifMAT: Matin APM: Après-midiCréneau Enlèvement
 * poidsQteLimiteeMD                        Poids qté limitée MD
 * sadDepotage                              Service dépotage    Contrôle si service autorisé sur fiche client
 * sadLivEtage                              Service livraison à l'étage Contrôle si service autorisé sur fiche client
 * sadMiseLieuUtil                          Service mise en lieu d'utilisationContrôle si service autorisé sur fiche client
 * sadSwap                                  Service echange simple
 * smsNotificationDestinataire              Numéro portable pour la notification SMS au destinataire
 * volumeTotal                              Volume total Expédition
 *
 * * // Not sure where the following propreties go \\
 * Donnée Expédition
 * int    qteUniteTaxation                Facultatif      Quantité unité de taxation
 * int    codeUniteTaxation               Facultatif      Code unité taxation
 * int    montantValeurDeclaree           Facultatif      Montant de la Valeur déclarée
 * int    codeDeviseValeurDeclaree        Facultatif      Code devise pour la Valeur déclarée Contrôle sur devise espace
 * int    montantContreRemboursement      Facultatif      Montant du Contre-remboursement
 * int    codeDeviseCodeContreRemboursement Facultatif    Code devise du Contre-remboursement Contrôle sur devise espace
 *
 * Matières Dangereuses
 * int    noONU0                          Facultatif      Numéro ONU
 * int    groupeEmballage0                Facultatif      Groupe d'emballage
 * int    classeADR0                      Facultatif      Classe ADR
 * string codeTypeEmballage0              Facultatif      Type emballage
 * int    nbEmballages0                   Facultatif      Nbre d'emballage
 * string nomTechnique0                   Facultatif      Nom technique
 * string codeQuantite0                   Facultatif      Unité
 * int    quantite0                       Facultatif      Qté
 * bool   dangerEnv0                      Facultatif      Produit dangereux pour l'environnement
 *
 * Vins et Spiritueux
 * string regimeFiscal0                   Facultatif      Régime Fiscal
 * int    nbCols0                         Facultatif      Nbre colis Qté exceptée
 * int    contenance0                     Facultatif      Contenance
 * int    volumeEnDroits0                 Facultatif      Volume en droits
 * int    noTitreMvtRefAdmin0             Facultatif      N° titre de mouvement
 * int    dureeTransport0                 Facultatif      Durée transport
 */

class ListEnvoi extends Model
{
    public string $codeClient;
    public string $codeProduit;
    public string $codeSa;
    public string $dateDepartEnlevement;
    public array $destinataire;
    public array $expediteur;
    public array $listUmgs;
    public ?bool $animauxPlumes = null;
    public ?int $codeIncotermConditionLivraison = null;
    public ?int $codeSaBureauRestant = null;
    public ?bool $dangerEnvQteExcepteeMD = null;
    public ?int $dangerEnvQteLimiteeMD = null;
    public ?string $dateLivraison = null;
    public ?string $emailConfirmationEnlevement = null;
    public ?string $emailNotificationDestinataire = null;
    public ?string $emailNotificationExpediteur = null;
    public ?string $emailPriseEnChargeEnlevement = null;
    public ?int $etage = null;
    public ?int $hauteurTotale = null;
    public ?bool $horsSite = null;
    public ?int $idPointRelais = null;
    public ?string $instructionEnlevement = null;
    public ?string $instructionLivraison = null;
    public ?int $largeurTotale = null;
    public ?int $longueurTotale = null;
    public ?string $natureMarchandise = null;
    public ?int $nbColisQteExcepteeMD = null;
    public ?int $noRecepisse = null;
    public ?int $noSuivi = null;
    public ?int $nosUmsAEtiqueter = null;
    public ?string $optionLivraison = null;
    public ?string $periodePreferenceEnlevement = null;
    public ?int $poidsQteLimiteeMD = null;
    public ?int $poidsTotal = null;
    public ?string $reference1 = null;
    public ?string $reference2 = null;
    public ?bool $sadDepotage = null;
    public ?bool $sadLivEtage = null;
    public ?bool $sadMiseLieuUtil = null;
    public ?bool $sadSwap = null;
    public ?string $smsNotificationDestinataire = null;
    public ?int $volumeTotal = null;

    public function getCodeClient(): string
    {
        return $this->codeClient;
    }

    public function setCodeClient(string $codeClient): void
    {
        $this->codeClient = $codeClient;
    }

    public function getCodeProduit(): string
    {
        return $this->codeProduit;
    }

    public function setCodeProduit(string $codeProduit): void
    {
        $this->codeProduit = $codeProduit;
    }

    public function getCodeSa(): string
    {
        return $this->codeSa;
    }

    public function setCodeSa(string $codeSa): void
    {
        $this->codeSa = $codeSa;
    }

    public function getDateDepartEnlevement(): string
    {
        return $this->dateDepartEnlevement;
    }

    public function setDateDepartEnlevement(string $dateDepartEnlevement): void
    {
        $this->dateDepartEnlevement = $dateDepartEnlevement;
    }

    public function getDestinataire(): array
    {
        return $this->destinataire;
    }

    public function setDestinataire(array $destinataire): void
    {
        $this->destinataire = $destinataire;
    }

    public function getExpediteur(): array
    {
        return $this->expediteur;
    }

    public function setExpediteur(array $expediteur): void
    {
        $this->expediteur = $expediteur;
    }

    public function getListUmgs(): array
    {
        return $this->listUmgs;
    }

    public function setListUmgs(array $listUmgs): void
    {
        $this->listUmgs = $listUmgs;
    }

    public function getAnimauxPlumes(): ?bool
    {
        return $this->animauxPlumes;
    }

    public function setAnimauxPlumes(?bool $animauxPlumes): void
    {
        $this->animauxPlumes = $animauxPlumes;
    }

    public function getCodeIncotermConditionLivraison(): ?int
    {
        return $this->codeIncotermConditionLivraison;
    }

    public function setCodeIncotermConditionLivraison(?int $codeIncotermConditionLivraison): void
    {
        $this->codeIncotermConditionLivraison = $codeIncotermConditionLivraison;
    }

    public function getCodeSaBureauRestant(): ?int
    {
        return $this->codeSaBureauRestant;
    }

    public function setCodeSaBureauRestant(?int $codeSaBureauRestant): void
    {
        $this->codeSaBureauRestant = $codeSaBureauRestant;
    }

    public function getDangerEnvQteExcepteeMD(): ?bool
    {
        return $this->dangerEnvQteExcepteeMD;
    }

    public function setDangerEnvQteExcepteeMD(?bool $dangerEnvQteExcepteeMD): void
    {
        $this->dangerEnvQteExcepteeMD = $dangerEnvQteExcepteeMD;
    }

    public function getDangerEnvQteLimiteeMD(): ?int
    {
        return $this->dangerEnvQteLimiteeMD;
    }

    public function setDangerEnvQteLimiteeMD(?int $dangerEnvQteLimiteeMD): void
    {
        $this->dangerEnvQteLimiteeMD = $dangerEnvQteLimiteeMD;
    }

    public function getDateLivraison(): ?string
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(?string $dateLivraison): void
    {
        $this->dateLivraison = $dateLivraison;
    }

    public function getEmailConfirmationEnlevement(): ?string
    {
        return $this->emailConfirmationEnlevement;
    }

    public function setEmailConfirmationEnlevement(?string $emailConfirmationEnlevement): void
    {
        $this->emailConfirmationEnlevement = $emailConfirmationEnlevement;
    }

    public function getEmailNotificationDestinataire(): ?string
    {
        return $this->emailNotificationDestinataire;
    }

    public function setEmailNotificationDestinataire(?string $emailNotificationDestinataire): void
    {
        $this->emailNotificationDestinataire = $emailNotificationDestinataire;
    }

    public function getEmailNotificationExpediteur(): ?string
    {
        return $this->emailNotificationExpediteur;
    }

    public function setEmailNotificationExpediteur(?string $emailNotificationExpediteur): void
    {
        $this->emailNotificationExpediteur = $emailNotificationExpediteur;
    }

    public function getEmailPriseEnChargeEnlevement(): ?string
    {
        return $this->emailPriseEnChargeEnlevement;
    }

    public function setEmailPriseEnChargeEnlevement(?string $emailPriseEnChargeEnlevement): void
    {
        $this->emailPriseEnChargeEnlevement = $emailPriseEnChargeEnlevement;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): void
    {
        $this->etage = $etage;
    }

    public function getHauteurTotale(): ?int
    {
        return $this->hauteurTotale;
    }

    public function setHauteurTotale(?int $hauteurTotale): void
    {
        $this->hauteurTotale = $hauteurTotale;
    }

    public function getHorsSite(): ?bool
    {
        return $this->horsSite;
    }

    public function setHorsSite(?bool $horsSite): void
    {
        $this->horsSite = $horsSite;
    }

    public function getIdPointRelais(): ?int
    {
        return $this->idPointRelais;
    }

    public function setIdPointRelais(?int $idPointRelais): void
    {
        $this->idPointRelais = $idPointRelais;
    }

    public function getInstructionEnlevement(): ?string
    {
        return $this->instructionEnlevement;
    }

    public function setInstructionEnlevement(?string $instructionEnlevement): void
    {
        $this->instructionEnlevement = $instructionEnlevement;
    }

    public function getInstructionLivraison(): ?string
    {
        return $this->instructionLivraison;
    }

    public function setInstructionLivraison(?string $instructionLivraison): void
    {
        $this->instructionLivraison = $instructionLivraison;
    }

    public function getLargeurTotale(): ?int
    {
        return $this->largeurTotale;
    }

    public function setLargeurTotale(?int $largeurTotale): void
    {
        $this->largeurTotale = $largeurTotale;
    }

    public function getLongueurTotale(): ?int
    {
        return $this->longueurTotale;
    }

    public function setLongueurTotale(?int $longueurTotale): void
    {
        $this->longueurTotale = $longueurTotale;
    }

    public function getNatureMarchandise(): ?string
    {
        return $this->natureMarchandise;
    }

    public function setNatureMarchandise(?string $natureMarchandise): void
    {
        $this->natureMarchandise = $natureMarchandise;
    }

    public function getNbColisQteExcepteeMD(): ?int
    {
        return $this->nbColisQteExcepteeMD;
    }

    public function setNbColisQteExcepteeMD(?int $nbColisQteExcepteeMD): void
    {
        $this->nbColisQteExcepteeMD = $nbColisQteExcepteeMD;
    }

    public function getNoRecepisse(): ?int
    {
        return $this->noRecepisse;
    }

    public function setNoRecepisse(?int $noRecepisse): void
    {
        $this->noRecepisse = $noRecepisse;
    }

    public function getNoSuivi(): ?int
    {
        return $this->noSuivi;
    }

    public function setNoSuivi(?int $noSuivi): void
    {
        $this->noSuivi = $noSuivi;
    }

    public function getNosUmsAEtiqueter(): ?int
    {
        return $this->nosUmsAEtiqueter;
    }

    public function setNosUmsAEtiqueter(?int $nosUmsAEtiqueter): void
    {
        $this->nosUmsAEtiqueter = $nosUmsAEtiqueter;
    }

    public function getOptionLivraison(): ?string
    {
        return $this->optionLivraison;
    }

    public function setOptionLivraison(?string $optionLivraison): void
    {
        $this->optionLivraison = $optionLivraison;
    }

    public function getPeriodePreferenceEnlevement(): ?string
    {
        return $this->periodePreferenceEnlevement;
    }

    public function setPeriodePreferenceEnlevement(?string $periodePreferenceEnlevement): void
    {
        $this->periodePreferenceEnlevement = $periodePreferenceEnlevement;
    }

    public function getPoidsQteLimiteeMD(): ?int
    {
        return $this->poidsQteLimiteeMD;
    }

    public function setPoidsQteLimiteeMD(?int $poidsQteLimiteeMD): void
    {
        $this->poidsQteLimiteeMD = $poidsQteLimiteeMD;
    }

    public function getPoidsTotal(): ?int
    {
        return $this->poidsTotal;
    }

    public function setPoidsTotal(?int $poidsTotal): void
    {
        $this->poidsTotal = $poidsTotal;
    }

    public function getReference1(): ?string
    {
        return $this->reference1;
    }

    public function setReference1(?string $reference1): void
    {
        $this->reference1 = $reference1;
    }

    public function getReference2(): ?string
    {
        return $this->reference2;
    }

    public function setReference2(?string $reference2): void
    {
        $this->reference2 = $reference2;
    }

    public function getSadDepotage(): ?bool
    {
        return $this->sadDepotage;
    }

    public function setSadDepotage(?bool $sadDepotage): void
    {
        $this->sadDepotage = $sadDepotage;
    }

    public function getSadLivEtage(): ?bool
    {
        return $this->sadLivEtage;
    }

    public function setSadLivEtage(?bool $sadLivEtage): void
    {
        $this->sadLivEtage = $sadLivEtage;
    }

    public function getSadMiseLieuUtil(): ?bool
    {
        return $this->sadMiseLieuUtil;
    }

    public function setSadMiseLieuUtil(?bool $sadMiseLieuUtil): void
    {
        $this->sadMiseLieuUtil = $sadMiseLieuUtil;
    }

    public function getSadSwap(): ?bool
    {
        return $this->sadSwap;
    }

    public function setSadSwap(?bool $sadSwap): void
    {
        $this->sadSwap = $sadSwap;
    }

    public function getSmsNotificationDestinataire(): ?string
    {
        return $this->smsNotificationDestinataire;
    }

    public function setSmsNotificationDestinataire(?string $smsNotificationDestinataire): void
    {
        $this->smsNotificationDestinataire = $smsNotificationDestinataire;
    }

    public function getVolumeTotal(): ?int
    {
        return $this->volumeTotal;
    }

    public function setVolumeTotal(?int $volumeTotal): void
    {
        $this->volumeTotal = $volumeTotal;
    }
}
