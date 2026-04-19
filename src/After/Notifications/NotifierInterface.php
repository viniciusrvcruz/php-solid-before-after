<?php

declare(strict_types=1);

namespace App\After\Notifications;

use App\After\Entities\Reservation;

interface NotifierInterface
{
    public function notify(Reservation $reservation): void;
}
