<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity]
class Studio
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^[\p{L}]/', message: "Studio name has to start with a letter.")]
    public string $name = '';

    #[ORM\OneToMany(mappedBy: 'studio', targetEntity: Production::class)]
    public iterable $productions;

    public function getId(): ?int
    {
        return $this->id;
    }

}
