<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   Photographer extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [
    'id',
  ];
  protected $table = 'photographers';
  protected $primaryKey = 'id';

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function photoTypes()
  {
    return $this->belongsToMany(PhotoType::class, 'photographer_photo_types');
  }
  // public function photoTypeDetails()
  // {
  //   return $this->hasMany(PhotoType::class);
  // }
  public function bookings()
  {
    return $this->hasMany(Booking::class, 'photographer_id');
  }
  public function photoResults()
  {
    return $this->hasMany(PhotoResult::class);
  }
  public function catalogues()
  {
    return $this->hasMany(Catalogue::class, 'photographer_id');
  }
  public function wishlists()
  {
    return $this->hasMany(Wishlist::class, 'photographer_id');
  }
}
