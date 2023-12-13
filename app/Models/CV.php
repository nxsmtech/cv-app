<?php

namespace App\Models;

use Database\Factories\CVFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CV extends Model
{
    use HasFactory;

    protected $table = 'cvs';

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return CVFactory::new();
    }

    public function scopeIsActive(Builder $query): void
    {
        $query->where('is_active', true);
    }
}
