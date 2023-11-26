<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'app_api_login')]
    public function index():JsonResponse {

        var_dump($this->getUser());
        die();
        $user = $this->getUser();
        assert($user instanceof User);
        
        if(null === $user){
             return $this->json([
                 'message' => 'missing credentials',
             ], Response::HTTP_UNAUTHORIZED);
        }
        
        return $this->json([
            'user'  => $user->getUserIdentifier(),
        ], Response::HTTP_OK);
    }
}
