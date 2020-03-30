<?php

namespace GeodisBundle\Entity;

class GeodisLogger
{
    private $id;
    private $code;
    private $message;
    private $called;
    private $occured;
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     *
     * @return self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalled()
    {
        return $this->called;
    }

    /**
     * @param mixed $called
     *
     * @return self
     */
    public function setCalled($called)
    {
        $this->called = $called;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOccured()
    {
        return $this->occured;
    }

    /**
     * @param mixed $occured
     *
     * @return self
     */
    public function setOccured($occured)
    {
        $this->occured = $occured;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
