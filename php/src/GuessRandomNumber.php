<?php

namespace Application;

class GuessRandomNumber
{

    private int $randomNumber;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->randomNumber = $generator->generate();
    }

    public function play(int $guessAttempt): string
    {
        if ($guessAttempt < $this->randomNumber) {
            return 'higher';
        }
        return 'won';
    }
}