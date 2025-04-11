<?php

namespace App\Http\Controllers;

use App\Enums\PhpVersion;
use Illuminate\Http\Request;

class IndexController
{
    public function __invoke(Request $request)
    {
        return view('index', [
            'phpVersions' => PhpVersion::toOptions(),
        ]);
    }
}
