<?php

namespace App\Http\Controllers;

use DB;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::populate()->paginate();

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        Article::create($request->all());

        return redirect()->back();
    }

    public function view(Article $article)
    {
        return view('article.view', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Article $article, Request $request)
    {
        $article->update($request->all());

        return redirect()->route('news.index');
    }
}
