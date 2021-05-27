<?php

namespace App\Http\Components;

use Radio\Radio;
use PhpParser\Error;
use PhpParser\ParserFactory;

class AST
{
    use Radio;

    public ?string $source = <<<'PHP'
    <?php

    function hello() {
        echo 'Hello, world!';
    }

    hello();
    PHP;

    public $ast;

    public $error;

    public function generate()
    {
        $this->error = null;

        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

        try {
            $this->ast = $parser->parse($this->source);
        } catch (Error $e) {
            $this->error = sprintf('Failed to generate AST. %s', $e->getMessage());
        }
    }
}
