<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 20/11/2019
 * Time: 18:55
 */

namespace App\Domain\Repository\Security;

use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class UserRepository
 * @package App\Domain\Models\Security\Repository
 */
class UserRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}