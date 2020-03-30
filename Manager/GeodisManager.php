<?php

namespace Geodis\Manager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Geodis\DAO\Connection;
use Geodis\DAO\Exception\ApiException;


abstract class ExactManager
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

    public function init($code)
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
            $classname = $cname = 'Geodis\\Model\\'.$name;

            $this->model = new $classname();

            return $this;
        } catch (ApiException $e) {
            throw new ApiException("Model doesn't existe : ", $e->getStatusCode());
        }
    }
}
