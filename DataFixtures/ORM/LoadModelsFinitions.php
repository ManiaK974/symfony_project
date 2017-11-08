<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Model;
use AppBundle\Entity\Brand;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Description of LoadModelsFinitions
 *
 * @author ManiaK
 */
class LoadModelsFinitions implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        
    }

    public function findAllFinitions() {
        $em = $this->container->get('doctrine')->getEntityManager('default');
        $repository = $em->getRepository('AppBundle:Finition');
        $finitions = $repository->findAll();

        return $finitions;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder() {
        return 3;
    }

}
