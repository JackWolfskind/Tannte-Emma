<?php

namespace TEmmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kunde
 *
 * @ORM\Table(name="kunde")
 * @ORM\Entity(repositoryClass="TEmmaBundle\Repository\KundeRepository")
 */
class Kunde
{
    /**
     * @var int
     *
     * @ORM\Column(name="kundenNR", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $kundenNR;

    /**
     * @var string
     *
     * @ORM\Column(name="kundeName", type="string", length=45)
     */
    private $kundeName;

    /**
     * @var string
     *
     * @ORM\Column(name="kundeVorname", type="string", length=45)
     */
    private $kundeVorname;

    /**
     * @var string
     *
     * @ORM\Column(name="kundeAdresse", type="string", length=255)
     */
    private $kundeAdresse;

    /**
     * @var string
     *
     * @ORM\Column(name="kundeLieferhinweis", type="text", nullable=true)
     */
    private $kundeLieferhinweis;


    /**
     * Get id
     *
     * @return int
     */
    public function getKundenNR()
    {
        return $this->kundenNR;
    }

    /**
     * Set kundeName
     *
     * @param string $kundeName
     *
     * @return Kunde
     */
    public function setKundeName($kundeName)
    {
        $this->kundeName = $kundeName;

        return $this;
    }

    /**
     * Get kundeName
     *
     * @return string
     */
    public function getKundeName()
    {
        return $this->kundeName;
    }

    /**
     * Set kundeVorname
     *
     * @param string $kundeVorname
     *
     * @return Kunde
     */
    public function setKundeVorname($kundeVorname)
    {
        $this->kundeVorname = $kundeVorname;

        return $this;
    }

    /**
     * Get kundeVorname
     *
     * @return string
     */
    public function getKundeVorname()
    {
        return $this->kundeVorname;
    }

    /**
     * Set kundeAdresse
     *
     * @param string $kundeAdresse
     *
     * @return Kunde
     */
    public function setKundeAdresse($kundeAdresse)
    {
        $this->kundeAdresse = $kundeAdresse;

        return $this;
    }

    /**
     * Get kundeAdresse
     *
     * @return string
     */
    public function getKundeAdresse()
    {
        return $this->kundeAdresse;
    }

    /**
     * Set kundeLieferhinweis
     *
     * @param string $kundeLieferhinweis
     *
     * @return Kunde
     */
    public function setKundeLieferhinweis($kundeLieferhinweis)
    {
        $this->kundeLieferhinweis = $kundeLieferhinweis;

        return $this;
    }

    /**
     * Get kundeLieferhinweis
     *
     * @return string
     */
    public function getKundeLieferhinweis()
    {
        return $this->kundeLieferhinweis;
    }
}

