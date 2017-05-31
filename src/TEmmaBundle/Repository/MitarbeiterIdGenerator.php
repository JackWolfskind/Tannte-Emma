<?php
namespace TEmmaBundle\Repository;


use Doctrine\ORM\Id\AbstractIdGenerator;
use Doctrine\ORM\EntityManager as EntityManager;

class MitarbeiterIdGenerator extends AbstractIdGenerator {
    public function generate(EntityManager $em, $entity){
        return 0;
    }
}
?>
