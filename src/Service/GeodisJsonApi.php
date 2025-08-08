<?php declare(strict_types=1);

namespace GeodisBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use GeodisBundle\Domain\Base\Model;
use GeodisBundle\Service\DAO\Connection;

class GeodisJsonApi extends GeodisManager
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em);
    }

    public function setConfig($config): void
    {
        parent::setConfig($config);
    }

    private function request(string $method, string $service, array|string|null $body = null): mixed
    {
        Connection::setContentType('json');

        return Connection::Request($method, $service, $body);
    }

    public function persist(Model $entity, string $service): mixed
    {
        $json = $entity->toJson();
        return $this->request('POST', $service, $json);
    }
}
