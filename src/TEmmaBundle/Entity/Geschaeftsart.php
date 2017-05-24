<?php

namespace TEmmaBundle\Entity;

/**
 * Geschaeftsart
 */
class Geschaeftsart
{
    /**
     * @var string
     */
    private $artbezeichnung;

    /**
     * @var integer
     */
    private $artid;


    /**
     * Set artbezeichnung
     *
     * @param string $artbezeichnung
     *
     * @return Geschaeftsart
     */
    public function setArtbezeichnung($artbezeichnung)
    {
        $this->artbezeichnung = $artbezeichnung;

        return $this;
    }

    /**
     * Get artbezeichnung
     *
     * @return string
     */
    public function getArtbezeichnung()
    {
        return $this->artbezeichnung;
    }

    /**
     * Get artid
     *
     * @return integer
     */
    public function getArtid()
    {
        return $this->artid;
    }
    
    public function __toString() {
        return $this->artbezeichnung;
    }
}
