<?php
namespace UserBundle\DataFixtures\ORM;

use DateTime;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TaskBundle\Entity\Category;

class LoadCategoryData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Important');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Backlog');
        $manager->persist($category);

        $manager->flush();
    }
}
