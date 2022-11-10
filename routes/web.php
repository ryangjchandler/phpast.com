<?php

use Illuminate\Http\Request;
use PhpParser\ParserFactory;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', [
    'source' => <<<'PHP'
    <?php

    function hello() {
        echo 'Hello, world!';
    }

    hello();
    PHP,
])->name('home');

Route::post('/ast', function (Request $request) {
    $request->validate([
        'code' => ['required', 'string'],
    ]);

    $code = $request->input('code');
    $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

    return $parser->parse($code);
});
