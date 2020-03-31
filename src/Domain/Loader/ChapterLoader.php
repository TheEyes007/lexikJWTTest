<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 25/11/2019
 * Time: 13:37
 */

namespace App\Domain\Loader;

use App\Domain\Models\MOOC\Chapter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ChapterLoader
 * @package App\Domain\Loader
 */
final class ChapterLoader
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
     * ChapterLoader constructor.
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
    public function getChapterList(): string
    {
        $repo = $this->em->getRepository(Chapter::class)->findAllCustom();

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }

    /**
     * @return string
     */
    public function getChapterListByPostSlug($slug): string
    {
        $repo = $this->em->getRepository(Chapter::class)->findByPostSlug($slug);

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }

    /**
     * @return string
     */
    public function getChapterListByCategorySlug($slug): string
    {
        $repo = $this->em->getRepository(Chapter::class)->findByCategorySlug($slug);

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }
}
