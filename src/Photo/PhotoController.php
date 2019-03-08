<?php

namespace App\Photo;

use App\Core\ValidationAware;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

/**
 * @Route("/pictures")
 */
class PhotoController extends AbstractController
{
    use ValidationAware;

    /**
     * @Route("", methods={"POST"})
     *
     * @OA\Get(
     *     path="/pictures",
     *     tags={"picture"},
     *     summary="Upload and save multiple pictures",
     *     description="Upload and save multiple pictures",
     *     operationId="uploadmultipictures",
     *     @OA\Parameter(
     *         in="query",
     *         name="from_country",
     *         description="Two-letter ISO country code of the country where the order shipped from.",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="to_country",
     *         description="Two-letter ISO country code of the country where the order shipped to.",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="hscode",
     *         description="HS Code describing the type of goods.",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="amount",
     *         description="Value of the goods, expressed in the smallest units of currency (eg cents).",
     *         required=true,
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="currency",
     *         description="Three-letter ISO currency code of the order.",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/DutyEstimate")
     *     )
     * )
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function duties(Request $request)
    {
        $this->validateRequiredParams(
            $request,
            []
        );

        return $this->json($request);
    }
}
