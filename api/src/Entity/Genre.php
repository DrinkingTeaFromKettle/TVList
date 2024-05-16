<?php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Genre
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;
    #[ORM\Column]
    private string $name = '';
    #[Orm\ManyToMany(targetEntity: Production::class, inversedBy: 'genres')]
//    #[Orm\JoinTable(name: 'production_genre')]
    public Collection $productions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
