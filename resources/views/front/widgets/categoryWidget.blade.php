@isset($categories)
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Kategoriler
        </div>
        <div class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item">
                <a href="#">{{$category->name}} </a> <span class="badge bg-primary float-end">{{$category->articleCount()}}</span>

                </li>
            @endforeach

          </div>
    </div>

</div>
@endif
