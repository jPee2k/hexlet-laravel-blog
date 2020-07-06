<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\storeArticle;

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

    public function store(storeArticle $request)
    {
        $data = $request->validated();
        $article = new Article();

        $article->fill($data);
        $article->save();
        $request->session()->flash('success', 'Статья успешно создана!');

        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required|unique:articles,name,' . $article->id,
            'body' => 'required|min:100'
        ]);
        
        $article->fill($data);
        $article->save();

        $request->session()->flash('success', 'Статья успешно обновлена!');

        return redirect()
            ->route('articles.index');
    }
}
