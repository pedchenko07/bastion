<div class="box category">
    <div class="box-heading"><h3>Категории</h3></div>
    <div class="box-content">
        <div class="box-category">
            <ul class="menu">
                @foreach($brands as $brand)
                    <li><a href="{{ route('site.category',$brand->id) }}">{{ $brand->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>