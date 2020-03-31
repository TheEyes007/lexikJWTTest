<?php
/**
 * Created by PhpStorm.
 * User: Matthieu
 * Date: 04/01/2019
 * Time: 12:29
 */

namespace App\Domain\Repository\MOOC;

use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    /**
     * @return mixed[]
     */
    public function findAllCustom()
    {
        $sql = "SELECT * from mooc.category";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll();
    }
}
