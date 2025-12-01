<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalogue extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'catalogues';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function photographer()
    {
        return $this->belongsTo(Photographer::class, 'photographer_id', 'id');
    }
}
