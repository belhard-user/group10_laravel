<?php

namespace App;

use App\Address;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';

    protected $fillable = ['email', 'name', 'age', 'user_role'];

    // get*Attribute
    public function getFullNameAttribute()
    {
        return sprintf('%s->%s', $this->name, $this->email);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
