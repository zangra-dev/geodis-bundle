<?php
declare(strict_types=1);

namespace GeodisBundle\Domain;

use GeodisBundle\Domain\Base\Model;

/**
 * Class Shipment.
 * Colis a étiqueter
 * listEnvois
 * listNosSuivis
 *
 * impressionEtiquette                   Impresion étiquette Valeur false par défaut si non renseigné
 * typeImpressionEtiquette               P: PDF 2 par page T: PDF A4 Z: Thermique Zpl E: Thermique Epl   Format étiquette
 * validationEnvoi                       Validation vers GEODIS
 * suppressionSiEchecValidation
 *  impressionBordereau                  Impression du Bordereau chauffeur PDF
 *  impressionRecapitulatif              Impression du récapitulatif des Expéditions PDF
 *
 */
class Shipment extends Model
{

    protected array $listEnvois;
    protected array $listNosSuivis;

    protected ?bool $impressionEtiquette = null;
    protected ?string $typeImpressionEtiquette = null;
    protected ?bool $validationEnvoi = null;
    protected ?bool $suppressionSiEchecValidation = null;
    protected ?bool $impressionBordereau = null;
    protected ?bool $impressionRecapitulatif = null;

    public function getListEnvois(): array
    {
        return $this->listEnvois;
    }

    public function setListEnvois(array $listEnvois): void
    {
        $this->listEnvois = $listEnvois;
    }

    public function getListNosSuivis(): array
    {
        return $this->listNosSuivis;
    }

    public function setListNosSuivis(array $listNosSuivis): void
    {
        $this->listNosSuivis = $listNosSuivis;
    }

    public function getImpressionEtiquette(): ?bool
    {
        return $this->impressionEtiquette;
    }

    public function setImpressionEtiquette(?bool $impressionEtiquette): void
    {
        $this->impressionEtiquette = $impressionEtiquette;
    }

    public function getTypeImpressionEtiquette(): ?string
    {
        return $this->typeImpressionEtiquette;
    }

    public function setTypeImpressionEtiquette(?string $typeImpressionEtiquette): void
    {
        $this->typeImpressionEtiquette = $typeImpressionEtiquette;
    }

    public function getValidationEnvoi(): ?bool
    {
        return $this->validationEnvoi;
    }

    public function setValidationEnvoi(?bool $validationEnvoi): void
    {
        $this->validationEnvoi = $validationEnvoi;
    }

    public function getSuppressionSiEchecValidation(): ?bool
    {
        return $this->suppressionSiEchecValidation;
    }

    public function setSuppressionSiEchecValidation(?bool $suppressionSiEchecValidation): void
    {
        $this->suppressionSiEchecValidation = $suppressionSiEchecValidation;
    }

    public function getImpressionBordereau(): ?bool
    {
        return $this->impressionBordereau;
    }

    public function setImpressionBordereau(?bool $impressionBordereau): void
    {
        $this->impressionBordereau = $impressionBordereau;
    }

    public function getImpressionRecapitulatif(): ?bool
    {
        return $this->impressionRecapitulatif;
    }

    public function setImpressionRecapitulatif(?bool $impressionRecapitulatif): void
    {
        $this->impressionRecapitulatif = $impressionRecapitulatif;
    }
}
