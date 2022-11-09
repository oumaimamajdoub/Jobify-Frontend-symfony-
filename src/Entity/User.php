<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StudentRepository;

#[ORM\Entity(repositoryClass:UserRepository::class)]


class User
{
    
     #[ORM\Id] 
     #[ORM\GeneratedValue]
     #[ORM\Column]
    
    private ?int $id=null;
   
    private ?int $age=null;

    #[ORM\Column(length:255)]
    private ?string $nom=null;

    #[ORM\Column(length:255)]
    private ?string $prenom=null;

    #[ORM\Column(length:255)]
    private ?string $email=null;

    #[ORM\Column(length:255)]
    private ?string $mdp=null;

    #[ORM\Column(length:255)]
    private ?string $numtel=null;

    #[ORM\Column(length:255)]
    private ?string $adresse=null;

    #[ORM\Column(length:255)]
    private ?string $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }



}
