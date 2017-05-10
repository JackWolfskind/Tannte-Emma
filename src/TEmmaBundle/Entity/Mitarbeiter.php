<?php

namespace TEmmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mitarbeiter
 *
 * @ORM\Table(name="mitarbeiter")
 * @ORM\Entity(repositoryClass="TEmmaBundle\Repository\MitarbeiterRepository")
 */
class Mitarbeiter
{
    /**
     * @var int
     *
     * @ORM\Column(name="mitarbeiterNR", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $mitarbeiterNR;

    /**
     * @var string
     *
     * @ORM\Column(name="mitarbeiterName", type="string", length=45)
     */
    private $mitarbeiterName;

    /**
     * @var string
     *
     * @ORM\Column(name="mitarbeiterVorname", type="string", length=45)
     */
    private $mitarbeiterVorname;

    /**
     * @var string
     *
     * @ORM\Column(name="mitarbeiterTelefon", type="string", length=40)
     */
    private $mitarbeiterTelefon;

    /**
     * @var string
     *
     * @ORM\Column(name="mitarbeiterAdresse", type="string", length=255)
     */
    private $mitarbeiterAdresse;


    /**
     * Get id
     *
     * @return int
     */
    public function getMitarbeiterNR()
    {
        return $this->mitarbeiterNR;
    }

    /**
     * Set mitarbeiterName
     *
     * @param string $mitarbeiterName
     *
     * @return Mitarbeiter
     */
    public function setMitarbeiterName($mitarbeiterName)
    {
        $this->mitarbeiterName = $mitarbeiterName;

        return $this;
    }

    /**
     * Get mitarbeiterName
     *
     * @return string
     */
    public function getMitarbeiterName()
    {
        return $this->mitarbeiterName;
    }

    /**
     * Set mitarbeiterVorname
     *
     * @param string $mitarbeiterVorname
     *
     * @return Mitarbeiter
     */
    public function setMitarbeiterVorname($mitarbeiterVorname)
    {
        $this->mitarbeiterVorname = $mitarbeiterVorname;

        return $this;
    }

    /**
     * Get mitarbeiterVorname
     *
     * @return string
     */
    public function getMitarbeiterVorname()
    {
        return $this->mitarbeiterVorname;
    }

    /**
     * Set mitarbeiterTelefon
     *
     * @param string $mitarbeiterTelefon
     *
     * @return Mitarbeiter
     */
    public function setMitarbeiterTelefon($mitarbeiterTelefon)
    {
        $this->mitarbeiterTelefon = $mitarbeiterTelefon;

        return $this;
    }

    /**
     * Get mitarbeiterTelefon
     *
     * @return string
     */
    public function getMitarbeiterTelefon()
    {
        return $this->mitarbeiterTelefon;
    }

    /**
     * Set mitarbeiterAdresse
     *
     * @param string $mitarbeiterAdresse
     *
     * @return Mitarbeiter
     */
    public function setMitarbeiterAdresse($mitarbeiterAdresse)
    {
        $this->mitarbeiterAdresse = $mitarbeiterAdresse;

        return $this;
    }

    /**
     * Get mitarbeiterAdresse
     *
     * @return string
     */
    public function getMitarbeiterAdresse()
    {
        return $this->mitarbeiterAdresse;
    }
}

