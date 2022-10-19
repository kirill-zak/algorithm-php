<?php

namespace KirillZak\Algorithm\Search\LinearSearch;

interface LinearSearchInterface
{
    public function search(mixed $searchedItem): ?int;

    public function getIterationCount(): int;
}
