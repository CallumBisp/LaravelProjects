<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    protected $fillable = ['name', 'image', 'description', 'health'];

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }
}
