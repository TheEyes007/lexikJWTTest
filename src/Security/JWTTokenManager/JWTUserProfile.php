<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 23/02/2020
 * Time: 15:20
 */

namespace App\Security\JWTTokenManager;

use App\Domain\Models\Security\User;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class JWTUserProfile
 * @package App\Security\JWTTokenManager
 */
class JWTUserProfile
{

    /**
     * @var JWTEncoderInterface
     */
    private $jwtEncoder;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * JWTUserProfile constructor.
     * @param JWTEncoderInterface $jwtEncoder
     * @param EntityManagerInterface $em
     */
    public function __construct(
        JWTEncoderInterface $jwtEncoder,
        EntityManagerInterface $em
    ) {
        $this->jwtEncoder = $jwtEncoder;
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @return null|object
     */
    public function getUser(Request $request)
    {
        //Modify headers authorization to cookie - bug with this code
        /*
        $token = substr($request->headers->get('authorization'),'7',strlen($request->headers->get('authorization')));
        $userinfostoken = ['username' => $this->jwtEncoder->decode($token)['username'], 'roles' => $this->jwtEncoder->decode($token)['roles']];

        $userinfos = $this->em->getRepository(User::class)->findOneBy(['username' => $userinfostoken['username']]);

        $userinfos = [
            'username' => $userinfos->getUsername(),
            'email' => $userinfos->getEmail(),
            'roles' => $userinfos->getRoles()[0],
            'civilite' => $userinfos->getCivilite(),
            'name' => $userinfos->getName(),
            'firstname' => $userinfos->getFirstname(),
            'postcode' => $userinfos->getPostcode(),
            'city' => $userinfos->getCity(),
            'country' => $userinfos->getCountry(),
        ];

        return $userinfos;
        */

        return 'admin';
    }

    public function getUserMainInformation(Request $request)
    {
        $token = substr($request->headers->get('authorization'),'7',strlen($request->headers->get('authorization')));
        $userinfostoken = ['username' => $this->jwtEncoder->decode($token)['username'], 'roles' => $this->jwtEncoder->decode($token)['roles']];

        return $userinfostoken;
    }


}
