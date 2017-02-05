<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name'];

    public function phone()
    {
        return $this->belongsToMany(\App\Phone::class);
    }
}
