<?php

declare(strict_types=1);

namespace App\After\Payments;

interface PaymentInterface
{
    public function pay(float $amount): void;
}
