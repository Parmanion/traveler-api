<?php

namespace App\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

trait ValidationAware
{
    /**
     * Validate given required params on given request.
     *
     * @param Request $request
     * @param array   $requiredParams
     */
    public function validateRequiredParams(Request $request, array $requiredParams)
    {
        $params = $request->isMethod(Request::METHOD_GET) ? $request->query : $request->request;
        foreach ($requiredParams as $param) {
            if (!$params->has($param)) {
                throw new BadRequestHttpException("Parameter $param is required");
            }
        }
    }
}
