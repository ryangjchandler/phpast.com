<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController
{
    public function __invoke(Request $request)
    {
        return view('index');
    }
}
