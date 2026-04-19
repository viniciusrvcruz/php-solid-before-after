<?php

declare(strict_types=1);

namespace App\After\Services;

use App\After\Entities\Reservation;
use App\After\Repositories\ReservationRepositoryInterface;
use InvalidArgumentException;

class RoomAvailabilityService
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository,
    ) {}

    public function checkAvailability(Reservation $reservation): void
    {
        if ($this->reservationRepository->findByRoom($reservation->getRoom()) !== null) {
            throw new InvalidArgumentException('Room already booked.');
        }
    }
}
