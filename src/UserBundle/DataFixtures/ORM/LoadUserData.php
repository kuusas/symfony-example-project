<?php
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Ponas Petras');
        $user->setEmail('petras@cleanphp.lt');
        $manager->persist($user);

        $user = new User();
        $user->setName('Panelė Adelė');
        $user->setEmail('adele@cleanphp.lt');
        $manager->persist($user);

        $manager->flush();
    }
}
