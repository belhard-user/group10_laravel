<?php

namespace App\Http\Controllers;

use II;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\UploadedFile;

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

        $this->uploadImages($request, $article);

        flash('Пост ' . $article->title . ' добавлен');


        return redirect()->route('news.index');
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

        $this->uploadImages($request, $article);

        flash('Пост ' . $article->title . ' обновлен');

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

    /**
     * @param ArticleRequest $request
     * @param $article
     */
    private function uploadImages(ArticleRequest $request, Article $article)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $storagePath = sprintf('%s/%s', 'images', $article->id);

            foreach ($images as $image) {
                /** @var UploadedFile $image */
                $fileName = time()  . '_' . $image->getClientOriginalName();
                $path = $image->storeAs($storagePath, $fileName, 'image');

                $thImage = '/th-' . $fileName;

                II::make(public_path($path))
                    ->fit(200)
                    ->save(public_path($storagePath) . $thImage);

                $article->images()->create([
                    'path' => $path,
                    'th_path' => $storagePath . $thImage
                ]);
            }
        }
    }
}
