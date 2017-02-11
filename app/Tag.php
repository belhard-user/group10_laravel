<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public static function getTagList()
    {
        return static::pluck('title', 'id')->toArray();
    }
}
