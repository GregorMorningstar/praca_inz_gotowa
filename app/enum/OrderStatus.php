<?php

namespace App\enum;

enum OrderStatus
{
    const PENDING = 'Wystaiowne';
    const DELIVERED = 'Przyjęte';
    const AlLOCATED = 'Przydzielone';

    const DONE = 'Wykonane';
    const CANCELLED = 'Wycofane';

    const ORDERSTATUS = [
        self::PENDING,
        self::DELIVERED,
        self::DONE,
        self::AlLOCATED,
        self::CANCELLED,
    ];


}
