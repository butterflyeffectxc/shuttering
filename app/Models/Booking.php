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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id');
    }
    public function photoResults()
    {
        return $this->hasMany(PhotoResult::class);
    }
    public function photoType()
    {
        return $this->belongsTo(PhotoType::class, 'photo_type_id');
    }
}
