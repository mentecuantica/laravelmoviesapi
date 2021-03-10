<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public $fillable = [
        'title','movies'
    ];

    public function movies() {
        return $this->hasMany(Movie::class);
    }

}
