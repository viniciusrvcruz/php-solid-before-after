<?php

declare(strict_types=1);

echo "=== Depois (refatoração SOLID) ===\n";

$reservation = new Reservation(
    user: 'João',
    room: 'Sala 3',
    roomType: RoomTypeEnum::LABORATORY,
    hours: 2,
    projector: true,
);

$payment = new PixPayment();

$reservationService = new ReservationService(
    new ReservationValidator(),
    new RoomAvailabilityService(new ReservationMemoryRepository()),
    new ReservationPricingService(),
    new ReservationMemoryRepository(),
    new EmailNotifier(),
    new TextReceiptGenerator(),
);

$reservationService->reserve($reservation, $payment);
