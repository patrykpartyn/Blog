<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-06-27
 * Time: 11:30
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Post;
class LoadPostData extends Fixture
{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for($i=1;$i<=1000;$i++){
            $post=new \AppBundle\Entity\Post();
            $post->setTitle($faker->sentence(3));
            $post->setLead($faker->text(300));
            $post->setContent($faker->text(700));
            $post->setCreatedAt($faker->DateTimeThisMonth);
            $manager->persist($post);


        }
        $manager->flush();
    }
}