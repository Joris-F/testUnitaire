<?php

namespace App\Entity;

class Character
{
    private int $pv = 10;
    private int $attack = 2;
    private int $mana = 20;

    public function getPV()
    {
        return $this->pv;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getMana()
    {
        return $this->mana;
    }

    public function attack(Character $otherCharacter)
    {
        $otherCharacter->pv -= $this->attack;
    }

    public function heal()
    {
        if ($this->pv < 10 && $this->mana >= 5) {
            $this->pv += 2;
            if ($this->pv > 10) {
                $this->pv = 10;
            }
            $this->mana -= 5;
        }
    }

    private function toto($argument1)
    {
        // TODO: write logic here
    }
}
