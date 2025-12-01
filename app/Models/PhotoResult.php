<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoResult extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'photo_results';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function photographer()
    {
        return $this->belongsTo(Photographer::class,);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class,);
    }
}
