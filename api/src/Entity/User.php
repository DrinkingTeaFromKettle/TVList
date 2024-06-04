<?php

namespace App\Entity;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV4;

#[ORM\Entity]
#[UniqueEntity('email', 'username')]
#[ORM\Table(name: "`user`")]
class User implements  PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: "uuid", unique: true)]
//    #[Assert\Uuid]
    private ?Uuid $uuid;

    #[ORM\Column(type: 'string', unique: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 55)]
    private string $username = "";

    #[ORM\Column(type: 'string')]
//    #[Assert\NotBlank]
    // #[Assert\PasswordStrength]
    private string $password = "";

    #[Assert\NotBlank(groups: ["userCreate"])]
    #[Assert\Length(min: 6, max: 55)]
    private ?string $plainPassword = null;

    #[ORM\Column(type: 'string', unique: true, nullable: true)]
    #[Assert\Email]
    #[Assert\Length(min: 6, max: 55)]
    private ?string $email = "";

    #[Orm\Column(type: 'string')]
//    #[Assert\DateTime]
    private ?string $createdAt = null;

    #[ORM\Column(nullable: true)]
    #[ORM\OneToMany(mappedBy: 'created_by', targetEntity: Production::class)]
    private iterable $productions;

    // type of account


    #[ORM\Column(type: 'json')]
    private array $roles = [];


    function __construct()
    {
        $this -> roles[] = 'ROLE_USER';
        $this -> uuid = new UuidV4();
        $newDate = new DateTime();
        $this->createdAt = $newDate -> format('Y-m-d H:i:s');
    }
    public function getId(): ?int
    {
        return $this->id;
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

    public function getProductions(): iterable
    {
        return $this->productions;
    }

    public function setProductions(iterable $productions): self
    {
        $this->productions = $productions;
        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self{
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(string $password): self{
        $this->password = $password;
        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function eraseCredentials(): self
    {
        $this->plainPassword = null;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }



}