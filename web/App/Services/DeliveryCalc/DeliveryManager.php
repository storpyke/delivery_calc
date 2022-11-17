<?php

declare(strict_types=1);

namespace Project\App\Services\DeliveryCalc;

use Project\App\Services\DeliveryCalc\Interfaces\DeliveryCalcInterface;

class DeliveryManager
{
    private int $kilometers;

    private DeliveryCalcInterface $logic;

    /**
     * @param int                   $kilometers
     * @param DeliveryCalcInterface $logic
     */
    public function __construct(int $kilometers, DeliveryCalcInterface $logic)
    {
        $this->kilometers = $kilometers;
        $this->logic = $logic;
    }

    public function handle(): int
    {
        return $this->calculateDelivery();
    }

    /**
     * @return int
     */
    private function calculateDelivery(): int
    {
        return $this->logic->calculate($this->kilometers);
    }

}
