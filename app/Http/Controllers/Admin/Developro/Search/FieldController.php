<?php

namespace App\Http\Controllers\Admin\Developro\Search;

use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    public function index()
    {
        return view('admin.developro.search.fields');
    }

}
