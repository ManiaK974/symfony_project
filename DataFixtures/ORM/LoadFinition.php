<?php

// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Finition;

class LoadFinition implements FixtureInterface, OrderedFixtureInterface  {

    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager) {
        // Liste des noms de catégorie à ajouter
        $names = array(
            'Elegance',
            'Sport',
            'Premium',
            'Dynamic',
            'Club',
            'Initiale'
        );

        foreach ($names as $name) {
            // On crée la catégorie
            $finition = new Finition();
            $finition->setName($name);

            // On la persiste
            $manager->persist($finition);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
    
       /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }

}
