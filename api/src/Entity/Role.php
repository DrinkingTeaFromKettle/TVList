<?php
//
//namespace App\Entity;
//use Doctrine\ORM\Mapping as ORM;
//use Symfony\Component\Validator\Constraints as Assert;
//
//
//#[ORM\Entity]
//class Role
//{
//
//    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
//    private ?int $id = null;
//
//    #[ORM\Column]
//    #[Assert\NotBlank]
//    #[Assert\Regex(pattern: '/[\p{Uppercase}_1-9]+/', message: "Role name has to be uppercase")]
//    public string $name = '';
//
//
//}