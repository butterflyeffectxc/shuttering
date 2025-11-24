<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id',
    ];
    protected $table = 'bookings';
    protected $primaryKey = 'id';

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id');
    }
}
