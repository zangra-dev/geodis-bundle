<?php

namespace GeodisBundle\Model;

use GeodisBundle\Model\Base\Model;

/**
 * Class ListUmg.
 * Données Unité de Manutentions (répéter les lignes autant de fois que d'unité de manutention)
 * @property bool   palette                        Facultatif      UM= palette true si um= palette
 * @property bool   paletteConsignee               Facultatif      UM= Palette consignée   true si palette consignée
 * @property int    quantite                       Obligatoire     Nombre d'UM
 * @property int    poidsUnitaire                  Facultatif      Poids UM    Obligatoire si Poids Total non renseigné
 * @property int    volumeUnitaire                 Facultatif      Volume UM
 * @property int    longueurUnitaire               Facultatif      Longueur UM
 * @property int    largeurUnitaire                Facultatif      Largeur UM
 * @property int    hauteurUnitaire                Facultatif      Hauteur UM
 * @property string referenceColis                 Facultatif      Référence UM
 */

class ListUmg extends Model
{
    protected $palette;
    protected $paletteConsignee;
    protected $quantite;
    protected $poidsUnitaire;
    protected $volumeUnitaire;
    protected $longueurUnitaire;
    protected $largeurUnitaire;
    protected $hauteurUnitaire;
    protected $referenceColis;

    /**
     * @return mixed
     */
    public function getPalette()
    {
        return $this->palette;
    }

    /**
     * @param mixed $palette
     *
     * @return self
     */
    public function setPalette($palette)
    {
        $this->palette = $palette;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaletteConsignee()
    {
        return $this->paletteConsignee;
    }

    /**
     * @param mixed $paletteConsignee
     *
     * @return self
     */
    public function setPaletteConsignee($paletteConsignee)
    {
        $this->paletteConsignee = $paletteConsignee;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     *
     * @return self
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoidsUnitaire()
    {
        return $this->poidsUnitaire;
    }

    /**
     * @param mixed $poidsUnitaire
     *
     * @return self
     */
    public function setPoidsUnitaire($poidsUnitaire)
    {
        $this->poidsUnitaire = $poidsUnitaire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolumeUnitaire()
    {
        return $this->volumeUnitaire;
    }

    /**
     * @param mixed $volumeUnitaire
     *
     * @return self
     */
    public function setVolumeUnitaire($volumeUnitaire)
    {
        $this->volumeUnitaire = $volumeUnitaire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongueurUnitaire()
    {
        return $this->longueurUnitaire;
    }

    /**
     * @param mixed $longueurUnitaire
     *
     * @return self
     */
    public function setLongueurUnitaire($longueurUnitaire)
    {
        $this->longueurUnitaire = $longueurUnitaire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLargeurUnitaire()
    {
        return $this->largeurUnitaire;
    }

    /**
     * @param mixed $largeurUnitaire
     *
     * @return self
     */
    public function setLargeurUnitaire($largeurUnitaire)
    {
        $this->largeurUnitaire = $largeurUnitaire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHauteurUnitaire()
    {
        return $this->hauteurUnitaire;
    }

    /**
     * @param mixed $hauteurUnitaire
     *
     * @return self
     */
    public function setHauteurUnitaire($hauteurUnitaire)
    {
        $this->hauteurUnitaire = $hauteurUnitaire;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceColis()
    {
        return $this->referenceColis;
    }

    /**
     * @param mixed $referenceColis
     *
     * @return self
     */
    public function setReferenceColis($referenceColis)
    {
        $this->referenceColis = $referenceColis;

        return $this;
    }
}
