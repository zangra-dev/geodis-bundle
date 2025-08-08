<?php
declare(strict_types=1);

namespace GeodisBundle\Service\DAO\Exception;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class ApiException.
 */
class ApiException extends HttpException implements ApiExceptionInterface
{
    public function __construct(string $message, int $statusCode, Exception $previous = null)
    {
        parent::__construct($statusCode, $message, $previous);
    }
}
