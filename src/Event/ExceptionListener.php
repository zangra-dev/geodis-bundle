<?php

namespace GeodisBundle\Event;

use Doctrine\ORM\EntityManagerInterface;
use GeodisBundle\Entity\GeodisLogger;
use GeodisBundle\Service\DAO\Exception\ApiExceptionInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionListener
{
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {}

    #[AsEventListener(event: KernelEvents::EXCEPTION)]
    public function onKernelException(ExceptionEvent $event): void
    {
        $e = $event->getThrowable();

        if (!($e instanceof ApiExceptionInterface || $e instanceof GuzzleException)) {
            return;
        }

        $status = $e instanceof HttpExceptionInterface ? $e->getStatusCode() : 500;

        $event->setResponse(new JsonResponse(
            ['error' => $e->getMessage()],
            $status
        ));

        $this->log($e);
    }

    private function log(\Throwable $exception): void
    {
        try {
            $log = new GeodisLogger();

            $statusOrCode = $exception instanceof HttpExceptionInterface
                ? $exception->getStatusCode()
                : ($exception->getCode() !== 0 ? $exception->getCode() : 500);

            $trace  = $exception->getTrace();
            $first  = $trace[0] ?? null;

            $called  = $first
                ? sprintf('file: %s line: %s', $first['file'] ?? 'n/a', $first['line'] ?? 'n/a')
                : 'n/a';

            $occured = sprintf('file: %s line: %s', $exception->getFile(), $exception->getLine());

            $log->setCode((int) $statusOrCode);
            $log->setMessage($exception->getMessage());
            $log->setCalled($called);
            $log->setOccured($occured);

            $this->em->persist($log);
            $this->em->flush();
        } catch (\Throwable $e) {
            $this->log($e);
        }
    }
}
