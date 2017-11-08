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
 * Description of LoadModel
 *
 * @author ManiaK
 */
class LoadModels implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {

        $em = $this->container->get('doctrine')->getEntityManager('default');
        $repository = $em->getRepository('AppBundle:Brand');
        $entities = $repository->findAll();

        $this->loadModelsLigier($manager, $entities[0]);
        $this->loadModelsAixam($manager, $entities[1]);
        $this->lodaModelsMicrocar($manager, $entities[2]);
        $manager->flush();
    }
    
    public function loadModelsLigier(ObjectManager $manager, $brand) {
        $names_ligier = array(
            'JS50',
            'JS50L',
        );

        foreach ($names_ligier as $name) {
            // On crée la catégorie
            $model = new Model();
            $model->setName($name);
            $model->setBrand($brand);
            $manager->persist($model);
        }
    }

    public function loadModelsAixam(ObjectManager $manager, $brand) {
        $names_aixam = array(
            'City',
            'Crossline',
            'Coupé'
        );

        foreach ($names_aixam as $name) {
            // On crée la catégorie
            $model = new Model();
            $model->setName($name);
            $model->setBrand($brand);
            $manager->persist($model);
        }
    }

    public function lodaModelsMicrocar(ObjectManager $manager, $brand) {
        $names_microcar = array(
            'M.GO',
            'Flex',
            'Dué'
        );

        foreach ($names_microcar as $name) {
            // On crée la catégorie
            $model = new Model();
            $model->setName($name);
            $model->setBrand($brand);
            $manager->persist($model);
        }
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
