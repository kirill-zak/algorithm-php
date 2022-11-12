<?php

declare(strict_types=1);

namespace KirillZak\Algorithm\Graph\BreadthFirstSearch\Graph;

final class Employee
{
    public function __construct(public readonly string $name, public readonly string $position)
    {
    }
}
