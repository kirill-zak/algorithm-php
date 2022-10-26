<?php

namespace KirillZak\Algorithm\Tests\Sort\SelectionSort;

use KirillZak\Algorithm\Sort\SelectionSort\SelectionSort;
use KirillZak\Algorithm\Sort\SelectionSort\SelectionSortInterface;
use PHPUnit\Framework\TestCase;

final class SelectionSortTest extends TestCase
{
    private const ITEM_LIST_SIZE = 26;

    /**
     * @var list<int>
     */
    private array $itemList = [];

    public function testSort(): void
    {
        $sort = $this->createSort();

        $this->createItemList();

        $result = $sort->sort($this->itemList);

        $this->assertEquals($this->createExpectedResult(), $result);
    }

    private function createSort(): SelectionSortInterface
    {
        return new SelectionSort();
    }

    private function createItemList(): void
    {
        while (count($this->itemList) < self::ITEM_LIST_SIZE) {
            $value = mt_rand();

            if (!in_array($value, $this->itemList, true)) {
                $this->itemList[] = $value;
            }
        }
    }

    /**
     * @return list<int>
     */
    private function createExpectedResult(): array
    {
        $result = [];

        foreach ($this->itemList as $key => $value) {
            $result[$key] = $value;
        }

        sort($result);

        return $result;
    }
}
