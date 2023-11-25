<?php

namespace App\Controller;

use App\Entity\Monster;
use App\Repository\MonsterRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiMonsterController extends AbstractController
{
    #[Route('/api/monster/{id}', name: 'app_api_monster_get_item', methods: 'GET')]
    public function getMonsterItem(Monster $monster): JsonResponse
    {
        return $this->json(
            $monster,
            Response::HTTP_OK,
            [],
            ['groups' => 'api_get_monster']);
    }

    #[Route('/api/monster', name: 'app_api_monster_get_collections', methods: 'GET')]
    public function getMonsterCollection(MonsterRepository $monsterRepository): JsonResponse
    {
        $monsters = $monsterRepository->findAll();

        return $this->json(
            $monsters,
            Response::HTTP_OK,
            [],
            ['groups' => 'api_get_monster']);
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
