<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Tag extends Model
{
    use HasFactory, SoftDeletes;


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


    /* ***************************************************
    ** 	 Trash
    *************************************************** */
    public function trashes()
    {
        return $this->morphMany(Trash::class, 'trashable');
    }
}
