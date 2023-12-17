<?php

namespace App\Enums\Skill;

use App\Enums\HasOptions;

enum Levels: string implements HasOptions
{
    case BEGINNER = 'Beginner';
    case INTERMEDIATE = 'Intermediate';
    case ADVANCED = 'Advanced';
    case EXPERT = 'Expert';

    public static function asOptions(): array
    {
       return [
           1 => self::BEGINNER->value,
           2 => self::INTERMEDIATE->value,
           3 => self::ADVANCED->value,
           4 => self::EXPERT->value,
       ];
    }
}
