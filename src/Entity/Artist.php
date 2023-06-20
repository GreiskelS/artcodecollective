<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Authors = null;

    #[ORM\Column(length: 255)]
    private ?string $Medium = null;

    #[ORM\ManyToMany(targetEntity: Artwork::class, inversedBy: 'artists')]
    private Collection $fk_Artwork;

    public function __construct()
    {
        $this->fk_Artwork = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAuthors(): ?string
    {
        return $this->Authors;
    }

    public function setAuthors(string $Authors): static
    {
        $this->Authors = $Authors;

        return $this;
    }

    public function getMedium(): ?string
    {
        return $this->Medium;
    }

    public function setMedium(string $Medium): static
    {
        $this->Medium = $Medium;

        return $this;
    }

    /**
     * @return Collection<int, Artwork>
     */
    public function getFkArtwork(): Collection
    {
        return $this->fk_Artwork;
    }

    public function addFkArtwork(Artwork $fkArtwork): static
    {
        if (!$this->fk_Artwork->contains($fkArtwork)) {
            $this->fk_Artwork->add($fkArtwork);
        }

        return $this;
    }

    public function removeFkArtwork(Artwork $fkArtwork): static
    {
        $this->fk_Artwork->removeElement($fkArtwork);

        return $this;
    }
}
