<?php

use Application\GuessRandomNumber;
use Application\RandomNumberGenerator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GuessRandomNumberTest extends TestCase {

    #[test]
    public function the_user_wins_with_just_one_try(): void {
        $stubRandomNumberGenerator = $this->createStub(RandomNumberGenerator::class);
        $stubRandomNumberGenerator
            ->method('generate')
            ->willReturn(3);
        $game = new GuessRandomNumber($stubRandomNumberGenerator);

        $actual = $game->play(3);

        $this->assertSame('won', $actual);
    }
}
