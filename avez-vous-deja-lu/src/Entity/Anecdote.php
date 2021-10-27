<?php

namespace App\Entity;

use App\Repository\AnecdoteRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnecdoteRepository::class)
 */
class Anecdote
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * 
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=10000)
     * @Assert\NotBlank
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="favorite")
     */
    private $favoriteUsers;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="anecdotes")
     */
    private $writer;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="upVote")
     */
    private $upVoteUsers;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="downVote")
     */
    private $downVoteUsers;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="known")
     */
    private $knownUsers;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="unknown")
     */
    private $unknownUsers;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="anecdotes")
     */
    private $category;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->favoriteUsers = new ArrayCollection();
        $this->upVoteUsers = new ArrayCollection();
        $this->downVoteUsers = new ArrayCollection();
        $this->knownUsers = new ArrayCollection();
        $this->unknownUsers = new ArrayCollection();
        $this->category = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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
     * @return Collection|User[]
     */
    public function getFavoriteUsers(): Collection
    {
        return $this->favoriteUsers;
    }

    public function addFavoriteUser(User $favoriteUser): self
    {
        if (!$this->favoriteUsers->contains($favoriteUser)) {
            $this->favoriteUsers[] = $favoriteUser;
            $favoriteUser->addFavorite($this);
        }

        return $this;
    }

    public function removeFavoriteUser(User $favoriteUser): self
    {
        if ($this->favoriteUsers->removeElement($favoriteUser)) {
            $favoriteUser->removeFavorite($this);
        }

        return $this;
    }

    public function getWriter(): ?User
    {
        return $this->writer;
    }

    public function setWriter(?User $writer): self
    {
        $this->writer = $writer;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUpVoteUsers(): Collection
    {
        return $this->upVoteUsers;
    }

    public function addUpVoteUser(User $upVoteUser): self
    {
        if (!$this->upVoteUsers->contains($upVoteUser)) {
            $this->upVoteUsers[] = $upVoteUser;
            $upVoteUser->addUpVote($this);
        }

        return $this;
    }

    public function removeUpVoteUser(User $upVoteUser): self
    {
        if ($this->upVoteUsers->removeElement($upVoteUser)) {
            $upVoteUser->removeUpVote($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getDownVoteUsers(): Collection
    {
        return $this->downVoteUsers;
    }

    public function addDownVoteUser(User $downVoteUser): self
    {
        if (!$this->downVoteUsers->contains($downVoteUser)) {
            $this->downVoteUsers[] = $downVoteUser;
            $downVoteUser->addDownVote($this);
        }

        return $this;
    }

    public function removeDownVoteUser(User $downVoteUser): self
    {
        if ($this->downVoteUsers->removeElement($downVoteUser)) {
            $downVoteUser->removeDownVote($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getKnownUsers(): Collection
    {
        return $this->knownUsers;
    }

    public function addKnownUser(User $knownUser): self
    {
        if (!$this->knownUsers->contains($knownUser)) {
            $this->knownUsers[] = $knownUser;
            $knownUser->addKnown($this);
        }

        return $this;
    }

    public function removeKnownUser(User $knownUser): self
    {
        if ($this->knownUsers->removeElement($knownUser)) {
            $knownUser->removeKnown($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUnknownUsers(): Collection
    {
        return $this->unknownUsers;
    }

    public function addUnknownUser(User $unknownUser): self
    {
        if (!$this->unknownUsers->contains($unknownUser)) {
            $this->unknownUsers[] = $unknownUser;
            $unknownUser->addUnknown($this);
        }

        return $this;
    }

    public function removeUnknownUser(User $unknownUser): self
    {
        if ($this->unknownUsers->removeElement($unknownUser)) {
            $unknownUser->removeUnknown($this);
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }
}
