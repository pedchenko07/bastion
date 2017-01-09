<div class="metrika box">
    <div class="box-heading">
        <h3 class="toggle-metrika" data-toggle="collapse" data-target="#metrika">Метрика<i class="material-icons">expand_more</i></h3>
    </div>
    <div class="box-content collapse" id="metrika">
        @foreach($metrics as $metric)
            <div class="metric">
                {!! $metric->code !!}
            </div>
        @endforeach
    </div>
</div>