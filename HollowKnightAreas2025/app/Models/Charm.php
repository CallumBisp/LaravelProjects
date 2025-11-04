<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'connections',
        'image',
        'area_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
