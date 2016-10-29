<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingsPostRequest;
use App\Models\Dostavkas;
use App\Models\Oplata;
use App\Models\Setting;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index()
    {
        $data = [];
        $data['deliveryList']   =   Dostavkas::getAll();
        $data['oplataList']     =   Oplata::getAll();
        $data['settings']       =   Setting::getFirstName();
        return view('admin.settings.index', $data);
    }
    public function design()
    {
        return view('admin.settings.design');
    }

    public function delivery()
    {
        $data = [];
        if(Session::has('error')){
            $data['error'] = Session::get('error');
        }
        return view('admin.settings.delivery.addDelivery', $data);
    }

    public function deliveryNew(Request $request)
    {
        $name = $request->input('name');
        if (strlen($name) == 0) {
            Session::flash('error','Поле название не должно быть пустым');
            redirect()->route('settings.delivery');
        }
        Dostavkas::createNew(['name' => $name]);
        return redirect()->route('settings.index');
    }

    public function deliveryEdit($id)
    {
        $data['item'] = Dostavkas::getById($id);
        return view('admin.settings.delivery.addDelivery', $data);
    }

    public function deliveryUpdate(Request $request, $id)
    {
        $name = $request->input('name');
        if (strlen($name) == 0) {
            Session::flash('error','Поле название не должно быть пустым');
            redirect()->route('settings.delivery');
        }
        Dostavkas::updateById([
            'name'  => $name,
            'id'    => $id
        ]);
        return redirect()->route('settings.index');
    }

    public function deliveryDelete($id)
    {
        Dostavkas::deleteById($id);
        return redirect()->route('settings.index');
    }

    public function oplata()
    {
        $data = [];
        if(Session::has('error')){
            $data['error'] = Session::get('error');
        }
        return view('admin.settings.oplata.addOplata', $data);
    }

    public function oplataNew(Request $request)
    {
        $name = $request->input('name');
        if (strlen($name) == 0) {
            Session::flash('error','Поле название не должно быть пустым');
            redirect()->route('settings.oplata');
        }
        Oplata::createNew(['name' => $name]);
        return redirect()->route('settings.index');
    }

    public function oplataEdit($id)
    {
        $data['item'] = Oplata::getById($id);
        return view('admin.settings.oplata.addOplata', $data);
    }

    public function oplataUpdate(Request $request, $id)
    {
        $name = $request->input('name');
        if (strlen($name) == 0) {
            Session::flash('error','Поле название не должно быть пустым');
            redirect()->route('settings.oplata');
        }
        Oplata::updateById([
            'name'  => $name,
            'id'    => $id
        ]);
        return redirect()->route('settings.index');
    }

    public function oplataDelete($id)
    {
        Oplata::deleteById($id);
        return redirect()->route('settings.index');
    }

    public function editSettings()
    {

        if (Session::has('errors')) {
            $session = Session::get('errors')->all("<h3 class='error'>:message</h3>");
        } else {
            $session = [];
        }

        $params = Session::get('_old_input', false);
        $settings = Setting::getFirst();
        return view('admin.settings.editSetting', [
            'settings'  =>  $settings,
            'session'   =>  $session,
            'field'     =>  $params
        ]);
    }

    public function saveSettings(StoreSettingsPostRequest $request)
    {
        $data = $request->except(['_token', 'baseimg']);
        if ($_FILES['baseimg']['name'] != '') {
            $file = $_FILES['baseimg'];
            $fileName = explode('.', $file['name']);
            $ext = '.' . $fileName[count($fileName) -1];
            $img = 'logo' . $ext;
            if(copy($file['tmp_name'], public_path('frontend/img/' . $img))) {
                $data['img'] = $img;
            }
        }
        Setting::updateSettings($data);
        return redirect()->route('settings.edit');
    }
}
