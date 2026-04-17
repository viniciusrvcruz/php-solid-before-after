<?php

declare(strict_types=1);

class Reservation
{
    public function __construct(
        private string $user,
        private string $room,
        private RoomTypeEnum $roomType,
        private int $hours,
        private bool $projector,
    ) {}

    public function getUser(): string
    {
        return $this->user;
    }

    public function getRoom(): string
    {
        return $this->room;
    }

    public function getRoomType(): RoomTypeEnum
    {
        return $this->roomType;
    }

    public function getHours(): int
    {
        return $this->hours;
    }

    public function hasProjector(): bool
    {
        return $this->projector;
    }
}
