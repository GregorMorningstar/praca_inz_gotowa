<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'przyjazd_zaladunek',
        'odjazd_zaladunek',
        'przyjazd_dostawa',
        'odjazd_dostawa'
    ];
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }
}
