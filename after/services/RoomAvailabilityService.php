<?php

declare(strict_types=1);

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
