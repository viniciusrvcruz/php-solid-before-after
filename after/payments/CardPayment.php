<?php

declare(strict_types=1);

class CardPayment implements PaymentInterface
{
    public function pay(float $amount): void
    {
        echo "Card payment OK\n";
    }
}
