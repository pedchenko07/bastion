@if(isset($videoSliders) && !$videoSliders->isEmpty())
    <div id="myCarousel2" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" id="header-slider" role="listbox">
            {{--<div class="item active">--}}
                {{--<iframe width="870" height="480" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>--}}
            {{--</div>--}}
            @foreach($videoSliders as $key => $val)
                <div class="item @if($key == 0) active @endif">
                    <iframe width="870" height="480" src="https://www.youtube.com/embed/{{ $val->link }}" frameborder="0" allowfullscreen></iframe>
                </div>
            @endforeach
        </div>

        <!-- Left and right controls -->
        <div class="control_video_slider">
            <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
                <i class="material-icons">arrow_back</i>
            </a>
            <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
                <i class="material-icons">arrow_forward</i>
            </a>
        </div>
    </div>
@endif