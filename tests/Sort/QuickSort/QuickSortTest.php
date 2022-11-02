<?php

namespace KirillZak\Algorithm\Tests\Sort\QuickSort;

use KirillZak\Algorithm\Sort\QuickSort\QuickSort;
use KirillZak\Algorithm\Sort\QuickSort\QuickSortInterface;
use PHPUnit\Framework\TestCase;

final class QuickSortTest extends TestCase
{
    private const ITEM_LIST_SIZE = 34;

    public function testSort(): void
    {
        $quickSort = $this->createQuickSort();

        $itemList = $this->createItemList();

        $result = $quickSort->sort($itemList);

        $this->assertEquals($this->createExpectedResult($itemList), $result);
    }

    private function createQuickSort(): QuickSortInterface
    {
        return new QuickSort();
    }

    /**
     * @return list<int>
     */
    private function createItemList(): array
    {
        $result = [];

        while (count($result) < self::ITEM_LIST_SIZE) {
            $item = mt_rand();

            if (!in_array($item, $result, true)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * @param list<int> $itemList
     * @return list<int>
     */
    private function createExpectedResult(array $itemList): array
    {
        sort($itemList);

        return $itemList;
    }
}
