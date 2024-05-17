<?php

namespace App\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Production
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;
    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    public string $title = '';
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text')]
    #[Assert\Length(min: 1, max: 2500)]
    public string $description = '';
    #[ORM\ManyToOne(inversedBy: 'productions')]
    public ?Studio $studio = null;
    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'productions')]
    #[ORM\JoinTable(name: 'productions_genre')]
    #[Assert\Valid]
    #[Assert\Count(
        min: 1,
    )]
    #[Assert\Unique]
    public Collection $genres;
    #[ORM\Column(type: 'integer')]
    #[Assert\PositiveOrZero]
    public int $episodes = 0;
    #[ORM\Column(type: 'integer')]
    #[Assert\PositiveOrZero]
    #[Assert\LessThanOrEqual(propertyPath: "episodes")]
    public int $currentEpisodes = 0;
    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank]
    #[Assert\Url]
    public ?string $trailerLink = '';
//    #[ORM\Column(type: 'float')]
//    public int $avaregeScore = 0;
//    public ?User $user = null;

    public function __construct()
    {
        $this -> genres = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function addGenre(Genre $genre): self {
        $this -> genres -> add($genre);
        return $this;
    }

    public function removeGenre(Genre $genre): self {
        $this -> genres ->removeElement($genre);
        return $this;
    }

}
