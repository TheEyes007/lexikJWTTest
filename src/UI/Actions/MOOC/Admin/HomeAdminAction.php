<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 17/11/2019
 * Time: 19:10
 */

namespace App\UI\Actions\MOOC\Admin;

use App\UI\Responder\MOOC\Admin\HomeAdminResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeAdminAction
 * @package App\UI\Actions\Security
 * @Route(
 *     path="/api/v1/admin",
 *     methods={"GET"},
 *     name = "home_admin"
 * )
 */
class HomeAdminAction
{

    /**
     * @param Request $request
     * @param HomeAdminResponder $responder
     * @return Response
     */
    public function __invoke(
        Request $request,
        HomeAdminResponder $responder
    ): Response {
        return $responder($request, json_encode(['a' => 'Hello Admin']));
    }



}