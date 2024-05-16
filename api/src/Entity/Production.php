<?php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Production
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;
    #[ORM\Column]
    public string $title = '';
    #[ORM\Column(type: 'text')]
    public string $description = '';
    #[Orm\ManyToOne(inversedBy: 'productions')]
    public ?Studio $studio = null;
    #[Orm\ManyToMany(targetEntity: Genre::class, inversedBy: 'productions')]
    #[Orm\JoinTable(name: 'productions_genre')]
    public Collection $genre;
    #[ORM\Column(type: 'integer')]
    public ?int $episodes = null;
    #[ORM\Column(type: 'integer', nullable: true)]
    public int $currentEpisodes = 0;
    #[ORM\Column(nullable: true)]
    public ?string $trailerLink = '';
//    #[ORM\Column(type: 'float')]
//    public int $avaregeScore = 0;
//    public ?User $user = null;
    public function getId(): ?int
    {
        return $this->id;
    }

}
