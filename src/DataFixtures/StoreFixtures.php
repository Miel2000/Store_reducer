<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StoreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($p=0; $p < 10; $p++) { 
            $product = new Product();
            $actualPrice = $product->getPrice() || 10;
            $reducedPrice = ((30 * 100) / $actualPrice);
            $product->setName($faker->word( $nb = 3, $asText = false ))
                    ->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200))
                    ->setDiscountedPrice($reducedPrice)
                    ->setType($faker->randomElement($array = array ('Electro-ménagé','Décoration Intérieur','Equipement Cusine')));
            $manager->persist($product);
        };

        $manager->flush();
    }
}