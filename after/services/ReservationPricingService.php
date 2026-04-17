<?php

declare(strict_types=1);

class ReservationPricingService
{
    public function calculate(Reservation $reservation): float
    {
        $amount = 50 * $reservation->getHours();

        if ($reservation->getRoomType() === RoomTypeEnum::LABORATORY) {
            $amount += 30;
        }

        if ($reservation->hasProjector()) {
            $amount += 20;
        }

        return $amount;
    }
}
