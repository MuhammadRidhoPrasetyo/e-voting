<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidate extends Model
{
    use HasFactory, HasUuids;

    protected $fillable =
    [
        'election_id',
        'name',
        'foto',
        'description',
    ];

    public function election() : BelongsTo
    {
        return $this->belongsTo(Election::class);
    }

}
