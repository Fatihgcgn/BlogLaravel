<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Article;


class Homepage extends Controller
{
    public function index(){
    $data['articles']=Article::OrderBy('created_at','DESC')->get();
    $data['categories']=Category::inRandomOrder()->get();
        return view('front.homepage',$data);
    }

    public function single($category,$slug){

        $category=Category::whereSlug($category)->first() ?? abort(403,'Böyle bir kategori bulunamadııı');
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'Böyle bir sayfa bulunamadııı');

        $article->increment('hit');

        $data['article']=$article;
        $data['categories']=Category::inRandomOrder()->get();

        return view('front.single',$data);
    }


}
