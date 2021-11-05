<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api_anecdote_browse", "api_anecdote_read", "api_user_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     * @Groups({"api_anecdote_browse", "api_anecdote_read", "api_user_read"})
     * @Assert\NotBlank
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank
     * @Groups("api_user_read")
     */
    private $email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"api_anecdote_browse", "api_user_read"})
     */
    private $img;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Groups("api_user_read")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Anecdote::class, inversedBy="favoriteUsers")
     * @ORM\JoinTable(name="favorite")
     * @Groups({"api_user_read" , "api_user_favorite_browse"})
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

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->favorite = new ArrayCollection();
        $this->anecdotes = new ArrayCollection();
        $this->upVote = new ArrayCollection();
        $this->downVote = new ArrayCollection();
        $this->known = new ArrayCollection();
        $this->unknown = new ArrayCollection();
        $this->roles[] = 'ROLE_USER';

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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
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

    /**
     * The public representation of the user (e.g. a username, an email address, etc.)
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
