<?php

declare(strict_types=1);

namespace App\After\Repositories;

use App\After\Entities\Reservation;

class ReservationMemoryRepository implements ReservationRepositoryInterface
{
    /** @var list<Reservation> */
    private array $reservations = [];

    public function create(Reservation $reservation): void
    {
        $this->reservations[] = $reservation;
    }

    public function findByRoom(string $room): ?Reservation
    {
        foreach ($this->reservations as $reservation) {
            if ($reservation->getRoom() === $room) {
                return $reservation;
            }
        }

        return null;
    }
}
