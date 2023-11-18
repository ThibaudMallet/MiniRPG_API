<?php

namespace App\Controller;

use App\Entity\Monster;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiMonsterController extends AbstractController
{
    /**
     * Return information about a monster
     */
    #[Route('/api/monster/{id}', name: 'app_api_monster_get_item', methods: 'GET')]
    public function index(Monster $monster): JsonResponse
    {
        return $this->json(
            $monster,
            Response::HTTP_OK,
            [],
            ['api_monster_get']);
    }
}
