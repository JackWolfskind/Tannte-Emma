<?php

namespace TEmmaBundle\Entity;

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
}

