<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MetricsController extends Controller
{
    public function index()
    {
        $data = \App\Models\Metrics::getAll();
        return view('admin.metrics.index', ['items' => $data]);
    }

    public function add()
    {
        $data = [
            'empty' => false,
            'name' => '',
            'code' => ''
        ];
        return view('admin.metrics.add', $data);
    }

    public function save(Request $request)
    {

        $data['name'] = $request->input('name');
        $data['code'] = $request->input('code');
        $data['status'] = $request->input('status');

        if ($data['name'] == '' || $data['code'] == '') {
            $data['empty'] = true;
            return view('admin.metrics.add', $data);
        }

        \App\Models\Metrics::create($data);
        return $this->index();

    }

    public function status($id, $status)
    {
        $data['status'] = ($status) ? 0 : 1;
        \App\Models\Metrics::editStatus($id, $data);
        return $this->index();
    }

    public function delete($id)
    {
        \App\Models\Metrics::dell($id);
        return $this->index();
    }
}
