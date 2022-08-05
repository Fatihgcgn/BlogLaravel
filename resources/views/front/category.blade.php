                @extends('front.layouts.master')
                @section('title',$category->name.' Kategori')
                @section('content')

                <div class="col-md-9 col-xl-7">
                    @if(count($articles)>0)
                    @foreach ($articles as $article)
                    <div class="post-preview">

                        <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
                            <h2 class="post-title">{{$article->title}}</h2>

                            <img src="{{$article->image}}" />

                            <h3 class="post-subtitle">
                                {!!str_limit($article->content,80)!!}
                            </h3>
                        </a>

                        <p class="post-meta"> Kategori :
                            <a href="#!">{{$article->getCategory->name}}</a> <span class="float-end">{{$article->created_at->diffForHumans()}}</span></p>
                    </div>

                    @if(!$loop->last)
                    <hr>
                    @endif
                    @endforeach

                    @else
                <div class="alert alert-danger">
                    <h1>Bu Kategoriye ait yazı bulunamadı</h1>
                </div>
                    @endif

                </div>
@include('front.widgets.categoryWidget')
@endsection

