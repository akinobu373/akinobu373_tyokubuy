<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;


    public function vegetable()
    {
        return $this->belongsTo(\App\Models\Vegetable::class);
    }
}
