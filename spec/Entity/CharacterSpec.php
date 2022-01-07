<?php

namespace spec\App\Entity;

use App\Entity\Character;
use PhpSpec\Exception\Example\SkippingException;
use PhpSpec\ObjectBehavior;
use function PHPUnit\Framework\assertSame;

class CharacterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Character::class);
    }

    function it_should_default_pv()
    {
        $this->getPV()->shouldReturn(10);
    }

    function it_should_default_attack(){
        $this->getAttack()->shouldReturn(2);
    }

    function it_should_default_mana(){
        $this->getMana()->shouldReturn(20);
    }

    function it_should_attack_character(){
        $otherCharacter = new Character();

        $this->attack($otherCharacter);

        assertSame($otherCharacter->getPV(),8);
    }

    function it_should_heal_with_max_pv(){
        $this->heal();

        $this->getPV()->shouldReturn(10);
        $this->getMana()->shouldReturn(20);
    }

    function it_should_heal(){
        $otherCharacter = new Character();

        assertSame($otherCharacter->getPV(),10);
        assertSame($otherCharacter->getMana(),20);

        $this->attack($otherCharacter);

        assertSame($otherCharacter->getPV(),8);

        $otherCharacter->heal();

        assertSame($otherCharacter->getPV(),10);
        assertSame($otherCharacter->getMana(),15);

        throw new SkippingException('exemple Skipped');
    }

    function it_should_test(){
        $this->toto("toto")->shouldReturn(0);
    }
}
