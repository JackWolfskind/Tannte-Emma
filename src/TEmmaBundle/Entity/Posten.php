<?php

namespace TEmmaBundle\Entity;

/**
 * Posten
 */
class Posten
{
    /**
     * @var integer
     */
    private $artikelmenge;

    /**
     * @var integer
     */
    private $postenid;

    /**
     * @var \TEmmaBundle\Entity\Artikel
     */
    private $artikelnr;

    /**
     * @var \TEmmaBundle\Entity\Geschaefte
     */
    private $geschaeftid;


    /**
     * Set artikelmenge
     *
     * @param integer $artikelmenge
     *
     * @return Posten
     */
    public function setArtikelmenge($artikelmenge)
    {
        $this->artikelmenge = $artikelmenge;

        return $this;
    }

    /**
     * Get artikelmenge
     *
     * @return integer
     */
    public function getArtikelmenge()
    {
        return $this->artikelmenge;
    }

    /**
     * Get postenid
     *
     * @return integer
     */
    public function getPostenid()
    {
        return $this->postenid;
    }

    /**
     * Set artikelnr
     *
     * @param \TEmmaBundle\Entity\Artikel $artikelnr
     *
     * @return Posten
     */
    public function setArtikelnr(\TEmmaBundle\Entity\Artikel $artikelnr = null)
    {
        $this->artikelnr = $artikelnr;

        return $this;
    }

    /**
     * Get artikelnr
     *
     * @return \TEmmaBundle\Entity\Artikel
     */
    public function getArtikelnr()
    {
        return $this->artikelnr;
    }

    /**
     * Set geschaeftid
     *
     * @param \TEmmaBundle\Entity\Geschaefte $geschaeftid
     *
     * @return Posten
     */
    public function setGeschaeftid(\TEmmaBundle\Entity\Geschaefte $geschaeftid = null)
    {
        $this->geschaeftid = $geschaeftid;

        return $this;
    }

    /**
     * Get geschaeftid
     *
     * @return \TEmmaBundle\Entity\Geschaefte
     */
    public function getGeschaeftid()
    {
        return $this->geschaeftid;
    }
}
