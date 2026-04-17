<?php

declare(strict_types=1);

interface ReceiptGeneratorInterface
{
    public function generate(Reservation $reservation, float $amount): void;
}
