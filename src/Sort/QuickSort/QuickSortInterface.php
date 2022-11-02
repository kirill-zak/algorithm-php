<?php

namespace KirillZak\Algorithm\Sort\QuickSort;

interface QuickSortInterface
{
    /**
     * @param list<int> $itemList
     * @return list<int>
     */
    public function sort(array $itemList): array;
}
