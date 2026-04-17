<?php

declare(strict_types=1);

class PixPayment implements PaymentInterface
{
    public function pay(float $amount): void
    {
        echo "Pix payment OK\n";
    }
}
