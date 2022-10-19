<?php

namespace KirillZak\Algorithm\Search\BinarySearch;

interface BinarySearchInterface
{
    public function search(mixed $searchedItem): ?int;

    public function getIterationCount(): int;
}
