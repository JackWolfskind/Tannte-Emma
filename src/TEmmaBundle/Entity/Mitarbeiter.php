<?php

namespace TEmmaBundle\Entity;

use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use TEmmaBundle\Repository\MitarbeiterIdGenerator;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Mitarbeiter
 */
class Mitarbeiter implements UserInterface, \Serializable {

    /**
     * @var string
     */
    private $mitarbeitername;

    /**
     * @var string
     */
    private $mitarbeitervorname;

    /**
     * @var string
     */
    private $mitarbeitertelefon;

    /**
     * @var string
     */
    private $mitarbeiteradresse;

    /**
     * @var string
     */
    private $passwd;

    /**
     * @var string
     * @Id
     * @GeneratedValue(strategy="CUSTOM") 
     * @CustomIdGenerator(class="TEmmaBundle\Repository\MitarbeiterIdGenerator")
     */
    private $mitarbeiterid;

    /**
     * Set mitarbeitername
     *
     * @param string $mitarbeitername
     *
     * @return Mitarbeiter
     */
    public function setMitarbeitername($mitarbeitername) {
        $this->mitarbeitername = $mitarbeitername;

        return $this;
    }
    
    public function setMitarbeiterid($mitarbeiterid) {
        $this->mitarbeiterid = $mitarbeiterid;

        return $this;
    }

    /**
     * Get mitarbeitername
     *
     * @return string
     */
    public function getMitarbeitername() {
        return $this->mitarbeitername;
    }

    /**
     * Set mitarbeitervorname
     *
     * @param string $mitarbeitervorname
     *
     * @return Mitarbeiter
     */
    public function setMitarbeitervorname($mitarbeitervorname) {
        $this->mitarbeitervorname = $mitarbeitervorname;

        return $this;
    }

    /**
     * Get mitarbeitervorname
     *
     * @return string
     */
    public function getMitarbeitervorname() {
        return $this->mitarbeitervorname;
    }

    /**
     * Set mitarbeitertelefon
     *
     * @param string $mitarbeitertelefon
     *
     * @return Mitarbeiter
     */
    public function setMitarbeitertelefon($mitarbeitertelefon) {
        $this->mitarbeitertelefon = $mitarbeitertelefon;

        return $this;
    }

    /**
     * Get mitarbeitertelefon
     *
     * @return string
     */
    public function getMitarbeitertelefon() {
        return $this->mitarbeitertelefon;
    }

    /**
     * Set mitarbeiteradresse
     *
     * @param string $mitarbeiteradresse
     *
     * @return Mitarbeiter
     */
    public function setMitarbeiteradresse($mitarbeiteradresse) {
        $this->mitarbeiteradresse = $mitarbeiteradresse;

        return $this;
    }

    /**
     * Get mitarbeiteradresse
     *
     * @return string
     */
    public function getMitarbeiteradresse() {
        return $this->mitarbeiteradresse;
    }

    /**
     * Set passwd
     *
     * @param string $passwd
     *
     * @return Mitarbeiter
     */
    public function setPasswd($passwd) {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get passwd
     *
     * @return string
     */
    public function getPasswd() {
        return $this->passwd;
    }

    /**
     * Get mitarbeiterid
     *
     * @return string
     */
    public function getMitarbeiterid() {
        return $this->mitarbeiterid;
    }

    public function createId() {
        $id = substr($this->mitarbeitervorname, 0, 1);
        $id = $id . $this->mitarbeitername;
        $this->mitarbeiterid = substr($id, 0, 5);
    }

    public function __toString() {
        return $this->mitarbeitername . ", " . $this->mitarbeitervorname;
    }

    public function serialize() {
        return serialize(array(
            $this->mitarbeiterid,
            $this->passwd,
        ));
    }

    public function unserialize($serialized) {
        list (
                $this->mitarbeiterid,
                $this->passwd,
                ) = unserialize($serialized);
    }

    public function getRoles() {
        return array("ROLE_ADMIN");
    }

    public function getPassword() {
        return $this->getPasswd();
    }

    public function getSalt() {
        return null;
    }

    public function getUsername() {
        return $this->getMitarbeiterid();
    }

    public function eraseCredentials() {
        
    }

}
