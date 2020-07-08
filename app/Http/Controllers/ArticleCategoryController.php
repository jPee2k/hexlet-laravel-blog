<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ArticleCategory::orderBy('id', 'desc')->paginate(10);

        return view('article_category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new ArticleCategory();
        
        return view('article_category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:article_categories|max:100',
            'description' => 'required|min:50',
            'state' => [
                'required',
                Rule::in(['draft', 'published'])
            ]
        ]);

        $category = new ArticleCategory();
        $category->fill($data);
        $category->save();

        $request->session()->flash('success', 'Категория успешно создана!');

        return redirect()
            ->route('article_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        $articles = Article::where('category_id', $articleCategory->id)->get();

        return view('article_category.show', ['category' => $articleCategory, 'articles' => $articles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('article_category.edit', ['category' => $articleCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:article_categories,name,' . $articleCategory->id,
            'description' => 'required|min:50',
            'state' => [
                'required',
                Rule::in(['draft', 'published']),
            ]
        ]);

        $articleCategory->fill($data);
        $articleCategory->save();

        $request->session()->flash('success', 'Категория успешно обновлена');

        return redirect()
            ->route('article_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ArticleCategory $articleCategory)
    {
        if ($articleCategory) {
            $articleCategory->delete();
        }

        $request->session()->flash('success', 'Категория успешно удалена');

        return redirect()->route('article_categories.index');
    }
}
