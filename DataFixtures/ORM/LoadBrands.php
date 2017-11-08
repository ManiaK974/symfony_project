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
 * Description of LoadBrands
 *
 * @author ManiaK
 */
class LoadBrands implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {
        $names_brand = array(
            'Ligier',
            'Aixam',
            'Microcar',
            'Chatenet',
            'Bellier',
            'Casalini',
            'JDM'
        );

        foreach ($names_brand as $name) {
            $brand = new Brand();
            $brand->setName($name);
            $manager->persist($brand);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder() {
        return 1;
    }

}
