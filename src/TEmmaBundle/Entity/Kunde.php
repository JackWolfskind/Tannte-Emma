<?php

namespace TEmmaBundle\Entity;

/**
 * Kunde
 */
class Kunde
{
    /**
     * @var string
     */
    private $kundename;

    /**
     * @var string
     */
    private $kundevorname;

    /**
     * @var string
     */
    private $kundeadresse;

    /**
     * @var string
     */
    private $kundelieferhinweis;

    /**
     * @var integer
     */
    private $kundenr;


    /**
     * Set kundename
     *
     * @param string $kundename
     *
     * @return Kunde
     */
    public function setKundename($kundename)
    {
        $this->kundename = $kundename;

        return $this;
    }

    /**
     * Get kundename
     *
     * @return string
     */
    public function getKundename()
    {
        return $this->kundename;
    }

    /**
     * Set kundevorname
     *
     * @param string $kundevorname
     *
     * @return Kunde
     */
    public function setKundevorname($kundevorname)
    {
        $this->kundevorname = $kundevorname;

        return $this;
    }

    /**
     * Get kundevorname
     *
     * @return string
     */
    public function getKundevorname()
    {
        return $this->kundevorname;
    }

    /**
     * Set kundeadresse
     *
     * @param string $kundeadresse
     *
     * @return Kunde
     */
    public function setKundeadresse($kundeadresse)
    {
        $this->kundeadresse = $kundeadresse;

        return $this;
    }

    /**
     * Get kundeadresse
     *
     * @return string
     */
    public function getKundeadresse()
    {
        return $this->kundeadresse;
    }

    /**
     * Set kundelieferhinweis
     *
     * @param string $kundelieferhinweis
     *
     * @return Kunde
     */
    public function setKundelieferhinweis($kundelieferhinweis)
    {
        $this->kundelieferhinweis = $kundelieferhinweis;

        return $this;
    }

    /**
     * Get kundelieferhinweis
     *
     * @return string
     */
    public function getKundelieferhinweis()
    {
        return $this->kundelieferhinweis;
    }

    /**
     * Get kundenr
     *
     * @return integer
     */
    public function getKundenr()
    {
        return $this->kundenr;
    }
    
    public function __toString() {
        return $this->kundename . " " . $this->kundevorname;
    }
}
