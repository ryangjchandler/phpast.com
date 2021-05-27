<?php

namespace App\Http\Components;

use Radio\Radio;

class AST
{
    use Radio;

    public ?string $source;

    public $ast;

    public function __invoke($source = null)
    {
        $this->source = $source;
    }

    public function generate()
    {

    }
}
