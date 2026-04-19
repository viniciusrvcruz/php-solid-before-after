<?php

declare(strict_types=1);

namespace App\After\Payments;

class BankSlipPayment implements PaymentInterface
{
    public function pay(float $amount): void
    {
        echo "Bank slip payment OK\n";
    }
}
