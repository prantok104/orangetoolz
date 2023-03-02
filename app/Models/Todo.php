<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
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
    ** 	 Many to many relationship
    *************************************************** */
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /* ***************************************************
    ** 	 Many to many relationship
    *************************************************** */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    /* ***************************************************
    ** 	 Has Many relationship with task
    *************************************************** */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }



    /* ***************************************************
    ** 	 Favourite
    *************************************************** */
    public function scopeFavourite($query)
    {
        return $query->withCount('tasks')->where([['is_favourite', 1], ['creator_id', Auth::id()]])->latest();
    }


    /* ***************************************************
    ** 	 Trash
    *************************************************** */
    public function trashes()
    {
        return $this->morphMany(Trash::class, 'trashable');
    }
}
