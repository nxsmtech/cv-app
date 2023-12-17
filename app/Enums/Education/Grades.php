<?php

namespace App\Enums\Education;

use App\Enums\HasOptions;

enum Grades: string implements HasOptions
{
    case ELEMENTARY = 'Elementary';
    case MIDDLE_SCHOOL = 'Middle School';
    case HIGH_SCHOOL = 'High School';
    case BACHELOR_OF_ARTS = 'Bachelor of Arts';
    case BACHELOR_OF_SCIENCE = 'Bachelor of Science';
    case BACHELOR_OF_ENGINEERING = 'Bachelor of Engineering';
    case MASTER = 'Master';
    case DOCTORATE = 'Doctorate';
    case POSTDOCTORAL = 'Postdoctoral';

    public static function asOptions(): array
    {
        return [
            1 => self::ELEMENTARY->value,
            2 => self::MIDDLE_SCHOOL->value,
            3 => self::HIGH_SCHOOL->value,
            4 => self::BACHELOR_OF_ARTS->value,
            5 => self::BACHELOR_OF_SCIENCE->value,
            6 => self::BACHELOR_OF_ENGINEERING->value,
            7 => self::MASTER->value,
            8 => self::DOCTORATE->value,
            9 => self::POSTDOCTORAL->value,
        ];
    }
}
