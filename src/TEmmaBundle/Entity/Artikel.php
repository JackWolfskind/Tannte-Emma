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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $geschäftid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->geschäftid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add geschäftid
     *
     * @param \TEmmaBundle\Entity\Geschäfte $geschäftid
     *
     * @return Artikel
     */
    public function addGeschäftid(\TEmmaBundle\Entity\Geschäfte $geschäftid)
    {
        $this->geschäftid[] = $geschäftid;

        return $this;
    }

    /**
     * Remove geschäftid
     *
     * @param \TEmmaBundle\Entity\Geschäfte $geschäftid
     */
    public function removeGeschäftid(\TEmmaBundle\Entity\Geschäfte $geschäftid)
    {
        $this->geschäftid->removeElement($geschäftid);
    }

    /**
     * Get geschäftid
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGeschäftid()
    {
        return $this->geschäftid;
    }
}
