<?php
declare(strict_types=1);

namespace GeodisBundle\Entity;

use App\Common\Traits\TimestampableTrait;
use Gedmo\Mapping\Annotation as Gedmo;

class GeodisLogger
{
    use TimestampableTrait;

    public int $id;
    public int $code;
    public string $message;
    public string $called;
    public string $occured;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getCalled(): string
    {
        return $this->called;
    }

    public function setCalled(string $called): void
    {
        $this->called = $called;
    }

    public function getOccured(): string
    {
        return $this->occured;
    }

    public function setOccured(string $occured): void
    {
        $this->occured = $occured;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
