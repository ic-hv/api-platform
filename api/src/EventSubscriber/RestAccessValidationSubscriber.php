<?php

namespace App\EventSubscriber;

use ApiPlatform\Symfony\EventListener\EventPriorities;
use App\Entity\Book;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class RestAccessValidationSubscriber implements EventSubscriberInterface {

    public static function getSubscribedEvents() {
        return [
            KernelEvents::VIEW => ['doSomething', EventPriorities::POST_WRITE],
        ];
    }

    public function doSomething(ViewEvent $event): void {
        $book = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$book instanceof Book || Request::METHOD_POST !== $method) {
            return;
        }

    }
}
