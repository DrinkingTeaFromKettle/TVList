<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Genre
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;
    #[ORM\Column]
    private string $name = '';
}
