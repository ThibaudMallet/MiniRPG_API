<?php

namespace App\Entity;

use App\Repository\FightRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FightRepository::class)]
class Fight
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Lvl_monster should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\GreaterThan(0)]
    private ?int $lvl_monster = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Is_victory should not be blank')]
    private ?bool $is_victory = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Exp_win should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\PositiveOrZero]
    private ?int $exp_win = null;

    #[ORM\ManyToOne(inversedBy: 'fights')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(User::class)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'fights')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Character::class)]
    private ?Character $character = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Monster::class)]
    private ?Monster $monster = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLvlMonster(): ?int
    {
        return $this->lvl_monster;
    }

    public function setLvlMonster(int $lvl_monster): static
    {
        $this->lvl_monster = $lvl_monster;

        return $this;
    }

    public function isIsVictory(): ?bool
    {
        return $this->is_victory;
    }

    public function setIsVictory(bool $is_victory): static
    {
        $this->is_victory = $is_victory;

        return $this;
    }

    public function getExpWin(): ?int
    {
        return $this->exp_win;
    }

    public function setExpWin(int $exp_win): static
    {
        $this->exp_win = $exp_win;

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

    public function getCharacterId(): ?Character
    {
        return $this->character;
    }

    public function setCharacterId(?Character $character): static
    {
        $this->character = $character;

        return $this;
    }

    public function getMonsterId(): ?Monster
    {
        return $this->monster;
    }

    public function setMonsterId(?Monster $monster): static
    {
        $this->monster = $monster;

        return $this;
    }
}
