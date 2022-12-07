<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateApplication = null;

    #[ORM\ManyToOne(inversedBy: '$applications')]
    private ?Post $post = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateApplication(): ?\DateTimeInterface
    {
        return $this->dateApplication;
    }

    public function setDateApplication(\DateTimeInterface $dateApplication): self
    {
        $this->dateApplication = $dateApplication;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }
}
