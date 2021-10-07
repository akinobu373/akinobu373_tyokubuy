<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vegetable extends Model
{
    use HasFactory;

    public function stores()
    {
        return $this->hasMany(\App\Models\Store::class);
    }
}
