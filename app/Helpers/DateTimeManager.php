<?php

declare(strict_types=1);

namespace App\Helpers;

use Carbon\Carbon;


final class DateTimeManager
{
    public static function eventMonth(string $date): string
    {
        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');

        return Carbon::parse($date)->format('F');
    }
}