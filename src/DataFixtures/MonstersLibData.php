<?php

namespace App\DataFixtures;

class MonstersLibData 
{
    protected $datas = [
        [
            'name' => 'Gobelin',
            'attack' => 10,
            'life' => 20,
            'shield' => 5,
            'lvl_min' => 1,
            'lvl_max' => 5,
            'base_experience' => 50,
        ],
        [
            'name' => 'Spectre',
            'attack' => 15,
            'life' => 25,
            'shield' => 8,
            'lvl_min' => 3,
            'lvl_max' => 8,
            'base_experience' => 70,
        ],
        [
            'name' => 'Dragon',
            'attack' => 40,
            'life' => 100,
            'shield' => 20,
            'lvl_min' => 10,
            'lvl_max' => 15,
            'base_experience' => 200,
        ],
        [
            'name' => 'Orc',
            'attack' => 18,
            'life' => 30,
            'shield' => 7,
            'lvl_min' => 5,
            'lvl_max' => 10,
            'base_experience' => 80,
        ],
        [
            'name' => 'Zombie',
            'attack' => 12,
            'life' => 40,
            'shield' => 3,
            'lvl_min' => 2,
            'lvl_max' => 7,
            'base_experience' => 60,
        ],
        [
            'name' => 'Loup-garou',
            'attack' => 25,
            'life' => 35,
            'shield' => 10,
            'lvl_min' => 6,
            'lvl_max' => 12,
            'base_experience' => 100,
        ],
        [
            'name' => 'Hydre',
            'attack' => 50,
            'life' => 120,
            'shield' => 25,
            'lvl_min' => 12,
            'lvl_max' => 18,
            'base_experience' => 250,
        ],
        [
            'name' => 'Elémentaire de feu',
            'attack' => 35,
            'life' => 80,
            'shield' => 15,
            'lvl_min' => 8,
            'lvl_max' => 14,
            'base_experience' => 150,
        ],
        [
            'name' => 'Golem',
            'attack' => 30,
            'life' => 90,
            'shield' => 18,
            'lvl_min' => 9,
            'lvl_max' => 16,
            'base_experience' => 170,
        ],
        [
            'name' => 'Vampire',
            'attack' => 22,
            'life' => 50,
            'shield' => 12,
            'lvl_min' => 4,
            'lvl_max' => 9,
            'base_experience' => 90,
        ],
    ];

    public function getDatas()
    {
        return $this->datas;
    }
}