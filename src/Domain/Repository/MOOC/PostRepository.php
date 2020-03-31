<?php
/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 04/01/2019
 * Time: 12:29
 */

namespace App\Domain\Repository\MOOC;

use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    /**
     * @return mixed[]
     */
    public function findAllCustom()
    {
        $sql = "SELECT * from mooc.posts";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }


    /**
     * @return mixed[]
     */
    public function findLast($nb)
    {
        $sql = "SELECT * from mooc.posts ORDER BY id DESC LIMIT $nb";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     * @param $slug
     * @return mixed[]
     */
    public function findBySlug($slug)
    {
        $sql = "SELECT b.id, d.name as category_name, a.name as chapter_name, username, b.title, b.description, b.tags, b.contents, b.slug, b.\"number\", b.language from mooc.posts b
                INNER JOIN mooc.chapter a ON a.id = chapter_id
                INNER JOIN mooc.category d ON d.id = category_id
                INNER JOIN security.users c ON c.id = user_id
                WHERE b.slug = '$slug'";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     * @param $slug
     * @return mixed[]
     */
    public function findByChapter($slug)
    {
        $sql = "SELECT * FROM mooc.posts WHERE chapter_id = (SELECT id FROM mooc.chapter WHERE slug = '$slug')";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     * @param $slug
     * @return mixed[]
     */
    public function findByPostsChapterId($slug)
    {
        $sql = "SELECT a.id, a.title, a.description, a.slug FROM mooc.posts a WHERE chapter_id = (SELECT chapter_id FROM mooc.posts WHERE slug = '".$slug."')";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }
}
