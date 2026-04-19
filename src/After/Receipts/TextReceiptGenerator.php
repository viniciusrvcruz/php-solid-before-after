<?php

declare(strict_types=1);

namespace App\After\Receipts;

use App\After\Entities\Reservation;

class TextReceiptGenerator implements ReceiptGeneratorInterface
{
    public function generate(Reservation $reservation, float $amount): void
    {
        $record = $reservation->getUser() . ' - ' . $reservation->getRoom() . ' - ' . $amount;
        echo 'Receipt: ' . $record . "\n";
    }
}