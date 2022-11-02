<?php

declare(strict_types=1);

namespace KirillZak\Algorithm\Sort\QuickSort;

final class QuickSort implements QuickSortInterface
{
    /**
     * @param list<int> $itemList
     * @return list<int>
     */
    public function sort(array $itemList): array
    {
        $this->quickSort(0, count($itemList) - 1, $itemList);

        return $itemList;
    }

    /**
     * @param list<int> $list
     */
    private function quickSort(int $low, int $high, array &$list): void
    {
        if ($low < $high) {
            $partitionIndex = $this->partition($low, $high, $list);

            $this->quickSort($low, $partitionIndex - 1, $list);
            $this->quickSort($partitionIndex + 1, $high, $list);
        }
    }

    /**
     * @param list<int> $list
     */
    private function partition(int $low, int $high, array &$list): int
    {
        $pivot = $list[$high];

        $i = ($low - 1);

        for ($j = $low; $j <= $high - 1; $j++) {
            if ($list[$j] < $pivot) {
                $i++;
                $this->swapListItems($i, $j, $list);
            }
        }

        $this->swapListItems($i + 1, $high, $list);

        return $i + 1;
    }

    /**
     * @param list<int> $list
     */
    private function swapListItems(int $i, int $j, array &$list): void
    {
        $tempValue = $list[$i];
        $list[$i] = $list[$j];
        $list[$j] = $tempValue;
    }
}
