<?php

declare(strict_types=1);

class BankSlipPayment implements PaymentInterface
{
    public function pay(float $amount): void
    {
        echo "Bank slip payment OK\n";
    }
}
