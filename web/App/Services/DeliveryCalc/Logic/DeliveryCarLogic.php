<?php

declare(strict_types=1);

namespace Project\App\Services\DeliveryCalc\Logic;

use Project\App\Services\DeliveryCalc\Interfaces\DeliveryCalcInterface;

final class DeliveryCarLogic implements DeliveryCalcInterface
{
    private array $prices;

    public function __construct(array $prices)
    {
        $this->prices = $prices;
    }

    public function calculate(int $km): int
    {
        $splitDistance = [];
        foreach ($this->prices as $k => $price) {
            if (isset($price['length']) && $price['length'] < $km) {
                $splitDistance[$k] = $price['length'];
                $km -= $price['length'];
            } else {
                $splitDistance[$k] = $km;
                break;
            }
        }
        $endSum = 0;
        foreach ($splitDistance as $distance => $count) {
            $endSum += $count * $this->prices[$distance]['price'];
        }

        return $endSum;
    }

    public function getName(): string
    {
        return __NAMESPACE__;
    }
}
