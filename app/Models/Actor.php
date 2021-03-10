<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public $fillable = [
        'title','movies','actor_name'
    ];

    public function movies() {
        return $this->belongsTo(Movie::class);
    }
}
