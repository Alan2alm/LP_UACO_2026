<?php

namespace app\core\models\enums;

enum PaymentsType: string{
    CASE TARJETA = 'Tarjeta';
    CASE EFECTIVO = 'Efectivo';
    CASE TRANSFERENCIA = 'Transferencia';
}