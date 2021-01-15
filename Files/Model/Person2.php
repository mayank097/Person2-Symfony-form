<?php

namespace App\Entity;

use App\Repository\Person2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Person2Repository::class)
 */
class Person2
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Qualification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Gender;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->Qualification;
    }

    public function setQualification(string $Qualification): self
    {
        $this->Qualification = $Qualification;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->Gender;
    }

    public function setGender(string $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->Date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $Date_of_birth): self
    {
        $this->Date_of_birth = $Date_of_birth;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }
}
