<?php

declare(strict_types=1);

namespace App\After\Services;

use App\After\Entities\Reservation;
use App\After\Notifications\NotifierInterface;
use App\After\Payments\PaymentInterface;
use App\After\Repositories\ReservationRepositoryInterface;
use App\After\Validators\ReservationValidator;
use App\After\Receipts\ReceiptGeneratorInterface;

class ReservationService
{
    public function __construct(
        private ReservationValidator $reservationValidator,
        private RoomAvailabilityService $roomAvailabilityService,
        private ReservationPricingService $reservationPricingService,
        private ReservationRepositoryInterface $reservationRepository,
        private NotifierInterface $notifier,
        private ReceiptGeneratorInterface $receiptGenerator,
    ) {}

    public function reserve(Reservation $reservation, PaymentInterface $payment): void
    {
        $this->reservationValidator->validate($reservation);
        $this->roomAvailabilityService->checkAvailability($reservation);

        $amount = $this->reservationPricingService->calculate($reservation);

        $payment->pay($amount);

        $this->reservationRepository->create($reservation);

        $this->notifier->notify($reservation);
        $this->receiptGenerator->generate($reservation, $amount);
    }
}
