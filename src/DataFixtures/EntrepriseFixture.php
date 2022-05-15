<?php

namespace App\DataFixtures;
use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as factory ;

class EntrepriseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = factory::create();
        for ($i=0;$i<10;$i++){
            $entreprise = new Entreprise();
            $entreprise->setDesignation($faker->company )  ;
            $manager->persist($entreprise);
        }
        $manager->flush();


    }
}
