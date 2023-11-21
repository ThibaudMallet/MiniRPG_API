<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Name should not be blank')]
    #[Assert\Type(
        type: 'string',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'The name must be at least {{ limit }} characters long',
        maxMessage: 'The name cannot be longer than {{ limit }} characters',
    )]
    #[Groups(['api_get_character'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Attack should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\GreaterThan(0)]
    #[Groups(['api_get_character'])]
    private ?int $attack = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Life should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\GreaterThan(0)]
    #[Groups(['api_get_character'])]
    private ?int $life = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Shield should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\GreaterThanOrEqual(0)]
    #[Groups(['api_get_character'])]
    private ?int $shield = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Experience should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\PositiveOrZero]
    #[Groups(['api_get_character'])]
    private ?int $experience = null;

    #[ORM\ManyToOne(inversedBy: 'characters')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(User::class)]
    #[Groups(['api_get_character'])]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Level::class)]
    #[Groups(['api_get_character'])]
    private ?Level $level = null;

    #[ORM\OneToMany(mappedBy: 'character_id', targetEntity: Fight::class, orphanRemoval: true)]
    private Collection $fights;

    public function __construct()
    {
        $this->fights = new ArrayCollection();
    }

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

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): static
    {
        $this->attack = $attack;

        return $this;
    }

    public function getLife(): ?int
    {
        return $this->life;
    }

    public function setLife(int $life): static
    {
        $this->life = $life;

        return $this;
    }

    public function getShield(): ?int
    {
        return $this->shield;
    }

    public function setShield(int $shield): static
    {
        $this->shield = $shield;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user;
    }

    public function setUserId(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getlevelId(): ?Level
    {
        return $this->level;
    }

    public function setlevelId(?Level $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, Fight>
     */
    public function getFights(): Collection
    {
        return $this->fights;
    }

    public function addFight(Fight $fight): static
    {
        if (!$this->fights->contains($fight)) {
            $this->fights->add($fight);
            $fight->setCharacterId($this);
        }

        return $this;
    }

    public function removeFight(Fight $fight): static
    {
        if ($this->fights->removeElement($fight)) {
            // set the owning side to null (unless already changed)
            if ($fight->getCharacterId() === $this) {
                $fight->setCharacterId(null);
            }
        }

        return $this;
    }
}
