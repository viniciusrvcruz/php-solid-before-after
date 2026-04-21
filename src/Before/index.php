<?php

declare(strict_types=1);

namespace App\Before;

require_once __DIR__ . './../../vendor/autoload.php';

use App\Before\LegacyRoomReservationService;

echo "=== Antes (código legado, violações de SOLID) ===\n\n";

$service = new LegacyRoomReservationService();

$service->reserve('João', 'Sala 101', 'sala', 2, true, 'pix');
