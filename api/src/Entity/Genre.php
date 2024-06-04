<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Genre
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Regex(pattern: '/^[\p{Uppercase}]/', message: "Studio name has to start with an uppercase letter.")]
    private string $name = '';

    #[Orm\ManyToMany(targetEntity: Production::class, mappedBy: 'genres')]
    #[Assert\Valid]
    private Collection $productions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this -> productions = new ArrayCollection();
    }

    public function addProduction(Production $production): self{
        $this -> productions->add($production);
        return $this;
    }

    public function removeProduction(Production $production): self{
        $this -> productions->removeElement($production);
        return $this;
    }

    public function getProductions(): Collection{
        return $this -> productions;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self{
        $this->name = $name;
        return $this;
    }

}
