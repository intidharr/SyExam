<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\PFE;
use App\Entity\Entreprise;
use Faker\Factory as factory ;
class PFEFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = factory::create();
        for ( $i =0;$i<20;$i++){

            $pfe = new PFE();
            $pfe->setTitle($faker->word )  ;
            $pfe->setStudent($faker->name);
            $entreprise= new Entreprise();
            $entreprise->setDesignation($faker->company )  ;
            $pfe->setEntreprise($entreprise);
            $manager->persist($entreprise);
            $manager->persist($pfe);}
        $manager->flush();
    }
}
