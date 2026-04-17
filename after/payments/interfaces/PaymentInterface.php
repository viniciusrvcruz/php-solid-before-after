<?php

declare(strict_types=1);

interface PaymentInterface
{
    public function pay(float $amount): void;
}
