<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone'];

    public function employee()
    {
        return $this->belongsToMany(\App\Employee::class);
    }
}
