<?php
/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 04/01/2019
 * Time: 12:29
 */

namespace App\Domain\Repository\MOOC;

use Doctrine\ORM\EntityRepository;

class ChapterRepository extends EntityRepository
{
    /**
     * @return mixed[]
     */
    public function findAllCustom()
    {
        $sql = "SELECT * from mooc.chapter";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     * @return mixed[]
     */
    public function findLast($nb)
    {
        $sql = "SELECT * from mooc.chapter ORDER BY id DESC LIMIT $nb";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     * @param $slug
     * @return mixed[]
     */
    public function findByPostSlug($slug)
    {
        $sql = "SELECT * FROM mooc.chapter WHERE category_id = (SELECT category_id FROM mooc.posts a
                INNER JOIN mooc.chapter b ON chapter_id = b.id
                WHERE a.slug = '$slug')";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }

    /**
     * @param $slug
     * @return mixed[]
     */
    public function findByCategorySlug($slug)
    {
        $sql = "SELECT a.id, category_id, a.number, a.name, a.slug, a.language FROM mooc.chapter a
                INNER JOIN (SELECT id, slug FROM mooc.category) b ON category_id = b.id
                WHERE b.slug = '$slug'";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }
}
