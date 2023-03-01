<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $guarded = [];

    /* ***************************************************
    ** 	 Polymorphic relationship
    *************************************************** */
    public function trashable()
    {
        return $this->morphTo();
    }

    /* ***************************************************
    ** 	 Poly morphic service
    *************************************************** */
    public function services()
    {
        if (isset($this->trashable_type)) {
            return $this->hasOne($this->trashable_type, 'id', 'trashable_id')->withTrashed()->get();
        }
    }
}
