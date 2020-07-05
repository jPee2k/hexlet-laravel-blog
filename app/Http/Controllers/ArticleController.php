<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{   
    public function index()
    {
        //todo flash->done
        $articles = Article::paginate(10);

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article();

        return view('article.create', compact('article'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('article.show', compact('article'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:200'
        ]);

        $article = new Article();

        $article->fill($data);
        $article->save();

        $request->session()->flash('success', 'Статья успешно создана!');

        return redirect()
            ->route('articles.index');
    }
}
