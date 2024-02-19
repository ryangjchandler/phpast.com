<?php

namespace App\Http\Controllers\Api;

use App\Traverser\CollectSignificantNodeLocations;
use Illuminate\Http\Request;
use PhpParser\Error;
use PhpParser\Lexer\Emulative;
use PhpParser\NodeTraverser;
use PhpParser\Parser\Php8;
use PhpParser\PhpVersion;

class GenerateController
{
    public function __invoke(Request $request)
    {
        $code = $request->input('code');
        $lexer = new Emulative(PhpVersion::getNewestSupported());
        $parser = new Php8($lexer, PhpVersion::getNewestSupported());

        $ast = $parser->parse($code);

        $traverser = new NodeTraverser($collector = new CollectSignificantNodeLocations());
        $traverser->traverse($ast);

        try {
            return response()->json([
                'ast' => $ast,
                'significantNodeLocations' => $collector->getSignificantNodeLocations(),
            ]);
        } catch (Error $e) {
            return response()->json([
                'ast' => [],
                'significantNodeLocations' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }
}
