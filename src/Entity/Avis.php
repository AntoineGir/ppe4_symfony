<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="avis")
     */
    private $idClient;

    /**
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="avis")
     */
    private $idTheme;

    /**
     * @ORM\OneToMany(targetEntity=PhotoAvis::class, mappedBy="avis")
     */
    private $idImage;

    public function __construct()
    {
        $this->idImage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getIdClient(): ?Clients
    {
        return $this->idClient;
    }

    public function setIdClient(?Clients $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdTheme(): ?Theme
    {
        return $this->idTheme;
    }

    public function setIdTheme(?Theme $idTheme): self
    {
        $this->idTheme = $idTheme;

        return $this;
    }

    /**
     * @return Collection|PhotoAvis[]
     */
    public function getIdImage(): Collection
    {
        return $this->idImage;
    }

    public function addIdImage(PhotoAvis $idImage): self
    {
        if (!$this->idImage->contains($idImage)) {
            $this->idImage[] = $idImage;
            $idImage->setAvis($this);
        }

        return $this;
    }

    public function removeIdImage(PhotoAvis $idImage): self
    {
        if ($this->idImage->removeElement($idImage)) {
            // set the owning side to null (unless already changed)
            if ($idImage->getAvis() === $this) {
                $idImage->setAvis(null);
            }
        }

        return $this;
    }

    public function __toString() 
    {
        return (string) $this->note; 
    }
}
