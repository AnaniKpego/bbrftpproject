<?php

namespace App\EventListener;

use App\Entity\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class LoggedInUserListener
{
    private $router;
    private $security;

    public function __construct(RouterInterface $router, Security $security)
    {
        $this->router       = $router;
        $this->security     = $security;
    }

    /**
     * Redirect user to homepage if tries to access in anonymously path
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event)
    {
        $request    = $event->getRequest();
        $path       = $request->getPathInfo();
        $user = $this->security->getUser();

        if ($user && $this->isAnonymouslyPath($user,$path)) {
            $response = new RedirectResponse($this->router->generate('app_bbr_home'));
            $event->setResponse($response);
        }
    }

    /**
     * Check if $path is an anonymously path
     * @param UserInterface $user
     * @param string $path
     * @return bool
     */
    private function isAnonymouslyPath(UserInterface $user, string $path): bool
    {
//        if(in_array("ROLE_SUPER_ADMIN",$user->getRoles())){
//            return preg_match('/\/login|\/resetting/', $path) ? true : false;
//        }
        return preg_match('/\/login|\/register|\/resetting/', $path) ? true : false;
    }
}