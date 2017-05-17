<?php

namespace TEmmaBundle\Entity;

/**
 * Warenkorb
 */
class Warenkorb
{
    /**
     * @var integer
     */
    private $artikelmenge;

    /**
     * @var integer
     */
    private $warenkorbid;

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
     * @return Warenkorb
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
     * Get warenkorbid
     *
     * @return integer
     */
    public function getWarenkorbid()
    {
        return $this->warenkorbid;
    }

    /**
     * Set artikelnr
     *
     * @param \TEmmaBundle\Entity\Artikel $artikelnr
     *
     * @return Warenkorb
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
     * @return Warenkorb
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
