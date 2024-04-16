<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookmarksRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookmarksRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['bookmark']])]
#[ORM\Table(name: '`bookmark`')]
class Bookmark
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['bookmark'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['bookmark'])]
    private ?string $companyName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['bookmark'])]
    private ?string $address = null;

    #[ORM\Column]
    #[Groups(['bookmark'])]
    private ?int $postalCode = null;

    #[ORM\ManyToOne(inversedBy: 'bookmark')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['bookmark'])]
    public ?Student $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }
    public function getStudentId(): ?Student
    {
        return $this->student;
    }

    public function setStudentId(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }
}
