<?php

declare(strict_types=1);

namespace App\Before;

class LegacyRoomReservationService
{
    /** @var list<string> */
    private array $reservations = [];

    public function reserve(
        ?string $user,
        ?string $room,
        ?string $roomType,
        int $hours,
        bool $projector,
        string $paymentMethod
    ): void {
        if ($user === null || trim($user) === '') {
            echo "Invalid user.\n";
            return;
        }

        if ($room === null || trim($room) === '') {
            echo "Invalid room.\n";
            return;
        }

        if ($hours <= 0) {
            echo "Invalid hours.\n";
            return;
        }

        foreach ($this->reservations as $r) {
            if (str_contains($r, $room)) {
                echo "Room already booked.\n";
                return;
            }
        }

        $amount = 50 * $hours;

        if ($roomType === 'laboratory') {
            $amount += 30;
        }

        if ($projector) {
            $amount += 20;
        }

        if (strcasecmp($paymentMethod, 'pix') === 0) {
            echo "PIX payment OK\n";
        } else {
            echo "Invalid payment\n";
            return;
        }

        $record = $user . ' - ' . $room . ' - ' . $amount;
        $this->reservations[] = $record;

        echo "Email sent\n";
        echo 'Receipt: ' . $record . "\n";
    }
}
