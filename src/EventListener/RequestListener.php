<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class RequestListener
 * @package App\EventListener
 */
class RequestListener implements EventSubscriberInterface {

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();

        $request->attributes->set('refresh_token', $request->cookies->get('REFRESH_TOKEN'));
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [
                ['onKernelRequest']
            ]
        ];
    }
}