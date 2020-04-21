<?php

namespace GeodisBundle\Manager;

use Doctrine\ORM\EntityManager;
use GeodisBundle\DAO\Connection;
use GeodisBundle\DAO\Exception\ApiException;

abstract class GeodisManager
{
    protected $list = [];
    protected $model;
    protected $config;
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function init()
    {
        try {
            Connection::setConfig($this->config, $this->em);
        } catch (ApiException $e) {
            throw new Exception("Can't initiate connection: ", $e->getCode());
        }
    }

    /**
     * @return object
     */
    public function getModel($name)
    {
        try {
            $classname = $cname = 'GeodisBundle\\Model\\'.$name;

            $this->model = new $classname();

            return $this;
        } catch (ApiException $e) {
            throw new ApiException("Model doesn't existe : ", $e->getStatusCode());
        }
    }
}
