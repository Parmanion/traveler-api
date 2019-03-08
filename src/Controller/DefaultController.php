<?php

namespace App\Controller;

use OpenApi\Annotations as OA;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @OA\Info(
 *     title="TRAVELER API",
 *     version="1.0",
 *     @OA\Contact(
 *         email="test@test.com"
 *   )
 * )
 * @OA\Tag(
 *   name="picture",
 *   description="pictures manipulation"
 * )
 * @OA\Tag(
 *   name="travel",
 *   description="travels did"
 * )
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        throw $this->createNotFoundException();
    }
}
