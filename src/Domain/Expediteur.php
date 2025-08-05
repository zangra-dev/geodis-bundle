<?php
declare(strict_types=1);

namespace GeodisBundle\Domain;

use GeodisBundle\Domain\Base\Model;

/**
 * Class Expediteur.
 *  nom                          Nom Expéditeur  ALGAM NATIONAL
 *  adresse1                     Adesse 1 Enlèvement PA DES PETITES LANDES
 *  adresse2                     Adresse 2 Enlèvement    2 RUE DE MILAN
 *  codePostal                   Code postal du site Enlèvement  44470
 *  ville                        Localité Enlèvement THOUARE SUR LOIRE
 *  codePays                     Code pays Enlèvement    FR
 *  nomContact                   Nom contact client site Enlèvement
 *  email                        Email contact client
 *  telFixe                      Téléphone contact Enlèvement
 *  indTelMobile                 Ind. Pays mobile Enlèvement
 *  telMobile                    Portable Enlèvement
 *  codePorte                    Code Porte
 *  codeTiers
 *  noEntrepositaireAgree        N° Entrepositaire cleint Expéditeur
 *
 * Everything must be put in an array and the property are the key of the array. For exemple
 *  $expediteur = array();
 *  $expediteur['adresse1'] = 'xxx';
 *  $expediteur['codePays'] = 'xxx';
 *
 *  The set and get are presents in case there is a update in the operation
 *  In the future, may be
 *  $expediteur = new Expediteur()
 *  will be correct
 */

class Expediteur extends Model
{
	public string $nom;
	public string $adresse1;
	public string $adresse2;
	public int    $codePostal;
	public string $ville;
	public string $codePays;
	public ?string $nomContact = null;
	public ?string $email = null;
	public ?int    $telFixe = null;
	public ?string $indTelMobile = null;
    public ?int    $telMobile = null;
    public ?int    $codePorte = null;
    public ?int    $codeTiers = null;
	public ?string $noEntrepositaireAgree = null;
	public ?string $periodePreferenceEnlevement = null;
	public ?string $instructionEnlevement = null;

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

    public function getCodePostal(): int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): void
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

    public function getNomContact(): string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): void
    {
        $this->nomContact = $nomContact;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getTelFixe(): int
    {
        return $this->telFixe;
    }

    public function setTelFixe(int $telFixe): void
    {
        $this->telFixe = $telFixe;
    }

    public function getIndTelMobile(): string
    {
        return $this->indTelMobile;
    }

    public function setIndTelMobile(string $indTelMobile): void
    {
        $this->indTelMobile = $indTelMobile;
    }

    public function getTelMobile(): int
    {
        return $this->telMobile;
    }

    public function setTelMobile(int $telMobile): void
    {
        $this->telMobile = $telMobile;
    }

    public function getCodePorte(): int
    {
        return $this->codePorte;
    }

    public function setCodePorte(int $codePorte): void
    {
        $this->codePorte = $codePorte;
    }

    public function getCodeTiers(): int
    {
        return $this->codeTiers;
    }

    public function setCodeTiers(int $codeTiers): void
    {
        $this->codeTiers = $codeTiers;
    }

    public function getNoEntrepositaireAgree(): string
    {
        return $this->noEntrepositaireAgree;
    }

    public function setNoEntrepositaireAgree(string $noEntrepositaireAgree): void
    {
        $this->noEntrepositaireAgree = $noEntrepositaireAgree;
    }

    public function getPeriodePreferenceEnlevement(): string
    {
        return $this->periodePreferenceEnlevement;
    }

    public function setPeriodePreferenceEnlevement(string $periodePreferenceEnlevement): void
    {
        $this->periodePreferenceEnlevement = $periodePreferenceEnlevement;
    }

    public function getInstructionEnlevement(): string
    {
        return $this->instructionEnlevement;
    }

    public function setInstructionEnlevement(string $instructionEnlevement): void
    {
        $this->instructionEnlevement = $instructionEnlevement;
    }
}