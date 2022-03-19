<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collegue extends Model
{
    protected $fillable=['name'];

    public function students()
    {
        return $this->hasMany(User::class);
    }

    public function professors()
    {
        return $this->belongsToMany(User::class, 'professors_colleges');
    }
}
