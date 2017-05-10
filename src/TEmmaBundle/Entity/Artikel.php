<?php

namespace TEmmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="TEmmaBundle\Repository\ArtikelRepository")
 */
class Artikel
{
    /**
     * @var int
     *
     * @ORM\Column(name="artikelNR", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $artikelNummer;

    /**
     * @var string
     *
     * @ORM\Column(name="artikelBezeichnung", type="string", length=45)
     */
    private $artikelBezeichnung;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelPreis", type="integer")
     */
    private $artikelPreis;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelBestand", type="integer")
     */
    private $artikelBestand;


    /**
     * Get Artikelnummer
     *
     * @return int
     */
    public function getArtikelNummer()
    {
        return $this->artikelNummer;
    }

    /**
     * Set artikelBezeichnung
     *
     * @param string $artikelBezeichnung
     *
     * @return Artikel
     */
    public function setArtikelBezeichnung($artikelBezeichnung)
    {
        $this->artikelBezeichnung = $artikelBezeichnung;

        return $this;
    }

    /**
     * Get artikelBezeichnung
     *
     * @return string
     */
    public function getArtikelBezeichnung()
    {
        return $this->artikelBezeichnung;
    }

    /**
     * Set artikelPreis
     *
     * @param integer $artikelPreis
     *
     * @return Artikel
     */
    public function setArtikelPreis($artikelPreis)
    {
        $this->artikelPreis = $artikelPreis;

        return $this;
    }

    /**
     * Get artikelPreis
     *
     * @return int
     */
    public function getArtikelPreis()
    {
        return $this->artikelPreis;
    }

    /**
     * Set artikelBestand
     *
     * @param integer $artikelBestand
     *
     * @return Artikel
     */
    public function setArtikelBestand($artikelBestand)
    {
        $this->artikelBestand = $artikelBestand;

        return $this;
    }

    /**
     * Get artikelBestand
     *
     * @return int
     */
    public function getArtikelBestand()
    {
        return $this->artikelBestand;
    }
}

