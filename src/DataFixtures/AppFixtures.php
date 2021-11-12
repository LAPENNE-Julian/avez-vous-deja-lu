<?php

namespace App\DataFixtures;

use App\Entity\Anecdote;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher; 
    private $slugger;
    
    public function __construct(UserPasswordHasherInterface $passwordHasher,SluggerInterface $slugger)
    {
        $this->passwordHasher = $passwordHasher;
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        //creation of fixtures
        $faker = Factory::create();

        //creation user with Role_User
        $basicUser = new User();
        $manager->persist($basicUser);
        $basicUser->setRoles(['ROLE_USER']);
        $basicUser->setPseudo('user');
        $basicUser->setEmail('user@avdl.fr');
        $hashedPassword = $this->passwordHasher->hashPassword($basicUser, 'useruser');
        $basicUser->setPassword($hashedPassword);

        //creation user with Role_Admin
        $adminUser = new User();
        $manager->persist($adminUser);
        $adminUser->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $adminUser->setPseudo('admin');
        $adminUser->setEmail('admin@avdl.fr');
        $adminUser->setPassword($this->passwordHasher->hashPassword($adminUser, 'adminadmi'));

        //creation list of categories
        $categoryList = [];
        for ($categoryNumber = 0; $categoryNumber < 5; $categoryNumber++) {
            $category = new Category();
            $manager->persist($category);

            $category->setName($faker->realText(10));
            $category->setSlug($this->slugger->slug(strtolower($category->getName())));
            $category->setColor($faker->hexcolor());

            // add all categories in array
            $categoryList[] = $category;
        }

        //creation anecdotes
        for ($i = 1; $i < 11; $i++) {
            $anecdote = new Anecdote();
            $manager->persist($anecdote);
            $title = $faker->realText(20);
            $anecdote->setTitle($title); 
            $anecdote->setDescription($faker->realText(50));
            $anecdote->setContent($faker->realText(200));
            $anecdote->setSource($faker->url());
            // add user to writer anecdote
            $anecdote->setWriter($basicUser);
            
            // random categories for anecdote
            $nbCategories = $faker->numberBetween(0, 5);
            $categoryForAnecdote = $faker->randomElements($categoryList, $nbCategories);

            foreach ($categoryForAnecdote as $currentCategory) {
                $anecdote->addCategory($currentCategory);
            }
        }
        
        //EntityManager create objects in database
        $manager->flush();
    }
}
