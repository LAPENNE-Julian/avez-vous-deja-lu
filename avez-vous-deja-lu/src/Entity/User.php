<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Anecdote::class, inversedBy="favoriteUsers")
     */
    private $favorite;

    /**
     * @ORM\OneToMany(targetEntity=Anecdote::class, mappedBy="writer")
     */
    private $anecdotes;


    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->favorite = new ArrayCollection();
        $this->anecdotes = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Anecdote[]
     */
    public function getFavorite(): Collection
    {
        return $this->favorite;
    }

    public function addFavorite(Anecdote $favorite): self
    {
        if (!$this->favorite->contains($favorite)) {
            $this->favorite[] = $favorite;
        }

        return $this;
    }

    public function removeFavorite(Anecdote $favorite): self
    {
        $this->favorite->removeElement($favorite);

        return $this;
    }

    /**
     * @return Collection|Anecdote[]
     */
    public function getAnecdotes(): Collection
    {
        return $this->anecdotes;
    }

    public function addAnecdote(Anecdote $anecdote): self
    {
        if (!$this->anecdotes->contains($anecdote)) {
            $this->anecdotes[] = $anecdote;
            $anecdote->setWriter($this);
        }

        return $this;
    }

    public function removeAnecdote(Anecdote $anecdote): self
    {
        if ($this->anecdotes->removeElement($anecdote)) {
            // set the owning side to null (unless already changed)
            if ($anecdote->getWriter() === $this) {
                $anecdote->setWriter(null);
            }
        }

        return $this;
    }

}
