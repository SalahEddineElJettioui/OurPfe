<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'beds', 'baths', 'area', 'city', 'code', 'street', 'street_nr', 'price'
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\User::class,
            'by_user_id'
        );
    }
    public function scopeMostRecent($query)
    {
        return $query->orderByDesc('created_at');
    }
}
