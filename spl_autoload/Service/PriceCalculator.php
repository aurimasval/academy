<?php

namespace Service;

use Model\Car;

class PriceCalculator
{
    public function calculate(Car $car): int
    {
        if ($car->getName() === 'mazda') {
            return 500;
        }

        return 300;
    }
}