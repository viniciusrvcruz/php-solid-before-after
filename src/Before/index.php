<?php

declare(strict_types=1);

namespace App\Before;

require_once __DIR__ . './../../vendor/autoload.php';

use App\Before\LegacyRoomReservationService;

echo "=== Antes (código legado, violações de SOLID) ===\n\n";

$service = new LegacyRoomReservationService();

echo "--- Cenário 1: reserva válida ---\n";
$service->reserve('Maria', 'Sala 101', 'sala', 2, true, 'pix');
echo "\n";

echo "--- Cenário 2: usuário inválido ---\n";
$service->reserve('   ', 'Sala 102', 'sala', 1, false, 'pix');
echo "\n";

echo "--- Cenário 3: sala já reservada (Sala 101) ---\n";
$service->reserve('João', 'Sala 101', 'laboratory', 1, false, 'pix');
echo "\n";
