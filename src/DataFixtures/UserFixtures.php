<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 07/02/2020
 * Time: 19:09
 */

namespace App\DataFixtures;

use App\Domain\Models\Security\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // ...
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@odazik.com');
        $user->setActive(true);
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPostcode('37000');
        $user->setCity('Tours');
        $user->setCountry('France');
        $user->setCivilite('M');
        $user->setFirstname('admin');
        $user->setName('admin');
        $user->setCreateAt();
        $user->setExpireAt();



        $password = $this->encoder->encodePassword($user, 'admin');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}