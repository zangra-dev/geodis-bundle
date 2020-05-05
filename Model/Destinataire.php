<?php

namespace GeodisBundle\Model;

use GeodisBundle\Model\Base\Model;

/**
 * Class Destinataire.
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
 * Everything must be put in an array and the property are the key of the array. For exemple
 *  $destinataire = array();
 *  $destinataire['adresse1'] = 'xxx';
 *  $destinataire['codePays'] = 'xxx';
 *
 *  The set and get are presents in case there is a update in the operation
 *  In the future, may be
 *  $destinataire = new Destinaire()
 *  will be correct
 */

class Destinataire extends Model
{
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
}
