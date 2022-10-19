<?php

namespace KirillZak\Algorithm\Search\BinarySearch;

interface BinarySearchInterface
{
    /**
     * @param mixed $searchedItem
     * @return int|null
     */
    public function search(mixed $searchedItem): ?int;

    public function getIterationCount(): int;
}
