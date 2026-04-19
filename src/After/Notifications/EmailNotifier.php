<?php

declare(strict_types=1);

namespace App\After\Notifications;

use App\After\Entities\Reservation;

class EmailNotifier implements NotifierInterface
{
    public function notify(Reservation $reservation): void
    {
        echo "Email sent\n";
    }
}
