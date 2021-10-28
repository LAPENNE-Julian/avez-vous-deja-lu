<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank
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
     * @ORM\JoinTable(name="favorite")
     */
    private $favorite;

    /**
     * @ORM\OneToMany(targetEntity=Anecdote::class, mappedBy="writer")
     */
    private $anecdotes;

    /**
     * @ORM\ManyToMany(targetEntity=Anecdote::class, inversedBy="upVoteUsers")
     * @ORM\JoinTable(name="upVote")
     */
    private $upVote;

    /**
     * @ORM\ManyToMany(targetEntity=Anecdote::class, inversedBy="downVoteUsers")
     * @ORM\JoinTable(name="downVote")
     */
    private $downVote;

    /**
     * @ORM\ManyToMany(targetEntity=Anecdote::class, inversedBy="knownUsers")
     * @ORM\JoinTable(name="known")
     */
    private $known;

    /**
     * @ORM\ManyToMany(targetEntity=Anecdote::class, inversedBy="unknownUsers")
     * @ORM\JoinTable(name="unknown")
     */
    private $unknown;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->favorite = new ArrayCollection();
        $this->anecdotes = new ArrayCollection();
        $this->upVote = new ArrayCollection();
        $this->downVote = new ArrayCollection();
        $this->known = new ArrayCollection();
        $this->unknown = new ArrayCollection();

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

    /**
     * @return Collection|Anecdote[]
     */
    public function getUpVote(): Collection
    {
        return $this->upVote;
    }

    public function addUpVote(Anecdote $upVote): self
    {
        if (!$this->upVote->contains($upVote)) {
            $this->upVote[] = $upVote;
        }

        return $this;
    }

    public function removeUpVote(Anecdote $upVote): self
    {
        $this->upVote->removeElement($upVote);

        return $this;
    }

    /**
     * @return Collection|Anecdote[]
     */
    public function getDownVote(): Collection
    {
        return $this->downVote;
    }

    public function addDownVote(Anecdote $downVote): self
    {
        if (!$this->downVote->contains($downVote)) {
            $this->downVote[] = $downVote;
        }

        return $this;
    }

    public function removeDownVote(Anecdote $downVote): self
    {
        $this->downVote->removeElement($downVote);

        return $this;
    }

    /**
     * @return Collection|Anecdote[]
     */
    public function getKnown(): Collection
    {
        return $this->known;
    }

    public function addKnown(Anecdote $known): self
    {
        if (!$this->known->contains($known)) {
            $this->known[] = $known;
        }

        return $this;
    }

    public function removeKnown(Anecdote $known): self
    {
        $this->known->removeElement($known);

        return $this;
    }

    /**
     * @return Collection|Anecdote[]
     */
    public function getUnknown(): Collection
    {
        return $this->unknown;
    }

    public function addUnknown(Anecdote $unknown): self
    {
        if (!$this->unknown->contains($unknown)) {
            $this->unknown[] = $unknown;
        }

        return $this;
    }

    public function removeUnknown(Anecdote $unknown): self
    {
        $this->unknown->removeElement($unknown);

        return $this;
    }
}
