<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    #allowing all parameters to be entered into the database
    protected $fillable = [
        'name',
        'description',
        'connections',
        'image',
        'rooms',
        'created_at',
        'updated_at'
    ];
}
