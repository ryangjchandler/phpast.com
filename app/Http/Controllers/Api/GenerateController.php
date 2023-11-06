<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use PhpParser\Error;
use PhpParser\ParserFactory;

class GenerateController
{
    public function __invoke(Request $request)
    {
        $code = $request->input('code');
        $parser = (new ParserFactory)->create(ParserFactory::ONLY_PHP7);

        try {
            return response()->json([
                'ast' => $parser->parse($code),
            ]);
        } catch (Error $e) {
            return response()->json([
                'ast' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }
}
