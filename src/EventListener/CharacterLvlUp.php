<?php

namespace App\EventListener;

use App\Entity\Character;
use App\Repository\LevelRepository;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\Events;    
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;

#[AsEntityListener(event: Events::postPersist, method: 'postPersist', entity: Character::class)]
class CharacterLvlUp
{
    private $levelRepository;

    public function __construct(LevelRepository $levelRepository)
    {
        $this->levelRepository = $levelRepository;
    }
    
    public function postPersist(Character $character, PostPersistEventArgs $event)
    {
        $entity = $event->getObject();

        if (!$entity instanceof Character) {
            return;
        }

        $charactersExperience   = $character->getExperience();

        $rightLevelCharacter    = $this->levelRepository->findLevelByCharactersExperience($charactersExperience);

        $character->setLevel($rightLevelCharacter);

        $em = $event->getEntityManager();
        $em->persist($character);
        $em->flush();
        
    }

}
