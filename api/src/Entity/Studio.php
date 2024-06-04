<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity]
class Studio
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: "uuid", unique: true)]
//    #[Assert\Uuid]
    private ?Uuid $uuid;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^[\p{L}]/', message: "Studio name has to start with a letter.")]
    private string $name = '';

    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Production::class)]
    private iterable $productions;

    public function __construct()
    {
        $this -> uuid = new UuidV4();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getProductions(): iterable
    {
        return $this->productions;
    }

    public function setProductions(iterable $productions): self
    {
        $this->productions = $productions;
        return $this;
    }

    public function setUuid(Uuid $uuid): self
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }



}
