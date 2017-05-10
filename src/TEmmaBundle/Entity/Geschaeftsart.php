<?php

namespace TEmmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geschaeftsart
 *
 * @ORM\Table(name="geschaeftsart")
 * @ORM\Entity(repositoryClass="TEmmaBundle\Repository\GeschaeftsartRepository")
 */
class Geschaeftsart
{
    /**
     * @var int
     *
     * @ORM\Column(name="ArtID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $ArtId;

    /**
     * @var string
     *
     * @ORM\Column(name="artBezeichnung", type="string", length=45)
     */
    private $artBezeichnung;


    /**
     * Get id
     *
     * @return int
     */
    public function getArdId()
    {
        return $this->ArtID;
    }

    /**
     * Set artBezeichnung
     *
     * @param string $artBezeichnung
     *
     * @return Geschaeftsart
     */
    public function setArtBezeichnung($artBezeichnung)
    {
        $this->artBezeichnung = $artBezeichnung;

        return $this;
    }

    /**
     * Get artBezeichnung
     *
     * @return string
     */
    public function getArtBezeichnung()
    {
        return $this->artBezeichnung;
    }
}

