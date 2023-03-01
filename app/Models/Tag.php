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

    /* ***************************************************
    ** 	 Actively
    *************************************************** */
    public function scopeActive($query)
    {
        return $query->where([['creator_id',  Auth::id()], ['status', 1]])->orderBy('name', 'ASC');
    }

    /* ***************************************************
    ** 	 Many to many relationship
    *************************************************** */
    public function todos()
    {
        return $this->belongsToMany(Todo::class);
    }
}
