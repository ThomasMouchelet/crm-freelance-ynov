<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CustomerFixtures extends Fixture implements DependentFixtureInterface
{

    public function getDependencies()
    {
        return [UserFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $cutomer = new Customer();

            $cutomer->setFirstName($faker->firstName())
                ->setLastName($faker->lastName())
                ->setEmail($faker->email())
                ->setCompany($faker->company());

            $user = $this->getReference('userlance');
            $cutomer->setFreelancer($user);

            $manager->persist($cutomer);

            $this->addReference('customer' . $i, $user);
        }

        $manager->flush();
    }
}
