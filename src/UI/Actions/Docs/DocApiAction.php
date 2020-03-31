<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 07/12/2018
 * Time: 21:03
 */

namespace App\UI\Actions\Docs;


use App\UI\Responder\Docs\DocApiResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DocApiAction
 * @package App\UI\Action\Docs
 *
 * @Route(
 *      path = "/api/v1/doc",
 *      name = "documentation"
 * )
 */
final class DocApiAction
{

    /**
     * @param Request $request
     * @param DocApiResponder $responder
     * @return Response
     */
    public function __invoke(
        Request $request,
        DocApiResponder $responder
    ): Response {
        return $responder($request);
    }
}
