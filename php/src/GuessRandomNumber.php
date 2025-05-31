<?php

namespace Application;

class GuessRandomNumber
{

    const MAX_ATTEMPTS = 3;
    private int $randomNumber;
    private int $currentAttempts=0;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->randomNumber = $generator->generate();
    }

    public function play(int $guessAttempt): string
    {
        $this->currentAttempts++;

        if($this->currentAttempts >= GuessRandomNumber::MAX_ATTEMPTS){
            return 'game over';
        }

        if ($guessAttempt < $this->randomNumber) {
            return 'higher';
        }
        if ($guessAttempt > $this->randomNumber) {
            return 'lower';
        }
        return 'won';
    }
}