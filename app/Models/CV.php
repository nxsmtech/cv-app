<?php

namespace App\Models;

use Database\Factories\CVFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class CV extends Model
{
    use HasFactory;

    protected $table = 'cvs';

    protected $fillable = [
        'title',
        'is_active',
    ];

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

    public function education(): HasMany
    {
        return $this->hasMany(Education::class, 'cv_id', 'id');
    }

    public function workExperience(): HasMany
    {
        return $this->hasMany(WorkExperience::class, 'cv_id', 'id');
    }

    public function skill(): HasMany
    {
        return $this->hasMany(Skill::class, 'cv_id', 'id');
    }

    public function personalDetail(): HasOne
    {
        return $this->hasOne(PersonalDetail::class, 'cv_id', 'id');
    }
}
