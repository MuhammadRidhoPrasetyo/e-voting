<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Election extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =
    [
        'title',
        'slug',
        'cover',
        'description',
        'status',
        'start_time',
        'end_time',
    ];

    protected function casts() : array
    {
        return [
            'start_time' => 'datetime: d F Y H:i',
            'end_time' => 'datetime: d F Y H:i',
        ];
    }

    public function candidates() : HasMany
    {
        return $this->hasMany(Candidate::class);
    }
}
