<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class AuthenticationSuccessListener
{
    /**
     * @var integer
     */
    private $jwtTokenTTL;

    /**
     * @var JWTEncoderInterface
     */
    private $decoder;

    public function __construct(
        $ttl,
        JWTEncoderInterface $decoder
    ) {
        $this->jwtTokenTTL = $ttl;
        $this->decoder = $decoder;
    }

    /**
     * This function is responsible for the authentication part
     *
     * @param AuthenticationSuccessEvent $event
     * @return JWTAuthenticationSuccessResponse
     */
    public function onAuthenticationSuccess(AuthenticationSuccessEvent $event)
    {
        /** @var JWTAuthenticationSuccessResponse $response */
        $response = $event->getResponse();
        $data = $event->getData();
        $tokenJWT = $data['token'];

        $decodeToken = $this->decoder->decode($data['token']);

        $data['token'] = [$decodeToken['username'], $decodeToken['roles'][0]];

        unset($data['refresh_token']);
        $event->setData($data);

        $response->headers->setCookie(Cookie::create('BEARER', $tokenJWT,mktime()+4200+$this->jwtTokenTTL ,'/', null, false, true));

        return $response;
    }
}
