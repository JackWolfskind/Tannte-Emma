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
     * @var string
     */
    private $postenid;

    /**
     * @var \TEmmaBundle\Entity\Artikel
     */
    private $artikelnr;

    /**
     * @var \TEmmaBundle\Entity\Geschäfte
     */
    private $geschäftid;


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
     * @return string
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
     * Set geschäftid
     *
     * @param \TEmmaBundle\Entity\Geschäfte $geschäftid
     *
     * @return Posten
     */
    public function setGeschäftid(\TEmmaBundle\Entity\Geschäfte $geschäftid = null)
    {
        $this->geschäftid = $geschäftid;

        return $this;
    }

    /**
     * Get geschäftid
     *
     * @return \TEmmaBundle\Entity\Geschäfte
     */
    public function getGeschäftid()
    {
        return $this->geschäftid;
    }
}

