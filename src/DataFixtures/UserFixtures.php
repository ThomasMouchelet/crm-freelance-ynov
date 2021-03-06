<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $hash = $this->encoder->encodePassword($user, "admin");

        $user->setEmail("admin@admin.com")
            ->setFirstName("Thomas")
            ->setLastName("Mouchelet")
            ->setRoles(['ROLE_USER', 'ROLE_FREELANCE'])
            ->setPassword($hash);

        $manager->persist($user);
        $manager->flush();

        $this->addReference('userFreelance', $user);
    }
}
