<?php

namespace App\DataFixtures;


use App\Entity\Invoice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class InvoiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [CustomerFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $invoice = new Invoice();

            $invoice->setAmount($faker->randomFloat(2, 250, 5000))
                ->setSendingAt($faker->dateTimeBetween('-6 months'))
                ->setStatus($faker->randomElement(['SENT', 'PAID', 'CANCELED']));

            $customer = $this->getReference("customer" . rand(0, 9));
            $invoice->setCustomer($customer);

            $manager->persist($invoice);
        }

        $manager->flush();
    }
}
