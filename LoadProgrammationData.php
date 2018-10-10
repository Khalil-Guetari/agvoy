<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ProgrammationCircuit;

class LoadProgrammationData extends Fixture {
    
    public function load(ObjectManager $manager)
    {
        $circuit=$this->getReference('andalousie-circuit');
        
        $programmations = new ProgrammationCircuit();
        $programmations->setDateDepart("2018-10-25");
        $programmations->setNombrePersonnes(20);
        $programmations->setPrix(150);
        $programmations->setCircuit($circuit);
        $manager->persist($programmations);
        
        $this->addReference('andalousie-circuit', $programmations);
        
        $circuit=$this->getReference('idf-circuit');
        
        $programmations = new ProgrammationCircuit();
        $programmations->setDateDepart("2018-11-12");
        $programmations->setNombrePersonnes(40);
        $programmations->setPrix(200);
        $programmations->setCircuit($circuit);
        $manager->persist($programmations);
        
        $this->addReference('idf-circuit', $programmations);
        
        $manager->flush();
    }

    
}