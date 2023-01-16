<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $itemReference = null;

    #[ORM\Column(length: 50)]
    private ?string $itemDescription = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updateDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemReference(): ?string
    {
        return $this->itemReference;
    }

    public function setItemReference(string $itemReference): self
    {
        $this->itemReference = $itemReference;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }

    public function setItemDescription(string $itemDescription): self
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

//    No one can set the creationDate property
//    public function setCreationDate(\DateTimeInterface $creationDate): self
//    {
//        $this->creationDate = $creationDate;
//
//        return $this;
//    }

    #[ORM\PrePersist]
    public function setCreationDate(): void
    {
        $this->creationDate = new \DateTimeImmutable();
    }

    #[ORM\PreFlush]
    public function updateUpdateDate()
    {
        $this->updateDate = new \DateTime();
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->updateDate;
    }

    public function setUpdateDate(\DateTimeInterface $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }
}
