<?php

namespace App\Controller;

use App\Entity\Character;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiCharacterController extends AbstractController
{
    /**
     * Return information about a character
     */
    #[Route('/api/character/{id}', name: 'app_api_character_get_item', methods: 'GET')]
    public function getCharacterItem(Character $character): JsonResponse
    {
        return $this->json(
            $character,
            Response::HTTP_OK,
            [],
            ['groups' => 'api_get_character']);
    }

    /**
     * Return informations about all characters
     */
    #[Route('/api/character', name: 'app_api_character_get_collections', methods: 'GET')]
    public function getMonsterCollection(CharacterRepository $characterRepository): JsonResponse
    {
        $characters = $characterRepository->findAll();

        return $this->json(
            $characters,
            Response::HTTP_OK,
            [],
            ['groups' => 'api_get_character']);
    }

    /**
     * Allow to create a new monster
     */
    // #[Route('/api/monster', name: 'app_api_monster_post_item', methods: 'POST')]
    // public function postMonsterItem(
    //     Request $request, 
    //     SerializerInterface $serializer, 
    //     ValidatorInterface $validator, 
    //     ManagerRegistry $doctrine,
    //     MonsterRepository $monsterRepository
    // ): JsonResponse
    // {
    //     $jsonContent = $request->getContent();

    //     $monster = $serializer->deserialize($jsonContent, Monster::class, 'json');
        
    //     $errors = $validator->validate($monster);

    //     if (count($errors) > 0) {           
    //         $errorsClean = [];

    //         /** @var ConstraintViolation $error the error */
    //         foreach($errors as $error) {
    //             $errorsClean[$error->getPropertyPath()][] = $error->getMessage();
    //         }

    //         return $this->json([
    //             'errors' => $errorsClean
    //         ], Response::HTTP_UNPROCESSABLE_ENTITY);
    //     }

    //     // persist and flush the entity
    //     $manager = $doctrine->getManager();
    //     $manager->persist($monster);
    //     $manager->flush();

    //     return $this->json(
    //         $monster,
    //         Response::HTTP_CREATED,
    //         [],
    //         ['groups' => 'api_get_monster']);
    // }
}
