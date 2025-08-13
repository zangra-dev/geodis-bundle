<?php
declare(strict_types=1);

namespace GeodisBundle\Domain;

use GeodisBundle\Domain\Base\Model;

/**
 * Class ListUmg.
 * Données Unité de Manutentions (répéter les lignes autant de fois que d'Unité de Manutention)
 * quantite              Nombre d'UM
 * largeur               Largeur UM
 * longueur              Longueur UM
 * hauteur               Hauteur UM
 * palette               UM= palette true si um= palette
 * paletteConsignee      UM= Palette consignée   true si palette consignée
 * poids                 Poids UM    Obligatoire si Poids Total non renseigné
 * referenceColis        Référence UM
 * volume                Volume UM
 */

class ListUmg extends Model
{
    public int $quantite;
    public ?int $largeur = null;
    public ?int $longueur = null;
    public ?int $hauteur = null;
    public ?bool $palette = null;
    public ?bool $paletteConsignee = null;
    public ?float $poids = null;
    public ?string $referenceColis = null;
    public ?int $volume = null;

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getLargeur(): ?int
    {
        return $this->largeur;
    }

    public function setLargeur(?int $largeur): void
    {
        $this->largeur = $largeur;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(?int $longueur): void
    {
        $this->longueur = $longueur;
    }

    public function getHauteur(): ?int
    {
        return $this->hauteur;
    }

    public function setHauteur(?int $hauteur): void
    {
        $this->hauteur = $hauteur;
    }

    public function getPalette(): ?bool
    {
        return $this->palette;
    }

    public function setPalette(?bool $palette): void
    {
        $this->palette = $palette;
    }

    public function getPaletteConsignee(): ?bool
    {
        return $this->paletteConsignee;
    }

    public function setPaletteConsignee(?bool $paletteConsignee): void
    {
        $this->paletteConsignee = $paletteConsignee;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): void
    {
        $this->poids = $poids;
    }

    public function getReferenceColis(): ?string
    {
        return $this->referenceColis;
    }

    public function setReferenceColis(?string $referenceColis): void
    {
        $this->referenceColis = $referenceColis;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(?int $volume): void
    {
        $this->volume = $volume;
    }
}
