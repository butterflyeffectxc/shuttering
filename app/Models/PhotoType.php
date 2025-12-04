<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];
    protected $table = 'photo_types';
    protected $primaryKey = 'id';

    public function photoTypeDetails()
    {
        return $this->hasMany(PhotographerPhotoType::class, 'id', 'photo_type_id');
    }
    public function photographers()
    {
        return $this->belongsToMany(Photographer::class, 'photographer_photo_types');
    }
    public function bookings()
    {
        $this->hasMany(Booking::class);
    }
}
