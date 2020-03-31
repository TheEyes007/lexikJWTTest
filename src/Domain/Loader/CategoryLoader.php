<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 25/11/2019
 * Time: 13:37
 */

namespace App\Domain\Loader;

use App\Domain\Models\MOOC\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class CategoryLoader
 * @package App\Domain\Loader
 */
final class CategoryLoader
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * CategoryLoader constructor.
     * @param EntityManagerInterface $em
     * @param SerializerInterface $serializer
     */
    public function __construct(
        EntityManagerInterface $em,
        SerializerInterface $serializer
    ) {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    /**
     * @return string
     */
    public function getCategoryList(): string
    {
        $repo = $this->em->getRepository(Category::class)->findAllCustom();

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }
}
