<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'location',
        'starts_at',
        'ends_at',
    ];

    protected $dates = [
        'starts_at', 'ends_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
