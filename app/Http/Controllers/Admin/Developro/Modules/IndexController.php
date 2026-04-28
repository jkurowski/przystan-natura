<?php

namespace App\Http\Controllers\Admin\Developro\Modules;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.developro.modules.index');
    }
}
