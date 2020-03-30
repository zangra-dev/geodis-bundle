<?php

namespace Geodis\Event;

use Doctrine\ORM\EntityManager;
use Exception;
use Geodis\DAO\Exception\ApiExceptionInterface;
use Geodis\Entity\GeodisLogger;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;


class ExceptionListener{

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($event->getException() instanceof ApiExceptionInterface || $event->getException() instanceof GuzzleException) {

            $response = new JsonResponse($event->getException()->getMessage());
            $event->setResponse($response);

            $this->log($event->getException());
        }

    }

    private function log($exception)
    {
        $log = new GeodisLogger();
        $log->setCode(method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : $exception->getCode());
        $log->setMessage($exception->getMessage());
        $log->setCalled('file :'. $exception->getTrace()[0]['file'].' line : '.$exception->getTrace()[0]['line']);
        $log->setOccured('file :'. $exception->getFile() .' line : '.$exception->getLine());

        $this->em->persist($log);
        $this->em->flush();
    }

}


?>