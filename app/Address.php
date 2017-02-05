<?php

namespace App;

use App\Test;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address'];

    public function test() // entity_id
    {
        return $this->belongsTo(Test::class);
    }
}
