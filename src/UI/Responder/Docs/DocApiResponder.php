<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 07/12/2018
 * Time: 21:03
 */

namespace App\UI\Responder\Docs;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class DocApiResponder
 * @package App\UI\Responder\Docs
 */
final class DocApiResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * [@inheritdoc}
     */
    public function __construct(
        Environment $twig
    ) {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request $request
    ): Response {
        return new Response(
            $this->twig->render('doc/index.html.twig')
        );
    }
}
