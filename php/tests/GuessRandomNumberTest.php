<?php

use Application\GuessRandomNumber;
use Application\RandomNumberGenerator;
use Application\RealRandomNumberGenerator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class GuessRandomNumberTest extends TestCase {

    private GuessRandomNumber $game;
    public function setUp(): void
    {
        $randomNumberGenerator = new RealRandomNumberGenerator(3,3);
        $this->game = new GuessRandomNumber($randomNumberGenerator);
    }

    #[test]
    public function the_user_wins_with_just_one_try(): void {

        $actual = $this->game->play(3);

        $this->assertSame('won', $actual);
    }

    #[test]
    public function the_user_will_give_a_lower_number(): void {
        $actual = $this->game->play(1);

        $this->assertSame('higher', $actual);
    }

    #[test]
    public function the_user_will_give_a_higher_number(): void {
        $actual = $this->game->play(5);

        $this->assertSame('lower', $actual);
    }

    #[test]
    public function the_user_will_fail_three_times(): void {
        $this->game->play(6);
        $this->game->play(5);
        $actual = $this->game->play(4);

        $this->assertSame('game over', $actual);
    }

    #[test]
    public function the_user_will_guess_on_3rd_attempt(): void {
        $this->game->play(6);
        $this->game->play(5);
        $actual = $this->game->play(3);

        $this->assertSame('won', $actual);
    }

    #[test]
    public function the_user_tries_to_play_after_game_is_over(): void {
        $this->game->play(6);
        $this->game->play(5);
        $actual = $this->game->play(3);
        $actual = $this->game->play(2);

        $this->assertSame('game over', $actual);
    }
}
