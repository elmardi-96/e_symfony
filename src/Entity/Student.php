<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudentRepository")
 */
class Student
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     *      min = 10,
     *      max = 10,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private $CNE;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Regex(
     *     "/^[a-zA-Z]+ {1}[a-zA-Z]+/",
     *     message="the name is incorrect"
     * )
     */
    private $Nom;

    /**
     * @ORM\Column(type="date")
     * @Assert\LessThan("-18 years")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adresse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCNE(): ?string
    {
        return $this->CNE;
    }

    public function setCNE(string $CNE): self
    {
        $this->CNE = $CNE;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
