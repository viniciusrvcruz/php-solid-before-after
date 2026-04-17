<?php

declare(strict_types=1);

interface NotifierInterface
{
    public function notify(Reservation $reservation): void;
}
