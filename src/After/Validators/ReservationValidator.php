<?php

declare(strict_types=1);

namespace App\After\Validators;

use App\After\Entities\Reservation;
use InvalidArgumentException;

class ReservationValidator
{
    public function validate(Reservation $reservation): void
    {
        if ($reservation->getUser() === null || trim($reservation->getUser()) === '') {
            throw new InvalidArgumentException('Invalid user.');
        }

        if ($reservation->getRoom() === null || trim($reservation->getRoom()) === '') {
            throw new InvalidArgumentException('Invalid room.');
        }

        if ($reservation->getHours() <= 0) {
            throw new InvalidArgumentException('Invalid hours.');
        }
    }
}
