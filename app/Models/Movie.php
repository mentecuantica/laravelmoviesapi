<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
    use HasFactory;

    public $fillable = [
        'title','actors','genre',"genre_id"
    ];

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function actors() {
        return $this->hasMany(Actor::class);
    }
}
