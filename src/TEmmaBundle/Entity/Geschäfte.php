<?php

namespace TEmmaBundle\Entity;

/**
 * Geschäfte
 */
class Geschäfte
{
    /**
     * @var string
     */
    private $geschäftecol;

    /**
     * @var string
     */
    private $datum;

    /**
     * @var integer
     */
    private $geschäftid;

    /**
     * @var \TEmmaBundle\Entity\Geschäftsart
     */
    private $geschäftsart;

    /**
     * @var \TEmmaBundle\Entity\Kunde
     */
    private $kundeKundenr;

    /**
     * @var \TEmmaBundle\Entity\Mitarbeiter
     */
    private $angelegtvonmitarbeiter;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $artikelnr;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artikelnr = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set geschäftecol
     *
     * @param string $geschäftecol
     *
     * @return Geschäfte
     */
    public function setGeschäftecol($geschäftecol)
    {
        $this->geschäftecol = $geschäftecol;

        return $this;
    }

    /**
     * Get geschäftecol
     *
     * @return string
     */
    public function getGeschäftecol()
    {
        return $this->geschäftecol;
    }

    /**
     * Set datum
     *
     * @param string $datum
     *
     * @return Geschäfte
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum
     *
     * @return string
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Get geschäftid
     *
     * @return integer
     */
    public function getGeschäftid()
    {
        return $this->geschäftid;
    }

    /**
     * Set geschäftsart
     *
     * @param \TEmmaBundle\Entity\Geschäftsart $geschäftsart
     *
     * @return Geschäfte
     */
    public function setGeschäftsart(\TEmmaBundle\Entity\Geschäftsart $geschäftsart = null)
    {
        $this->geschäftsart = $geschäftsart;

        return $this;
    }

    /**
     * Get geschäftsart
     *
     * @return \TEmmaBundle\Entity\Geschäftsart
     */
    public function getGeschäftsart()
    {
        return $this->geschäftsart;
    }

    /**
     * Set kundeKundenr
     *
     * @param \TEmmaBundle\Entity\Kunde $kundeKundenr
     *
     * @return Geschäfte
     */
    public function setKundeKundenr(\TEmmaBundle\Entity\Kunde $kundeKundenr = null)
    {
        $this->kundeKundenr = $kundeKundenr;

        return $this;
    }

    /**
     * Get kundeKundenr
     *
     * @return \TEmmaBundle\Entity\Kunde
     */
    public function getKundeKundenr()
    {
        return $this->kundeKundenr;
    }

    /**
     * Set angelegtvonmitarbeiter
     *
     * @param \TEmmaBundle\Entity\Mitarbeiter $angelegtvonmitarbeiter
     *
     * @return Geschäfte
     */
    public function setAngelegtvonmitarbeiter(\TEmmaBundle\Entity\Mitarbeiter $angelegtvonmitarbeiter = null)
    {
        $this->angelegtvonmitarbeiter = $angelegtvonmitarbeiter;

        return $this;
    }

    /**
     * Get angelegtvonmitarbeiter
     *
     * @return \TEmmaBundle\Entity\Mitarbeiter
     */
    public function getAngelegtvonmitarbeiter()
    {
        return $this->angelegtvonmitarbeiter;
    }

    /**
     * Add artikelnr
     *
     * @param \TEmmaBundle\Entity\Artikel $artikelnr
     *
     * @return Geschäfte
     */
    public function addArtikelnr(\TEmmaBundle\Entity\Artikel $artikelnr)
    {
        $this->artikelnr[] = $artikelnr;

        return $this;
    }

    /**
     * Remove artikelnr
     *
     * @param \TEmmaBundle\Entity\Artikel $artikelnr
     */
    public function removeArtikelnr(\TEmmaBundle\Entity\Artikel $artikelnr)
    {
        $this->artikelnr->removeElement($artikelnr);
    }

    /**
     * Get artikelnr
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtikelnr()
    {
        return $this->artikelnr;
    }
}
