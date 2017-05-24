<?php

namespace TEmmaBundle\Entity;

/**
 * Artikel
 */
class Artikel
{
    /**
     * @var string
     */
    private $artikelbezeichnung;

    /**
     * @var integer
     */
    private $artikelpreis;

    /**
     * @var integer
     */
    private $artikelbestand;

    /**
     * @var integer
     */
    private $artikelnr;


    /**
     * Set artikelbezeichnung
     *
     * @param string $artikelbezeichnung
     *
     * @return Artikel
     */
    public function setArtikelbezeichnung($artikelbezeichnung)
    {
        $this->artikelbezeichnung = $artikelbezeichnung;

        return $this;
    }

    /**
     * Get artikelbezeichnung
     *
     * @return string
     */
    public function getArtikelbezeichnung()
    {
        return $this->artikelbezeichnung;
    }

    /**
     * Set artikelpreis
     *
     * @param integer $artikelpreis
     *
     * @return Artikel
     */
    public function setArtikelpreis($artikelpreis)
    {
        $this->artikelpreis = $artikelpreis;

        return $this;
    }

    /**
     * Get artikelpreis
     *
     * @return integer
     */
    public function getArtikelpreis()
    {
        return $this->artikelpreis;
    }

    /**
     * Set artikelbestand
     *
     * @param integer $artikelbestand
     *
     * @return Artikel
     */
    public function setArtikelbestand($artikelbestand)
    {
        $this->artikelbestand = $artikelbestand;

        return $this;
    }

    /**
     * Get artikelbestand
     *
     * @return integer
     */
    public function getArtikelbestand()
    {
        return $this->artikelbestand;
    }

    /**
     * Get artikelnr
     *
     * @return integer
     */
    public function getArtikelnr()
    {
        return $this->artikelnr;
    }
    
    public function __toString() {
        return $this->artikelbezeichnung;
    }
}
