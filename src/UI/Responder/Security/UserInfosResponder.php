<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 17/11/2019
 * Time: 19:10
 */

namespace App\UI\Responder\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserInfosResponder
 * @package App\UI\Responder\Security
 */
class UserInfosResponder
{

    /**
     * @param Request $request
     * @param $data
     * @return JsonResponse
     */
    public function __invoke(
        Request $request,
        $data
    ): Response
    {
        $response = new Response($data, 200, ['Content-Type' => 'application/json']);

        return $response;
    }

}