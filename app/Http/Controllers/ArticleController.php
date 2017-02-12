<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'view']]);
    }

    public function index()
    {
        $articles = Article::populate()->paginate();

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(ArticleRequest $request)
    {
        $article = auth()->user()->article()->create($request->all());

        $article->tag()->attach($request->get('tag_list'));

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

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $article->tag()->sync($request->get('tag_list'));

        return redirect()->route('news.index');
    }

    public function addComment(Article $article, Request $request)
    {
        $this->validate($request, ['message' => 'required']);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        $article->comment()->create($data);

        return redirect()->back();
    }
}
