<?php


use Application\RealRandomNumberGenerator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RealRandomNumberTest extends TestCase
{
    #[test]
    public function the_generator_generates_numbers(): void {

        $generator = new RealRandomNumberGenerator(1, 10);
        $currentNumber = $generator->generate();

        $this->assertGreaterThanOrEqual(1, $currentNumber);
        $this->assertLessThanOrEqual(10, $currentNumber);
    }

    #[test]
    public function the_generator_generates_a_particular_number(): void {

        $generator = new RealRandomNumberGenerator(5, 5);
        $currentNumber = $generator->generate();

        $this->assertEquals(5, $currentNumber);
    }
}
