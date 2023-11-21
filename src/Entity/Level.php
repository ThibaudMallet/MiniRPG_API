<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LevelRepository::class)]
class Level
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Exp_to_next_lvl should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\Positive]
    private ?int $exp_to_next_lvl = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Base_experience should not be blank')]
    #[Assert\Type(
        type: 'integer',
        message: 'The value {{ value }} is not a valid {{ type }}.',
    )]
    #[Assert\PositiveOrZero]
    private ?int $base_experience = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpToNextLvl(): ?int
    {
        return $this->exp_to_next_lvl;
    }

    public function setExpToNextLvl(int $exp_to_next_lvl): static
    {
        $this->exp_to_next_lvl = $exp_to_next_lvl;

        return $this;
    }

    public function getBaseExperience(): ?int
    {
        return $this->base_experience;
    }

    public function setBaseExperience(int $base_experience): static
    {
        $this->base_experience = $base_experience;

        return $this;
    }
}
