                @extends('front.layouts.master')
                @section('title','Anasayfa')
                @section('content')

                <div class="col-md-9 col-xl-7">
                    @foreach ($articles as $article)


                    <div class="post-preview">

                        <a href="{{route('single',$article->slug)}}">
                            <h2 class="post-title">{{$article->title}}</h2>

                            <img src="{{$article->image}}" />

                            <h3 class="post-subtitle">{{str_limit($article->content,75)}}</h3>
                        </a>

                        <p class="post-meta"> Kategori :
                            <a href="#!">{{$article->getCategory->name}}</a> <span class="float-end">{{$article->created_at->diffForHumans()}}</span></p>
                    </div>

                    @if(!$loop->last)
                    <hr>
                    @endif

                    @endforeach
                </div>
@include('front.widgets.categoryWidget')
@endsection