<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;

class AdminController extends Controller
{

    public function index()
    {
        $pages = Pages::getAll();

        return view('admin.index',['pages' => $pages]);
    }

    public function addPage(Request $request)
    {
        return view('admin.page.add_page');
    }

    public function savePage(Request $request)
    {
        $messages = [
            'title.required' => 'Поле название страницы, обязательное для заполнения!',
            'position.required' => 'Поле позиция страницы, обязательно для заполнения!'
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'position' => 'required',
        ],$messages);

        if($validator->fails()) {
            return redirect()->route('admin.add_page')
                ->withErrors($validator)
                ->withInput();
        }

        $page['title'] = $request->input('title');
        $page['keywords'] = $request->input('keywords');
        $page['description'] = $request->input('description');
        $page['position'] = $request->input('position');
        $page['text'] = $request->input('text');

        if(Pages::create($page)) {
            $mess= ['message' => 'Страница создана!'];
        } else {
            $mess = ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('admin.index')->with($mess);
    }

    public function editPage($id)
    {
        $page = Pages::getPageById($id);

        return view('admin.page.add_page', ['page' =>$page]);
    }

    public function updatePage(Request $request)
    {
        $messages = [
            'title.required' => 'Поле название страницы, обязательное для заполнения!',
            'position.required' => 'Поле позиция страницы, обязательно для заполнения!'
        ];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'position' => 'required',
        ],$messages);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dataPage['title'] = $request->input('title');
        $dataPage['keywords'] = $request->input('keywords');
        $dataPage['description'] = $request->input('description');
        $dataPage['position'] = $request->input('position');
        $dataPage['text'] = $request->input('text');
        $id = $request->input('id');

        if(Pages::updatePage($id,$dataPage)) {
            $mess= ['message' => 'Страница обновлена!'];
        } else {
            $mess = ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('admin.index')->with($mess);
    }

    public function deletePage($id)
    {
        if(Pages::deleteById($id)) {
            $mess= ['message' => 'Страница удалена!'];
        } else {
            $mess = ['error' => 'Ошибка в БД, повторите попытку!'];
        }

        return redirect()->route('admin.index')->with($mess);
    }


}
