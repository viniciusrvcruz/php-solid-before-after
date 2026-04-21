<?php

declare(strict_types=1);

namespace App\After;

require_once __DIR__ . './../../vendor/autoload.php';

use App\After\Entities\Reservation;
use App\After\Enums\RoomTypeEnum;
use App\After\Notifications\EmailNotifier;
use App\After\Payments\PixPayment;
use App\After\Receipts\TextReceiptGenerator;
use App\After\Repositories\ReservationMemoryRepository;
use App\After\Services\ReservationPricingService;
use App\After\Services\ReservationService;
use App\After\Services\RoomAvailabilityService;
use App\After\Validators\ReservationValidator;

echo "=== Depois (refatoração SOLID) ===\n\n";

$repository = new ReservationMemoryRepository();
$reservationService = new ReservationService(
    new ReservationValidator(),
    new RoomAvailabilityService($repository),
    new ReservationPricingService(),
    $repository,
    new EmailNotifier(),
    new TextReceiptGenerator(),
);

$reservation = new Reservation(
    user: 'João',
    room: 'Sala 101',
    roomType: RoomTypeEnum::LABORATORY,
    hours: 2,
    projector: true,
);

$payment = new PixPayment();

$reservationService->reserve($reservation, $payment);
