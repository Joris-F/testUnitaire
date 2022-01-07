<?php

namespace App\Tests\Entity;

use App\Entity\Character;
use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    private $character;

    protected function setUp(): void
    {
        $this->character = new Character();
    }

    public function testInitializable()
    {
        self::assertNotNull($this->character);
    }

    public function testDefaultPv()
    {
        self::assertSame($this->character->getPV(),10);
    }

    public function testDefaultAttak()
    {
        self::assertSame($this->character->getAttack(),2);
    }

    public function testDefaultMana()
    {
        self::assertSame($this->character->getMana(),20);
    }

    public function testAttackOtherCharacter()
    {
        $otherCharacter = new Character();
        $this->character->attack($otherCharacter);
        self::assertSame($otherCharacter->getPV(),8);

    }

    function testHealMaxPv(){
        $this->character->heal();

        self::assertSame($this->character->getPV(),10);
        self::assertSame($this->character->getMana(),20);
    }

    function it_should_heal(){
        $otherCharacter = new Character();

        self::assertSame($otherCharacter->getPV(),10);
        self::assertSame($otherCharacter->getMana(),20);

        $this->character->attack($otherCharacter);

        self::assertSame($otherCharacter->getPV(),8);

        $otherCharacter->heal();

        self::assertSame($otherCharacter->getPV(),10);
        self::assertSame($otherCharacter->getMana(),15);

        self::markTestSkipped('exemple Skipped');
    }
}
