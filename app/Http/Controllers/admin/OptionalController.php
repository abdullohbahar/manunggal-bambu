<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionalController extends Controller
{
    public function history()
    {
        $active = 'history';

        return view('admin.history.index', compact('active'));
    }
}
