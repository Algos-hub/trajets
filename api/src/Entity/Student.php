<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\StudentsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: StudentsRepository::class)]
#[ORM\Table(name: '`student`')]
#[ApiResource]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['bookmark'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['bookmark'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['bookmark'])]
    private ?string $surName = null;

    #[ORM\Column(length: 255)]
    #[Groups(['bookmark'])]
    private ?string $address = null;

    #[ORM\Column]
    #[Groups(['bookmark'])]
    private ?int $postalCode = null;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: Bookmark::class)]
    private Collection $bookmark;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSurName(): ?string
    {
        return $this->surName;
    }

    public function setSurName(string $surName): static
    {
        $this->surName = $surName;

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

    public function getBookmarks()
    {
        return $this->bookmark;
    }

    public function addBookmark(Bookmark $bookmark): static
    {
        if (!$this->bookmark->contains($bookmark)) {
            $this->bookmark->add($bookmark);
            $bookmark->setStudentId($this);
        }
        return $this;
    }

    public function removeBookmark(Bookmark $bookmark): static
    {
        if ($this->bookmark->removeElement($bookmark)) {
            if ($bookmark->getStudentId() === $this) {
                $bookmark->setStudentId(null);
            }
        }
        return $this;
    }
}
