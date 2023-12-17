<?php

namespace App\Models;

use Database\Factories\PersonalDetailFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalDetail extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return PersonalDetailFactory::new();
    }

    public function cv(): BelongsTo
    {
        return $this->belongsTo(CV::class, 'cv_id', 'id');
    }
}
