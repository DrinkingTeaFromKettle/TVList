<?php

namespace App\Entity;
use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
class Production
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: "uuid", unique: true)]
//    #[Assert\Uuid]
    private ?Uuid $uuid;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Length(min: 1, max: 255)]
    private string $title = '';

    #[Assert\NotBlank]
    #[ORM\Column(type: 'text')]
    #[Assert\Length(min: 1, max: 2500)]
    private string $description = '';

    #[ORM\ManyToOne(inversedBy: 'productions')]
    private ?Studio $studio = null;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'productions')]
    #[ORM\JoinTable(name: 'productions_genre')]
    #[Assert\Valid]
    #[Assert\Count(
        min: 1,
    )]
    #[Assert\Unique]
    private Collection $genres;

    #[ORM\Column(type: 'integer')]
    #[Assert\PositiveOrZero]
    private int $episodes = 0;

    #[ORM\Column(type: 'integer')]
    #[Assert\PositiveOrZero]
    #[Assert\LessThanOrEqual(propertyPath: "episodes")]
    private int $currentEpisodes = 0;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank]
    #[Assert\Url]
    private ?string $trailerLink = '';

//    #[ORM\Column(type:"datetime", nullable: true)]
//    private ?DateTime $producedAt = null;

//    #[ORM\Column(type: 'float')]
//    public int $avaregeScore = 0;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'created_by', referencedColumnName: 'id')]
    #[Gedmo\Blameable(on: 'create')]
    private ?User $createdBy;

    #[Gedmo\Timestampable(on:"create")]
    #[ORM\Column(type:"datetime", nullable: true)]
    private DateTime $created;

    public function __construct()
    {
        $this -> uuid = new UuidV4();
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

    public function getGenres(): Collection{
        return $this->genres;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getStudio(): ?Studio
    {
        return $this->studio;
    }

    public function setStudio(?Studio $studio): self
    {
        $this->studio = $studio;
        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    public function getEpisodes(): int
    {
        return $this->episodes;
    }

    public function setEpisodes(int $episodes): self
    {
        $this->episodes = $episodes;
        return $this;
    }

    public function getCurrentEpisodes(): int
    {
        return $this->currentEpisodes;
    }

    public function setCurrentEpisodes(int $currentEpisodes): self
    {
        $this->currentEpisodes = $currentEpisodes;
        return $this;
    }

    public function getTrailerLink(): ?string
    {
        return $this->trailerLink;
    }

    public function setTrailerLink(?string $trailerLink): self
    {
        $this->trailerLink = $trailerLink;
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

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }


}
