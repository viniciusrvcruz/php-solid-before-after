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
use Throwable;

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

$payment = new PixPayment();

$reserve = static function (
    string $user,
    string $room,
    string $roomType,
    int $hours,
    bool $projector,
) use ($reservationService, $payment): void {
    $type = strtolower($roomType) === 'laboratory'
        ? RoomTypeEnum::LABORATORY
        : RoomTypeEnum::STANDARD;

    $reservation = new Reservation(
        user: $user,
        room: $room,
        roomType: $type,
        hours: $hours,
        projector: $projector,
    );

    try {
        $reservationService->reserve($reservation, $payment);
    } catch (Throwable $e) {
        echo $e->getMessage() . "\n";
    }
};

echo "--- Cenário 1: reserva válida ---\n";
$reserve('Maria', 'Sala 101', 'sala', 2, true);
echo "\n";

echo "--- Cenário 2: usuário inválido ---\n";
$reserve('   ', 'Sala 102', 'sala', 1, false);
echo "\n";

echo "--- Cenário 3: sala já reservada (Sala 101) ---\n";
$reserve('João', 'Sala 101', 'laboratory', 1, false);
echo "\n";
