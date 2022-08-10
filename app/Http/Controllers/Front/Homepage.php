<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Article;
use App\Models\Models\Page;


class Homepage extends Controller
{
    public function index()
    {
        $data['articles']=Article::OrderBy('created_at', 'DESC')->paginate(2);
        $data['articles']->withPath(url('sayfa'));
        $data['categories']=Category::inRandomOrder()->get();
        $data['pages']=Page::orderBy('order','ASC')->get();
        return view('front.homepage',$data);
    }

    public function single($category, $slug)
    {
        $category=Category::whereSlug($category)->first() ?? abort(403, 'Böyle bir kategori bulunamadi');
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Böyle bir sayfa bulunamadi');

        $article->increment('hit');

        $data['article']=$article;
        $data['categories']=Category::inRandomOrder()->get();

        return view('front.single', $data);
    }

    public function category($slug){
        $category=Category::whereSlug($slug)->first() ?? abort(403, 'Böyle bir kategori bulunamadi');
        $data['category']=$category;
        $data['categories']=Category::inRandomOrder()->get();
        $data['articles']=Article::where('category_id',$category->id)->paginate(1);
        return view('front.category', $data);
    }
}
