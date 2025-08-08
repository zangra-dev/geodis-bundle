<?php declare(strict_types=1);

namespace GeodisBundle\Entity;

use App\Common\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \GeodisBundle\Repository\GeodisLoggerRepository::class)]
#[ORM\Table(name: 'export_geodis_log')]
class GeodisLogger
{
    use TimestampableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    // en XML c'était "text" mais la propriété est un entier : on aligne en integer
    #[ORM\Column(type: 'integer')]
    private int $code;

    #[ORM\Column(type: 'text')]
    private string $message;

    #[ORM\Column(type: 'text')]
    private string $called;

    #[ORM\Column(type: 'text')]
    private string $occured;

    public function getId(): ?int
    {
        return $this->id;
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
}
