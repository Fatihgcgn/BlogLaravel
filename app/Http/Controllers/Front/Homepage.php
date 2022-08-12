<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Models\Article;
use App\Models\Models\Page;
use App\Models\Models\Contact;


class Homepage extends Controller
{

    public function __construct()
    {
        view()->share('pages',Page::orderBy('order', 'ASC')->get());
        view()->share('categories',Category::inRandomOrder()->get());
    }

    public function index()
    {

        $data['articles'] = Article::OrderBy('created_at', 'DESC')->paginate(2);
        $data['articles']->withPath(url('sayfa'));
        return view('front.homepage', $data);
    }

    public function single($category, $slug)
    {
        $category = Category::whereSlug($category)->first() ?? abort(403, 'Böyle bir kategori bulunamadi');
        $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Böyle bir sayfa bulunamadi');

        $article->increment('hit');

        $data['article'] = $article;

        return view('front.single', $data);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'Böyle bir kategori bulunamadi');
        $data['category'] = $category;
        $data['categories'] = Category::inRandomOrder()->get();
        $data['articles'] = Article::where('category_id', $category->id)->paginate(1);
        return view('front.category', $data);
    }
    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first() ?? abort(403, 'Böyle bir kategori bulunamadi');
        $data['page'] = $page;
        return view('front.page', $data);
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactpost(Request $request){

        $rules=[
        'name'=>'required|min:3',
        'email'=>'required|email',
        'topic'=>'required',
        'message'=>'required|min:10'
        ];
        $validate=Validator::make($request->post(),$rules);

        if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }

        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contact')->with('success','Mesaj gönderiminiz başarılı, Teşekkürler ');
    }
}
