<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 17/11/2019
 * Time: 19:10
 */

namespace App\UI\Responder\MOOC\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeAdminResponder
 * @package App\UI\Responder\Security
 */
class HomeAdminResponder
{

    /**
     * @param Request $request
     * @param $data
     * @return Response
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