<?php

namespace GeodisBundle\Model;

use GeodisBundle\Model\Base\Model;

/**
 * Class ListUmg.
 * Données Unité de Manutentions (répéter les lignes autant de fois que d'unité de manutention)
 * @property bool   palette                        Facultatif      UM= palette true si um= palette
 * @property bool   paletteConsignee               Facultatif      UM= Palette consignée   true si palette consignée
 * @property int    quantite                       Obligatoire     Nombre d'UM
 * @property int    poids                           Facultatif      Poids UM    Obligatoire si Poids Total non renseigné
 * @property int    volume                          Facultatif      Volume UM
 * @property int    longueur                        Facultatif      Longueur UM
 * @property int    largeur                         Facultatif      Largeur UM
 * @property int    hauteur                         Facultatif      Hauteur UM
 * @property string referenceColis                 Facultatif      Référence UM
 *
 * Everything must be put in an array and the property are the key of the array. For exemple
 *  $listUmg = array();
 *  $listUmg['palette'] = 'xxx';
 *  $listUmg['quantite'] = 'xxx';
 *
 *  The set and get are presents in case there is a update in the operation
 *  In the future, may be
 *  $listUmg = new listUmg()
 *  will be correct
 */

class ListUmg extends Model
{
    protected $palette;
    protected $paletteConsignee;
    protected $quantite;
    protected $poids;
    protected $volume;
    protected $longueur;
    protected $largeur;
    protected $hauteur;
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
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param mixed $poids
     *
     * @return self
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     *
     * @return self
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * @param mixed $longueur
     *
     * @return self
     */
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * @param mixed $largeur
     *
     * @return self
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * @param mixed $hauteur
     *
     * @return self
     */
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;

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
