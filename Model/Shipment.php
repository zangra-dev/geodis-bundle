<?php

namespace GeodisBundle\Model;

use GeodisBundle\Model\Base\Model;

/**
 * Class Shipment.
 *
 * @property bool   impressionEtiquette             Facultatif      Impresion étiquette Valeur false par défaut si non renseigné
 * @property string typeImpressionEtiquette         Facultatif      P: PDF 2 par page T: PDF A4 Z: Thermique Zpl E: Thermique Epl   Format étiquette
 * @property bool   validationEnvoi                 Facultatif      Validation vers GEODIS
 * @property bool   suppressionSiEchecValidation    Facultatif
 * @property bool   impressionBordereau             Facultatif      Impression du Bordereau chauffeur PDF
 * @property bool   impressionRecapitulatif         Facultatif      Impression du récapitulatif des Expéditions PDF
 *
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
 *
 * Colis a étiqueter
 * @property array  listEnvois
 * @property array  listNosSuivis
 */
class Shipment extends Model
{
    protected $impressionEtiquette;
    protected $typeImpressionEtiquette;
    protected $validationEnvoi;
    protected $suppressionSiEchecValidation;
    protected $impressionBordereau;
    protected $impressionRecapitulatif;

    protected $listEnvois;
    protected $listNosSuivis;



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
    public function getListEnvois()
    {
        return $this->listEnvois;
    }

    /**
     * @param mixed $listEnvois
     *
     * @return self
     */
    public function setListEnvois($listEnvois)
    {
        $this->listEnvois = $listEnvois;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getListNosSuivis()
    {
        return $this->listNosSuivis;
    }

    /**
     * @param mixed $listNosSuivis
     *
     * @return self
     */
    public function setListNosSuivis($listNosSuivis)
    {
        $this->listNosSuivis = $listNosSuivis;

        return $this;
    }
}
