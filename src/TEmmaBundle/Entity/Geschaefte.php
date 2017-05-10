<?php

namespace TEmmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geschaefte
 *
 * @ORM\Table(name="geschaefte")
 * @ORM\Entity(repositoryClass="TEmmaBundle\Repository\GeschaefteRepository")
 */
class Geschaefte
{
    /**
     * @var int
     *
     * @ORM\Column(name="geschäftNr", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $geschäftNr;

    /**
     * @var int
     *
     * @ORM\Column(name="kundeNR", type="integer", nullable=true)
     */
    private $kundeNR;

    /**
     * @var int
     *
     * @ORM\Column(name="Geschaeftsart", type="integer")
     */
    private $geschaeftsart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datum", type="datetime")
     */
    private $datum;

    /**
     * @var int
     *
     * @ORM\Column(name="angelegtVonMitarbeiter", type="integer")
     */
    private $angelegtVonMitarbeiter;


    /**
     * Get id
     *
     * @return int
     */
    public function getgeschäftNr()
    {
        return $this->$geschäftNr;
    }

    /**
     * Set kundeNR
     *
     * @param integer $kundeNR
     *
     * @return Geschaefte
     */
    public function setKundeNR($kundeNR)
    {
        $this->kundeNR = $kundeNR;

        return $this;
    }

    /**
     * Get kundeNR
     *
     * @return int
     */
    public function getKundeNR()
    {
        return $this->kundeNR;
    }

    /**
     * Set geschaeftsart
     *
     * @param integer $geschaeftsart
     *
     * @return Geschaefte
     */
    public function setGeschaeftsart($geschaeftsart)
    {
        $this->geschaeftsart = $geschaeftsart;

        return $this;
    }

    /**
     * Get geschaeftsart
     *
     * @return int
     */
    public function getGeschaeftsart()
    {
        return $this->geschaeftsart;
    }

    /**
     * Set datum
     *
     * @param \DateTime $datum
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
     * @return \DateTime
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set angelegtVonMitarbeiter
     *
     * @param integer $angelegtVonMitarbeiter
     *
     * @return Geschaefte
     */
    public function setAngelegtVonMitarbeiter($angelegtVonMitarbeiter)
    {
        $this->angelegtVonMitarbeiter = $angelegtVonMitarbeiter;

        return $this;
    }

    /**
     * Get angelegtVonMitarbeiter
     *
     * @return int
     */
    public function getAngelegtVonMitarbeiter()
    {
        return $this->angelegtVonMitarbeiter;
    }
}

