<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function store(\App\Http\Requests\ArticleRequest $request)
    {
        $data = $request->except('_token');

        $data['created_at'] = new \DateTime();
        $data['updated_at'] = new \DateTime();
        $data['slug'] = str_slug(array_get($data, 'title'));

        DB::table('articles')->insert($data);

        return redirect()->back();
    }
}
