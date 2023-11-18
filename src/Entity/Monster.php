<?php

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $attack = null;

    #[ORM\Column]
    private ?int $life = null;

    #[ORM\Column]
    private ?int $shield = null;

    #[ORM\Column]
    private ?int $lvl_min = null;

    #[ORM\Column]
    private ?int $lvl_max = null;

    #[ORM\Column]
    private ?int $base_exp_reward = null;

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

    public function getLvlMin(): ?int
    {
        return $this->lvl_min;
    }

    public function setLvlMin(int $lvl_min): static
    {
        $this->lvl_min = $lvl_min;

        return $this;
    }

    public function getLvlMax(): ?int
    {
        return $this->lvl_max;
    }

    public function setLvlMax(int $lvl_max): static
    {
        $this->lvl_max = $lvl_max;

        return $this;
    }

    public function getBaseExpReward(): ?int
    {
        return $this->base_exp_reward;
    }

    public function setBaseExpReward(int $base_exp_reward): static
    {
        $this->base_exp_reward = $base_exp_reward;

        return $this;
    }
}
