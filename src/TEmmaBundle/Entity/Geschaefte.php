<?php

namespace TEmmaBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Geschaefte
 */
class Geschaefte
{
    /**
     * @var string
     */
    private $datum;
    
    /**
     *
     * @var ArrayCollection
     */
    private $posten;

    /**
     * @var integer
     */
    private $geschaeftid;

    /**
     * @var \TEmmaBundle\Entity\Geschaeftsart
     */
    private $geschaeftsart;

    /**
     * @var \TEmmaBundle\Entity\Kunde
     */
    private $kundenr;

    /**
     * @var \TEmmaBundle\Entity\Mitarbeiter
     */
    private $angelegtvon;

    public function __construct() {
        $this->posten = new ArrayCollection();
    }
    /**
     * Set datum
     *
     * @param string $datum
     *
     * @return Geschaefte
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
     * Get posten
     *
     * @return ArrayCollection
     */
    public function getPosten() 
    {
        return $this->posten;
    }
        public function addPosten(Posten $posten)
    {
        $this->posten->add($posten);
    }

    public function removePosten(Posten $posten)
    {
        // ...
    }

    /**
     * Get geschaeftid
     *
     * @return integer
     */
    public function getGeschaeftid()
    {
        return $this->geschaeftid;
    }

    /**
     * Set geschaeftsart
     *
     * @param \TEmmaBundle\Entity\Geschaeftsart $geschaeftsart
     *
     * @return Geschaefte
     */
    public function setGeschaeftsart(\TEmmaBundle\Entity\Geschaeftsart $geschaeftsart = null)
    {
        $this->geschaeftsart = $geschaeftsart;

        return $this;
    }

    /**
     * Get geschaeftsart
     *
     * @return \TEmmaBundle\Entity\Geschaeftsart
     */
    public function getGeschaeftsart()
    {
        return $this->geschaeftsart;
    }

    /**
     * Set kundenr
     *
     * @param \TEmmaBundle\Entity\Kunde $kundenr
     *
     * @return Geschaefte
     */
    public function setKundenr(\TEmmaBundle\Entity\Kunde $kundenr = null)
    {
        $this->kundenr = $kundenr;

        return $this;
    }

    /**
     * Get kundenr
     *
     * @return \TEmmaBundle\Entity\Kunde
     */
    public function getKundenr()
    {
        return $this->kundenr;
    }

    /**
     * Set angelegtvon
     *
     * @param \TEmmaBundle\Entity\Mitarbeiter $angelegtvon
     *
     * @return Geschaefte
     */
    public function setAngelegtvon(\TEmmaBundle\Entity\Mitarbeiter $angelegtvon = null)
    {
        $this->angelegtvon = $angelegtvon;

        return $this;
    }

    /**
     * Get angelegtvon
     *
     * @return \TEmmaBundle\Entity\Mitarbeiter
     */
    public function getAngelegtvon()
    {
        return $this->angelegtvon;
    }

    public function __toString() {
        if (isset($this->geschaeftid)) {
            return (string) $this->geschaeftid;
        }
    }

}
