<?php

namespace Application;

class GuessRandomNumber
{

    const MAX_ATTEMPTS = 3;
    private int $randomNumber;
    private int $currentAttempts = 0;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->randomNumber = $generator->generate();
    }

    public function play(int $guessAttempt): string
    {
        if ($this->isTheLastChance() && $guessAttempt !== $this->randomNumber) {
            return 'game over';
        }

        if ($guessAttempt < $this->randomNumber) {
            $this->currentAttempts++;
            return 'higher';
        }
        if ($guessAttempt > $this->randomNumber) {
            $this->currentAttempts++;
            return 'lower';
        }

        $this->currentAttempts++;
        return 'won';
    }

    private function isTheLastChance(): bool
    {
        return $this->currentAttempts + 1 >= GuessRandomNumber::MAX_ATTEMPTS;
    }
}