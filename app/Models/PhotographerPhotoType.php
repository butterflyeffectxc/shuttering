<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotographerPhotoType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];
    protected $table = 'photographer_photo_types';
    protected $primaryKey = 'id';

    public function photographer()
    {
        return $this->belongsTo(Photographer::class);
    }

    public function photoType()
    {
        return $this->belongsTo(PhotoType::class, 'category_id');
    }
}
