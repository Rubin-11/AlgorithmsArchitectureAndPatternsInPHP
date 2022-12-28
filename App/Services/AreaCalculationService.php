<?php

namespace App\Services;

use App\Contracts\ICircle;
use App\Contracts\ISquare;
use App\Libs\CircleAreaLib;
use App\Libs\SquareAreaLib;

class AreaCalculationService implements ICircle, ISquare
{
    private CircleAreaLib $circleAreaLib;
    private SquareAreaLib $squareAreaLib;

    public function __construct(CircleAreaLib $circleAreaLib, SquareAreaLib $squareAreaLib)
    {
        $this->circleAreaLib = $circleAreaLib;
        $this->squareAreaLib = $squareAreaLib;
    }

    public function circleArea(int $circumference): int
    {
        $diagonal = $circumference/M_PI;
        return $this->circleAreaLib->getCircleArea($diagonal);
    }

    public function squareArea(int $sideSquare): int
    {
        $diagonal = sqrt(2)*$sideSquare;
        return $this->squareAreaLib->getSquareArea($diagonal);
    }
}