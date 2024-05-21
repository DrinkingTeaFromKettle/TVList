<?php

namespace App\Entity;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[UniqueEntity('email', 'username')]
#[ORM\Table(name: "`user`")]
class User implements  PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', unique: true)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 55)]
    public string $username = "";

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
    public ?string $email = "";

    #[Orm\Column(type: 'string')]
//    #[Assert\DateTime]
    public ?string $createdAt = null;

    // type of account

    #[ORM\Column(type: 'json')]
    private array $roles = [];


    function __construct()
    {
        $newDate = new DateTime();
        $this->createdAt = $newDate -> format('Y-m-d H:i:s');
    }
    public function getId(): ?int
    {
        return $this->id;
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

        $roles[] = 'ROLE_USER';

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

    public function eraseCredentials(): void
    {
        $this->plainPassword = null;
    }
}