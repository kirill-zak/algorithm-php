<?php

namespace KirillZak\Algorithm\Graph\BreadthFirstSearch;

use KirillZak\Algorithm\Graph\BreadthFirstSearch\Graph\Employee;

interface BreadthFirstSearchInterface
{
    public function search(string $startName, string $needPosition): ?Employee;
}
