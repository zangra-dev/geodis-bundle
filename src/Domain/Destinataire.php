<?php
declare(strict_types=1);

namespace GeodisBundle\Domain;

use GeodisBundle\Domain\Base\Model;

/**
 * Class Destinataire.
 *  string nom                             Nom destinataire
 *  string adresse1                        Adresse 1 destinataire
 *  string adresse2                        Adresse 2 destinataire
 *  int    codePostal                      CP destinataire
 *  string ville                           Localité destinataire
 *  string codePays                        Code pays destinataire
 *  string nomContact                      Contact destinataire    Obligatoire si option livraison= RDW
 *  string email                           Mail destinataire
 *  int    telFixe                         Téléphone destinataire
 *  int    indTelMobile                    Ind. Portable destinataire
 *  int    telMobile                       Numéro portable destinataire
 *  int    codePorte                       Code port destinataire
 *  int    codeTiers                       Code destinataire   Obligatoire si Regroupement
 *  int    noEntrepositaireAgree           Numéro Entrepositaire agréé destinataire
 *  bool   particulier                     Type destinataire
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
    public string $nom;
    public string $adresse1;
    public string $adresse2;
    public string $codePostal;
    public string $ville;
    public string $codePays;
    public ?string $nomContact = null;
    public ?string $email = null;
    public ?int $telFixe = null;
    public ?int $indTelMobile = null;
    public ?int $telMobile = null;
    public ?int $codePorte = null;
    public ?int $codeTiers = null;
    public ?int $noEntrepositaireAgree = null;
    public ?bool $particulier = null;

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getAdresse1(): string
    {
        return $this->adresse1;
    }

    public function setAdresse1(string $adresse1): void
    {
        $this->adresse1 = $adresse1;
    }

    public function getAdresse2(): string
    {
        return $this->adresse2;
    }

    public function setAdresse2(string $adresse2): void
    {
        $this->adresse2 = $adresse2;
    }

    public function getCodePostal(): string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): void
    {
        $this->codePostal = $codePostal;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    public function getCodePays(): string
    {
        return $this->codePays;
    }

    public function setCodePays(string $codePays): void
    {
        $this->codePays = $codePays;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(?string $nomContact): void
    {
        $this->nomContact = $nomContact;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getTelFixe(): ?int
    {
        return $this->telFixe;
    }

    public function setTelFixe(?int $telFixe): void
    {
        $this->telFixe = $telFixe;
    }

    public function getIndTelMobile(): ?int
    {
        return $this->indTelMobile;
    }

    public function setIndTelMobile(?int $indTelMobile): void
    {
        $this->indTelMobile = $indTelMobile;
    }

    public function getTelMobile(): ?int
    {
        return $this->telMobile;
    }

    public function setTelMobile(?int $telMobile): void
    {
        $this->telMobile = $telMobile;
    }

    public function getCodePorte(): ?int
    {
        return $this->codePorte;
    }

    public function setCodePorte(?int $codePorte): void
    {
        $this->codePorte = $codePorte;
    }

    public function getCodeTiers(): ?int
    {
        return $this->codeTiers;
    }

    public function setCodeTiers(?int $codeTiers): void
    {
        $this->codeTiers = $codeTiers;
    }

    public function getNoEntrepositaireAgree(): ?int
    {
        return $this->noEntrepositaireAgree;
    }

    public function setNoEntrepositaireAgree(?int $noEntrepositaireAgree): void
    {
        $this->noEntrepositaireAgree = $noEntrepositaireAgree;
    }

    public function getParticulier(): ?bool
    {
        return $this->particulier;
    }

    public function setParticulier(?bool $particulier): void
    {
        $this->particulier = $particulier;
    }
}
