<?php

namespace KirillZak\Algorithm\Sort\SelectionSort;

interface SelectionSortInterface
{
    /**
     * @param list<int> $itemList
     * @return list<int>
     */
    public function sort(array $itemList): array;
}
