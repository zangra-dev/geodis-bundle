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
 *
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
