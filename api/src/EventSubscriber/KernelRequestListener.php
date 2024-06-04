<?php

namespace App\EventSubscriber;

use Gedmo\Blameable\BlameableListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class KernelRequestListener
{

    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
        private readonly BlameableListener $blameableListener,
    )
    {
    }

    public function __invoke(RequestEvent $event): void
    {
        if (
            $this->tokenStorage !== null &&
            $this->tokenStorage->getToken() !== null
        ) {
            $this->blameableListener->setUserValue($this->tokenStorage->getToken()->getUser());
        }
    }
}