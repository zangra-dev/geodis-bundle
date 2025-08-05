<?php

namespace GeodisBundle\Manager;

use Doctrine\ORM\EntityManager;
use GeodisBundle\DAO\Connection;
use GeodisBundle\DAO\Exception\ApiException;

/**
 * Author: Maxime Lambot <maxime@lambot.com>.
 * Author: Nils méchin <nils@zangra.com>
 */
class GeodisJsonApi extends GeodisManager
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
    }

    public function setConfig($config)
    {
        parent::setConfig($config);
    }

    private function request($method, $service, $body = null)
    {
        Connection::setContentType('json');

        return Connection::Request($method, $service, $body);
    }

    public function persist($entity, $service)
    {
        $json = $entity->toJson();
        $result = $this->request('POST', $service, $json);

        return $result;
    }
}
