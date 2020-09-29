<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = ['name', 'description', 'state'];

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public static function compactList()
    {
        return self::all()
            ->mapWithKeys(fn ($category) => [$category['id'] => $category['name']]);
    }
}
