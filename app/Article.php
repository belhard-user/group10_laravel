<?php

namespace App;

use App\Comment;
use App\Tag;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'short_description', 'body'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function scopePopulate($query, $field='created_at')
    {
        return $query
            ->where('created_at', '<=', \Carbon\Carbon::now())
            ->orderBy($field, 'DESC');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTagListAttribute()
    {
        return $this->tag()->pluck('id')->toArray();
    }
}
