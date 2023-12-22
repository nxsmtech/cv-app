<?php

namespace App\Enums\Skill;

use App\Enums\HasOptions;

enum Skills: string implements HasOptions
{
    case TECHNICAL = 'Technical';
    case SOFT = 'Soft';
    case LEADERSHIP = 'Leadership';
    case LANGUAGE = 'Language';
    case COMMON = 'Common';

    public static function asOptions(): array
    {
        return [
            self::TECHNICAL->value => self::TECHNICAL->value,
            self::SOFT->value => self::SOFT->value,
            self::LEADERSHIP->value => self::LEADERSHIP->value,
            self::LANGUAGE->value => self::LANGUAGE->value
        ];
    }

    public static function skillSets(): array
    {
        return [
            self::TECHNICAL->value => self::technical(),
            self::SOFT->value => self::soft(),
            self::LEADERSHIP->value => self::leadership(),
            self::LANGUAGE->value => self::language(),
        ];
    }

    public static function technical(): array
    {
        return [
            'Programming',
            'Database Management',
            'Data Analysis',
            'Web Development',
            'Cybersecurity'
        ];
    }

    public static function soft(): array
    {
        return [
            'Communication',
            'Teamwork',
            'Problem-Solving',
            'Time Management',
            'Adaptability'
        ];
    }

    public static function leadership(): array
    {
        return [
            'Project Management',
            'Team Leadership',
            'Strategic Planning',
            'Decision Making',
            'Conflict Resolution'
        ];
    }

    public static function language(): array
    {
        return [
            'English',
            'Spanish',
            'Mandarin',
            'French',
            'German'
        ];
    }
}
