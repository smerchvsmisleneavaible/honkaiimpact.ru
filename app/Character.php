<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';
    protected $fillable = [
        'charname', 'charimage', 'chardesc',
        'charclass', 'charrank', 'dmgtype', 'stigset', 'weap', 'chartype'
    ];
    public function stigmatasets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Stigmataset::class);
    }
    public function ranks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rank::class);
    }
    public function damagetypes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Damagetype::class);
    }
    public function classchars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Classchar::class);
    }
    public function weapons(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Weapon::class);
    }

    public function chartypes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Chartype::class);
    }
}
