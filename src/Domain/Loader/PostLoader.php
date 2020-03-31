<?php

declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 25/11/2019
 * Time: 13:37
 */

namespace App\Domain\Loader;

use App\Domain\Models\MOOC\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class PostLoader
 * @package App\Domain\Loader
 */
final class PostLoader
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
     * PostLoader constructor.
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
    public function getPostList(): string
    {
        $repo = $this->em->getRepository(Post::class)->findAllCustom();

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }

    /**
     * @return string
     */
    public function getLastPosts($nb): string
    {
        $repo = $this->em->getRepository(Post::class)->findLast($nb);

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }

    /**
     * @return string
     */
    public function getPostById($slug): string
    {
        $repo = $this->em->getRepository(Post::class)->findBySlug($slug);

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }

    /**
     * @return string
     */
    public function getPostByChapter($slug): string
    {
        $repo = $this->em->getRepository(Post::class)->findByChapter($slug);

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }

    /**
     * @return string
     */
    public function getPostByPostsChapterId($slug): string
    {
        $repo = $this->em->getRepository(Post::class)->findByPostsChapterId($slug);

        $data = $this->serializer->serialize($repo, 'json');

        return $data;
    }
}
