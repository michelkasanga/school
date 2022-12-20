<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use  Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity('register')]
#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[ORM\Table(name: '`student`')]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   
    #[ORM\Column(length: 80)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2, max:80)]
    private ?string $name = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2, max:80)]
    private ?string $lastName = null;

    #[ORM\Column(length: 80)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2, max:80)]
    private ?string $firstName = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $register = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $placeBirth = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Form $form = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Statut $statut = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Section $section = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    private ?Option $optionStudent = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt  = new \DateTimeImmutable();
        $this->register = $this->SerialNumber();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getRegister(): ?int
    {
        return $this->register;
    }

    public function setRegister(int $register): self
    {
        $this->register = $register;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPlaceBirth(): ?string
    {
        return $this->placeBirth;
    }

    public function setPlaceBirth(?string $placeBirth): self
    {
        $this->placeBirth = $placeBirth;

        return $this;
    }

    public function getForm(): ?Form
    {
        return $this->form;
    }

    public function setForm(?Form $form): self
    {
        $this->form = $form;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getOptionStudent(): ?Option
    {
        return $this->optionStudent;
    }

    public function setOptionStudent(?Option $optionStudent): self
    {
        $this->optionStudent = $optionStudent;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    
    public function SerialNumber()
    {
        $getTwoLastNumberOfYear = substr(date('Y'), 2);
        $getId =  mt_rand(1,1000);

        if($getId > 0 AND $getId < 10)
        {
             return (int)$getTwoLastNumberOfYear.'000'.$getId;
        }
        elseif ($getId > 9 AND $getId < 100) {
            return (int)$getTwoLastNumberOfYear.'00'.$getId;
        }
        elseif ($getId  > 99 AND $getId < 1000) {
            return (int)$getTwoLastNumberOfYear.'0'.$getId;   
        }
        elseif ($getId > 999 ) {
            return (int)$getTwoLastNumberOfYear.$getId;
        }
    }
}
