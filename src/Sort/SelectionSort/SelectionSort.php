<?php

declare(strict_types=1);

namespace KirillZak\Algorithm\Sort\SelectionSort;

final class SelectionSort implements SelectionSortInterface
{
    /**
     * @param list<int> $itemList
     * @return list<int>
     */
    public function sort(array $itemList): array
    {
        foreach ($itemList as $i => $value) {
            $minimalIndex = $i;

            for ($j = $i + 1, $jMax = count($itemList); $j < $jMax; $j++) {
                if ($itemList[$minimalIndex] > $itemList[$j]) {
                    $minimalIndex = $j;
                }
            }

            if ($itemList[$minimalIndex] !== $itemList[$i]) {
                $tempValue = $itemList[$i];
                $itemList[$i] = $itemList[$minimalIndex];
                $itemList[$minimalIndex] = $tempValue;
            }
        }

        return $itemList;
    }
}
