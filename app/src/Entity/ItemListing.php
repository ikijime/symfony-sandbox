<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ItemListingRepository;
use ApiPlatform\Core\Annotation\ApiFilter\BooleanFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\SerializedName;
// use ApiPlatform\Core\Annotation\ApiFilter;

#[ORM\Entity(repositoryClass: ItemListingRepository::class)]
#[ApiResource(
    shortName: "items",
    collectionOperations: ['get', 'post'],
    itemOperations: ['get', 'put', 'delete'],
)]
#[ApiFilter(BooleanFilter::class, properties: ['is_published'])]

class ItemListing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $price;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;
    
    #[ORM\Column(type: 'boolean')]
    private $isPublished = false;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();    
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    // public function setDescription(?string $description): self
    // {
    //     $this->description = $description;

    //     return $this;
    // }
    #[SerializedName('desctiption')]
    public function setTextDescription(string $description):self {
        $this->description = nl2br($description);
        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    // public function setCreatedAt(\DateTimeInterface $createdAt): self
    // {
    //     $this->createdAt = $createdAt;

    //     return $this;
    // }

}
