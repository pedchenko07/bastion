<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    protected $msg = false;
    public function index($msg = false)
    {
        $data['brands'] = $this->data['brands'];
        if (Session::has('success')) {
            $data['success'] = Session::get('success');
        }
        if (Session::has('error')) {
            $data['error'] = Session::get('error');
        }
        $data['news'] = News::getAll();
        return view('admin.news.index', $data);
    }

    public function addNews()
    {
        $data['title'] = '';
        $data['keywords'] = '';
        $data['description'] = '';
        $data['anons'] = '';
        $data['text'] = '';
        $data['error'] = false;
        $data['brands'] = $this->data['brands'];

        return view('admin.news.addNews', $data);
    }

    public function saveNews(Request $request)
    {
        $data['title'] = $request->input('title');
        $data['keywords'] = $request->input('keywords');
        $data['description'] = $request->input('description');
        $data['anons'] = $request->input('anons');
        $data['text'] = $request->input('text');

        if ($data['title'] == '' || $data['keywords'] == '' || $data['anons'] == '' ||
        $data['description'] == '' || $data['text'] == '') {
            $data['error'] = 'Вы не заполнили форму';
            $data['brands'] = $this->data['brands'];
            return view('admin.news.addNews', $data);
        }
        $data['date'] = Carbon::now();

        if(News::create($data)){
            Session::flash('success', 'Новость добавлена успешно');
        } else {
            Session::flash('error', 'При добавлении новости, что-то пошло не так');
        }
        return redirect()->route('news.index');
    }

    public function deleteNews($id)
    {
        if (News::deleteById($id)) {
            Session::flash('success', 'Новость удалена успешно');
        } else {
            Session::flash('error', 'При удалении новости, что-то пошло не так');
        }

        return redirect()->route('news.index');
    }

    public function editNews($id)
    {
        $result = News::getById($id);

        $data['title'] = $result->title;
        $data['keywords'] = $result->keywords;
        $data['description'] = $result->description;
        $data['anons'] = $result->anons;
        $data['text'] = $result->text;
        $data['error'] = false;
        $data['id'] = $id;
        $data['brands'] = $this->data['brands'];
        return view('admin.news.addNews', $data);
    }

    public function updateNews(Request $request)
    {
        $id = $request->input('id');
        $data['title'] = $request->input('title');
        $data['keywords'] = $request->input('keywords');
        $data['description'] = $request->input('description');
        $data['anons'] = $request->input('anons');
        $data['text'] = $request->input('text');

        if ($data['title'] == '' || $data['keywords'] == '' || $data['anons'] == '' ||
            $data['description'] == '' || $data['text'] == '') {
            $data['error'] = 'Вы не заполнили форму';
            $data['brands'] = $this->data['brands'];
            return view('admin.news.addNews', $data);
        }
        $data['date'] = Carbon::now();

        if(News::updateNews($data, $id)) {
            Session::flash('success', 'Новость обновлена успешно');
        } else {
            Session::flash('error', 'При обновлении что-то пошло не так');
        }
        return redirect()->route('news.index');
    }
}
