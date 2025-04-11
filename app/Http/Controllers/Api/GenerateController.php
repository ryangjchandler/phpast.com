<?php

namespace App\Http\Controllers\Api;

use App\Enums\PhpVersion;
use App\Traverser\CollectSignificantNodeLocations;
use Illuminate\Http\Request;
use PhpParser\Error;
use PhpParser\NodeTraverser;

class GenerateController
{
    public function __invoke(Request $request)
    {
        $code = $request->input('code');
        $version = $request->enum('version', PhpVersion::class);

        $parser = $version->toPhpParser();

        try {
            $ast = $parser->parse($code);

            $traverser = new NodeTraverser($collector = new CollectSignificantNodeLocations());
            $traverser->traverse($ast);

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
