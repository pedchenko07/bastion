@if(isset($imgSliders) && !$imgSliders->isEmpty())
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" id="header-slider" role="listbox">

            {{--<div class="item active">--}}
                {{--<a href="{{ $imgSliders[0]->link }}">--}}
                    {{--<img width="870px" height="414px" src="{{ \App\Models\ImageToSlider::PATH_IMGSLIDERS . $imgSliders[0]->image }}"/>--}}
                {{--</a>--}}
            {{--</div>--}}

        @foreach($imgSliders as $key => $value)
            <div class="item @if($key == 0) active @endif">
                <a href="{{ $value->link }}">
                    <img src="{{ \App\Models\ImageToSlider::PATH_IMGSLIDERS . $value->image }}">
                </a>
            </div>
        @endforeach
        </div>

        <!-- Left and right controls -->
        <div class="control_slider">
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <i class="material-icons">chevron_left</i>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <i class="material-icons">chevron_right</i>
            </a>
        </div>
    </div>

@endif