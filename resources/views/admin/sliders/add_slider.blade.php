@extends('layouts.admin-app')
@section('content')

    <div class="content">
        <div class="slider-add-holder">

            {{--<h3 class="error">Вы не заполнили форму!</h3>--}}
            <h2 class="add-slider-title">Добавить новый слайдер</h2>
            @if(Request::is('admin/sliders/create'))
            <ul class="slider-change">
                <li><a class="photo-slider" href="{{ route('sliders.create.img') }}"></a></li>
                <li><a class="video-slider" href="{{ route('sliders.create.video') }}"></a></li>
            </ul>
            @else
            <div class="form-add">
                <form method="post" enctype="multipart/form-data" class="form-slider">
                    <input type="hidden" name="add-slider" value="TRUE"/>
                    <table class="tabl table">
                        <tr>
                            <td>
                                <b>Название слайдера</b>
                            </td>
                            <td>
                                <input type="text" class="head-text" name="title"/>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>Статус</b>
                            </td>
                            <td>
                                <input type="checkbox" name="status"/>
                            </td>
                        </tr>
                        @if(Request::is('admin/sliders/create/img'))
                            <input type="hidden" value="image" name="type">
                            <tbody class="sliders-table">
                            <tr>
                                <td><b>Ещё фото</b></td>
                                <td><span class="slider-add"></span></td>
                            </tr>
                            <tr class="slider-file">
                                <td>
                                    <input type="file" name="sliders[]"/>
                                </td>
                                <td>
                                    <label for="link[]"><b>Ссылка</b></label>
                                    <input type="text" class="head-text" name="link[]"/>
                                </td>
                            </tr>
                            </tbody>
                        @elseif(Request::is('admin/sliders/create/video'))
                            <tbody class="sliders-table">
                            <input type="hidden" value="video" name="type">
                            <tr>
                                <td>Ещё ссылка</td>
                                <td><span class="slider-add"></span></td>
                            </tr>
                            <tr class="slider-file">
                                <td>
                                    Ссылка
                                </td>
                                <td>
                                    <input class="slider-link" type="text" name="link[]"/>
                                </td>
                            </tr>
                            </tbody>
                        @endif
                        <tr>
                            <td>
                                <input class="admin-button" type="submit" value="Добавить"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            @endif
        </div>
    </div> <!-- .content -->


@endsection