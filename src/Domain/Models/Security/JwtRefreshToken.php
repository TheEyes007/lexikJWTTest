<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 23/02/2020
 * Time: 13:15
 */

namespace App\Domain\Models\Security;

use Doctrine\ORM\Mapping as ORM;
use Gesdinet\JWTRefreshTokenBundle\Entity\AbstractRefreshToken;

/**
 * This class override Gesdinet\JWTRefreshTokenBundle\Entity\RefreshToken to have another table name.
 *
 * @ORM\Table("security.jwt_refresh_token")
 * @ORM\Entity
 */
class JwtRefreshToken extends AbstractRefreshToken
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}