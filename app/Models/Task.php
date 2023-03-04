<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    /* ***************************************************
    ** 	 Belongsto Relationship with Todo
    *************************************************** */
    public function todos()
    {
        return $this->belongsTo(Todo::class);
    }

    /* ***************************************************
    ** 	 OrderLy Scope
    *************************************************** */
    public function scopeOrderly($query, $todo_id)
    {
        return $query->where('todo_id', $todo_id)->orderBy('priority', 'ASC')->orderBy('order')->orderBy('status', 'ASC');
    }

    /* ***************************************************
    ** 	 Trash
    *************************************************** */
    public function trashes()
    {
        return $this->morphMany(Trash::class, 'trashable');
    }
}
