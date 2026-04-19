<?php

declare(strict_types=1);

namespace App\After\Receipts;

use App\After\Entities\Reservation;

interface ReceiptGeneratorInterface
{
    public function generate(Reservation $reservation, float $amount): void;
}
