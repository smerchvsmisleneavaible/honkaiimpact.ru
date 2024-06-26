<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'musics';
    protected $fillable = [
        'link', 'cover', 'name', 'artist',
    ];

}
