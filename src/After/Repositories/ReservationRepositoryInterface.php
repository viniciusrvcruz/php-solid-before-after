<?php

declare(strict_types=1);

namespace App\After\Repositories;

use App\After\Entities\Reservation;

interface ReservationRepositoryInterface
{
    public function create(Reservation $reservation): void;

    public function findByRoom(string $room): ?Reservation;
}
