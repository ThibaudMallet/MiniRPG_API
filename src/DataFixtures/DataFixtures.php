<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Fight;
use App\Entity\Level;
use App\Entity\Monster;
use App\Entity\Character;
use Doctrine\DBAL\Connection;
use App\DataFixtures\MonstersLibData;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DataFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;
    private $connection;
    private $monstersLibData;

    private function truncate()
    {
        // $this->connection->executeQuery('SET foreign_key_checks = 0');
        // $this->connection->executeQuery('TRUNCATE TABLE user');
        // $this->connection->executeQuery('TRUNCATE TABLE level');
        // $this->connection->executeQuery('TRUNCATE TABLE character');
        // $this->connection->executeQuery('TRUNCATE TABLE monster');
        // $this->connection->executeQuery('TRUNCATE TABLE fight');
    }

    public function __construct(UserPasswordHasherInterface $hasher, Connection $connection, MonstersLibData $monstersLibData)
    {
        $this->hasher           = $hasher;
        $this->connection       = $connection;
        $this->monstersLibData  = $monstersLibData;
    }

    public function load(ObjectManager $manager)
    {

        $this->truncate();

        $users      = [];

        $userAdmin  = new User();
        $userAdmin->setUsername('admin');

        $password   = $this->hasher->hashPassword($userAdmin, 'admin');

        $userAdmin->setPassword($password);
        $userAdmin->setRoles(['ROLE_ADMIN']);

        $manager->persist($userAdmin);

        for ($i = 0; $i < 3; $i++) { 

            $user       = new User();
            $user->setUsername('User' . $i);

            $password   = $this->hasher->hashPassword($user, 'user');

            $user->setPassword($password);
    
            $manager->persist($user);

            $users[]    = $user;
        }

        $cumulExp   = 0;
        $levels     = [];

        for ($i = 1; $i < 100; $i++) { 

            $level      = new Level();
            
            $level->setExpToNextLvl(50 * ($i + $i/10));
            $level->setBaseExperience($cumulExp);
            
            $cumulExp   += 50 * ($i + $i/10);

            $manager->persist($level);

            $levels[]   = $level;
        }

        $characters = [];

        for ($i = 0; $i < 5; $i++) { 
            
            $character = new Character();

            $character->setName('Joueur' . $i);
            $character->setAttack(rand(1, 5));
            $character->setLife(rand(1, 5));
            $character->setShield(rand(1, 5));
            $character->setUser($users[rand(0, 2)]);
            $character->setlevel($levels[0]);
            
            $manager->persist($character);

            $characters[] = $character;

        }

        $monstersData = $this->monstersLibData->getDatas();

        $monsters = [];

        for ($i = 0; $i < 10; $i++) { 

            $monster = New Monster();

            $monster->setName($monstersData[$i]['name']);
            $monster->setAttack($monstersData[$i]['attack']);
            $monster->setLife($monstersData[$i]['life']);
            $monster->setShield($monstersData[$i]['shield']);
            $monster->setLvlMin($monstersData[$i]['lvl_min']);
            $monster->setLvlMax($monstersData[$i]['lvl_max']);
            $monster->setBaseExpReward($monstersData[$i]['base_experience']);

            $manager->persist($monster);

            $monsters[] = $monster;

        }

        $fights = [];

        foreach ($characters as $character) {

            for ($i = 0; $i < 3; $i++) { 
                
                $fight      = new Fight();
                $fight->setCharacter($character);
                $fight->setUser($character->getUser());

                $monster    = $monsters[(rand(0, 9))];

                $fight->setMonster($monster);

                $isVictory  = rand(0, 1);

                $fight->setIsVictory($isVictory);

                if ($isVictory) {

                    $expReward      = $monster->getBaseExpReward();

                    $fight->setExpWin($monster->getBaseExpReward($expReward));

                    $expCharacter   = $character->getExperience();

                    $character->setExperience($expCharacter + $expReward);

                } else {
                    $fight->setExpWin(0);
                }

                $manager->persist($fight);

                $fights[] = $fight;

            }

        }

        $manager->flush();
    }
}