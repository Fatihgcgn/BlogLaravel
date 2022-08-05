                @extends('front.layouts.master')
                @section('title',$article->title)
                @section('content')


                            <div class="col-md-9 col-xl-7">
                                {!!$article->content!!}
                            </div>

                            @include('front.widgets.categoryWidget')
                            @endsection
