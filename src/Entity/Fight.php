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
    private ?int $lvl_monster = null;

    #[ORM\Column]
    private ?bool $is_victory = null;

    #[ORM\Column]
    private ?int $exp_win = null;

    #[ORM\ManyToOne(inversedBy: 'fights')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'fights')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
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
