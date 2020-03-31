<?php
/**
 * Created by PhpStorm.
 * User: mvibert
 * Date: 17/11/2019
 * Time: 19:10
 */

namespace App\UI\Actions\Security;

use App\Security\JWTTokenManager\JWTUserProfile;
use App\UI\Responder\Security\UserInfosResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserLogAction
 * @package App\UI\Actions\Security
 * @Route(
 *     path="/api/v1/user/profile",
 *     methods={"GET"},
 *     name = "user_profiles_infos"
 * )
 */
class UserProfilesInfosAction
{

    /**
     * @var JWTUserProfile
     */
    private $userprofile;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * UserProfilesInfosAction constructor.
     * @param JWTUserProfile $userprofile
     * @param SerializerInterface $serializer
     */
    public function __construct(
        JWTUserProfile $userprofile,
        SerializerInterface $serializer
    ) {
        $this->userprofile = $userprofile;
        $this->serializer =$serializer;
    }

    /**
     * @param Request $request
     * @param UserInfosResponder $responder
     * @return Response
     */
    public function __invoke(
        Request $request,
        UserInfosResponder $responder
    ): Response {
        return $responder($request, $this->serializer->serialize($this->userprofile->getUser($request),'json'));
    }
}
