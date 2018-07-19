<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Genius;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class loadFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        # Load a fixtures yml file
        #
        #
        //Fixtures::load(__DIR__.'/fixtures.yml', $manager);

        #
        # Same as above but with an extra 3th argument for the formatter providers
        # providers -> passing in this will add all providers to the yml file
        Fixtures::load(
                __DIR__.'/fixtures.yml',
                $manager,
                ['providers' => [$this] ]
            );



        #
        # Load yml file trough nativeloader
        #
//        $loader = new \Nelmio\Alice\Fixtures\Loader();
//        $objects = $loader->load(__DIR__.'/fixtures.yml', $manager);
//
//        $persister = new \Nelmio\Alice\Persister\Doctrine($manager);
//        $persister->persist($objects);

        #
        # Loop a few times to create random entries
        #
//        // create 20 products! Bam!
//        for ($i = 0; $i < 20; $i++) {
//
//            $genius = new Genius();
//            $genius->setName('Octopus'.rand(1, 100));
//            $genius->setSubFamily('Family'.rand(1, 100));
//            $genius->setSpeciesCount(rand(1, 100));
//            $genius->setFunFact('Funfact: '.rand(1, 100));
//            $genius->setLastUpdateAt( new \DateTime("now") );
//
//            $manager->persist($genius);
//            $manager->flush();


    }

    public function genius(){

        // Get from Database an list or now fake a list with names
        $aNames = array('name-1', 'name-2', 'name-3');

        // Pick random index number from array aNames
        $iKey = array_rand($aNames);

        // Return the name using the random index
        return $aNames[$iKey];

    }

}