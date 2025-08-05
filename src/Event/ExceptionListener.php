<?php

namespace GeodisBundle\Event;

use Doctrine\ORM\EntityManagerInterface;
use GeodisBundle\Entity\GeodisLogger;
use GeodisBundle\Service\DAO\Exception\ApiExceptionInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

#[AsEventListener(event: 'kernel.exception')]
class ExceptionListener
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onKernelException(ExceptionEvent $event)
    {
        if ($event->getThrowable() instanceof ApiExceptionInterface || $event->getThrowable() instanceof GuzzleException) {
            $response = new JsonResponse($event->getThrowable()->getMessage());
            $event->setResponse($response);

            $this->log($event->getThrowable());
        }
    }

    private function log($exception)
    {
        $log = new GeodisLogger();
        $log->setCode(method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : $exception->getCode());
        $log->setMessage($exception->getMessage());
        $log->setCalled('file :'.$exception->getTrace()[0]['file'].' line : '.$exception->getTrace()[0]['line']);
        $log->setOccured('file :'.$exception->getFile().' line : '.$exception->getLine());

        $this->em->persist($log);
        $this->em->flush();
    }
}
