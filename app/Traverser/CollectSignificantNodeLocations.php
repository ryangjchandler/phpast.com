<?php

namespace App\Traverser;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\NodeVisitorAbstract;

final class CollectSignificantNodeLocations extends NodeVisitorAbstract
{
    private array $significantNodeLocations = [];

    public function enterNode(Node $node)
    {
        if ($node instanceof Identifier | $node instanceof Name) {
            return;
        }

        $this->significantNodeLocations[] = [
            'type' => $node::class,
            'startPosition' => $node->getStartFilePos(),
            'endPosition' => $node->getEndFilePos(),
        ];
    }

    public function getSignificantNodeLocations(): array
    {
        return $this->significantNodeLocations;
    }
}
