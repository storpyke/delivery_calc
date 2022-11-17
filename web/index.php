<?php

declare(strict_types=1);

require('../vendor/autoload.php');

use Project\App\Services\DeliveryCalc\DeliveryManager;
use Project\App\Services\DeliveryCalc\Logic\DeliveryCarLogic;


$deliveryPrice = (new DeliveryManager(1001, new DeliveryCarLogic([
    '1-100' => ['price' => 100, 'length' => 100],
    '100-300' => ['price' => 80, 'length' => 200],
    '300-500' => ['price' => 70]
])))->handle();

print_r($deliveryPrice);
