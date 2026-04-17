<?php

declare(strict_types=1);

interface ReservationRepositoryInterface
{
    public function create(Reservation $reservation): void;

    public function findByRoom(string $room): ?Reservation;
}
