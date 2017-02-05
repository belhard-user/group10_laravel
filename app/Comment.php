<?php

namespace App;

use App\Article;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['message', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function linkToArticle()
    {
        return route('news.view', ['article' => $this->article->slug]);
    }
}
