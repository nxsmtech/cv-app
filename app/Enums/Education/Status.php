<?php

namespace App\Enums\Education;

use App\Enums\HasOptions;

enum Status: string implements HasOptions
{
    case COMPLETE = 'Complete';
    case INCOMPLETE = 'Incomplete';
    case IN_PROGRESS = 'In Progress';

    public static function asOptions(): array
    {
        return [
            1 => self::COMPLETE->value,
            2 => self::INCOMPLETE->value,
            3 => self::IN_PROGRESS->value,
        ];
    }
}
