<?php

namespace TASK8_4;

use SplStack;
use function MongoDB\BSON\toJSON;

class Prime
{
    public SplStack $primes;
    private int $num;
    private array $numArray = [];

    public function setNum(int $num): Prime
    {
        $this->num = $num;
        return $this;
    }

    public function __construct()
    {
        $this->primes = new SplStack();
    }

    public function setNumArray(): Prime
    {
        for ($i=2; $i<=sqrt($this->num); $i++) {
            $this->numArray[] = $i;
        }
        return $this;
    }

    public function setPrimes(): Prime
    {
        while ($this->numArray) {
            if (count($this->numArray) === 0) {
                return $this;
            }
            $this->primes->push($this->numArray[0]);
            $divider = $this->numArray[0];
            foreach ($this->numArray as $index => $item) {
                if ($item % $divider === 0) {
                    unset($this->numArray[$index]);
                }
            }
            $this->numArray = array_values($this->numArray);
        }
        return $this;
    }
    public function getMaxPrime(): ?int
    {
        $this->primes->rewind();
        while ($this->primes->valid()) {
            if ($this->num % $this->primes->current() === 0) {
                return $this->primes->current();
            }
            $this->primes->next();
        }
        return null;
    }
}