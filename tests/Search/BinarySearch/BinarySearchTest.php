<?php

namespace KirillZak\Algorithm\Tests\Search\BinarySearch;

use Exception;
use KirillZak\Algorithm\Search\BinarySearch\BinarySearch;
use KirillZak\Algorithm\Search\BinarySearch\BinarySearchInterface;
use PHPUnit\Framework\TestCase;

final class BinarySearchTest extends TestCase
{
    private const ITEM_LIST_SIZE = 100;
    private const ITEM_LIST_SIZE_FOR_INTERACTION_COUNT_100_ELEMENTS = 100;
    private const ITEM_LIST_SIZE_FOR_INTERACTION_COUNT_240000_ELEMENTS = 240000;
    private const ITERATION_COUNT_FOR_EMPTY_LIST = 0;
    private const ITERATION_COUNT_FOR_LIST_WITH_100_ELEMENTS = 6;
    private const ITERATION_COUNT_FOR_LIST_WITH_240000_ELEMENTS = 17;
    private const SEARCHED_ITEM = 68498;
    private const SEARCHED_ITEM_FOR_INTERACTION_COUNT = 57;
    private const SEARCHED_ITEM_POSITION = 74;

    /**
     * @dataProvider searchDataProvider
     *
     * @param list<int> $itemList
     * @param int|null $expectedResult
     * @return void
     */
    public function testSearch(array $itemList, ?int $expectedResult): void
    {
        $binarySearch = $this->createBinarySearch($itemList);

        $result = $binarySearch->search(self::SEARCHED_ITEM);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return array<string, array{itemList: list<int>, expectedResult: ?int}>
     * @throws Exception
     */
    public function searchDataProvider(): array
    {
        return
            [
                'Empty item list' =>
                    [
                        'itemList' => [],
                        'expectedResult' => null,
                    ],
                'Item found' =>
                    [
                        'itemList' => $this->createItemListWithSearchedItem(),
                        'expectedResult' => self::SEARCHED_ITEM_POSITION,
                    ],
                'Item not found' =>
                    [
                        'itemList' => $this->createItemListWithoutSearchedItem(),
                        'expectedResult' => null,
                    ],
            ];
    }

    /**
     * @dataProvider getIterationCountDataProvider
     *
     * @param list<int> $itemList
     * @param int $expectedResult
     * @return void
     */
    public function testGetIterationCount(array $itemList, int $expectedResult): void
    {
        $binarySearch = $this->createBinarySearch($itemList);

        $binarySearch->search(self::SEARCHED_ITEM_FOR_INTERACTION_COUNT);

        $result = $binarySearch->getIterationCount();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return array<string, array{itemList: list<int>, expectedResult: int}>
     */
    public function getIterationCountDataProvider(): array
    {
        return
            [
                'Empty item list' =>
                    [
                        'itemList' => [],
                        'expectedResult' => self::ITERATION_COUNT_FOR_EMPTY_LIST,
                    ],
                'Item list with 100 elements' =>
                    [
                        'itemList' => $this->createItemListForGetInteractionCount(self::ITEM_LIST_SIZE_FOR_INTERACTION_COUNT_100_ELEMENTS),
                        'expectedResult' => self::ITERATION_COUNT_FOR_LIST_WITH_100_ELEMENTS,
                    ],
                'Item list with 240000 elements' =>
                    [
                        'itemList' => $this->createItemListForGetInteractionCount(self::ITEM_LIST_SIZE_FOR_INTERACTION_COUNT_240000_ELEMENTS),
                        'expectedResult' => self::ITERATION_COUNT_FOR_LIST_WITH_240000_ELEMENTS,
                    ],
            ];
    }

    /**
     * @param list<int> $itemList
     */
    private function createBinarySearch(array $itemList): BinarySearchInterface
    {
        return new BinarySearch($itemList);
    }

    /**
     * @return list<int>
     * @throws Exception
     */
    private function createItemListWithSearchedItem(): array
    {
        return
            array_merge(
                $this->fillItemListBeforeSearchedValues(),
                [self::SEARCHED_ITEM_POSITION => self::SEARCHED_ITEM],
                $this->fillItemListAfterSearchedValue(),
            );
    }

    /**
     * @return list<int>
     * @throws Exception
     */
    private function fillItemListBeforeSearchedValues(): array
    {
        $itemList = [];

        while (count($itemList) < self::SEARCHED_ITEM_POSITION) {
            $item = random_int(0, self::SEARCHED_ITEM - 1);

            if (!in_array($item, $itemList, true)) {
                $itemList[] = $item;
            }
        }

        sort($itemList);

        return array_values($itemList);
    }

    /**
     * @return list<int>
     * @throws Exception
     */
    private function fillItemListAfterSearchedValue(): array
    {
        $itemList = [];

        while (count($itemList) < (self::ITEM_LIST_SIZE - self::SEARCHED_ITEM_POSITION)) {
            $item = random_int(self::SEARCHED_ITEM + 1, 10000000000);

            if (!in_array($item, $itemList, true)) {
                $itemList[] = $item;
            }
        }

        sort($itemList);

        return array_values($itemList);
    }

    /**
     * @return list<int>
     */
    private function createItemListWithoutSearchedItem(): array
    {
        $itemList = [];

        while (count($itemList) < self::ITEM_LIST_SIZE) {
            $item = mt_rand();

            if ($this->isAddItemToItemList($item, $itemList)) {
                $itemList[] = $item;
            }
        }

        sort($itemList);

        return array_values($itemList);
    }

    /**
     * @param list<int> $itemList
     */
    private function isAddItemToItemList(int $item, array $itemList): bool
    {
        return
            $item !== self::SEARCHED_ITEM
                &&
            !in_array($item, $itemList, true);
    }

    /**
     * @return list<int>
     */
    private function createItemListForGetInteractionCount(int $itemListSize): array
    {
        return range(0, $itemListSize);
    }
}
