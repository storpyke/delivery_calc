<?php

declare(strict_types=1);

namespace Project\App\Services\DeliveryCalc\Interfaces;

interface DeliveryCalcInterface
{

    /**
     * @param  int  $km
     * @return int
     */
    public function calculate(int $km): int;

    /**
     * @return string
     */
    public function getName(): string;
}
