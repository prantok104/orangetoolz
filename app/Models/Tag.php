<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tag extends Model
{
    use HasFactory;


    /* ***************************************************
    ** 	 creator scope
    *************************************************** */
    public function scopeCreator($query)
    {
        return $query->where('creator_id', Auth::id());
    }
}
