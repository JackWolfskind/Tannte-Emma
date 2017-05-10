<?php

namespace TEmmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Warenkorb
 *
 * @ORM\Table(name="warenkorb")
 * @ORM\Entity(repositoryClass="TEmmaBundle\Repository\WarenkorbRepository")
 */
class Warenkorb
{
    /**
     * @var int
     *
     * @ORM\Column(name="geschäftID", type="integer")
     * @ORM\Id
     */
    private $geschaeftID;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelNR", type="integer")
     * @ORM\Id
     */
    private $artikelNR;

    /**
     * @var int
     *
     * @ORM\Column(name="artikelMenge", type="integer")
     */
    private $artikelMenge;


    /**
     * Get id
     *
     * @return int
     */
    public function getGeschäftID()
    {
        return $this->geschäftID;
    }
	
	/**
     * Set artikelNR
     *
     * @param integer $artikelNR
     *
     * @return Warenkorb
     */
    public function setGeschäftID($GeschäftID)
    {
        $this->geschäftID = $geschäftID;

        return $this;
    }


    /**
     * Set artikelNR
     *
     * @param integer $artikelNR
     *
     * @return Warenkorb
     */
    public function setArtikelNR($artikelNR)
    {
        $this->artikelNR = $artikelNR;

        return $this;
    }

    /**
     * Get artikelNR
     *
     * @return int
     */
    public function getArtikelNR()
    {
        return $this->artikelNR;
    }

    /**
     * Set artikelMenge
     *
     * @param integer $artikelMenge
     *
     * @return Warenkorb
     */
    public function setArtikelMenge($artikelMenge)
    {
        $this->artikelMenge = $artikelMenge;

        return $this;
    }

    /**
     * Get artikelMenge
     *
     * @return int
     */
    public function getArtikelMenge()
    {
        return $this->artikelMenge;
    }
}

