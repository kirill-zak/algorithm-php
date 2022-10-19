<?php

namespace KirillZak\Algorithm\Tests\Search\LinearSearch;

use Exception;
use KirillZak\Algorithm\Search\LinearSearch\LinearSearch;
use KirillZak\Algorithm\Search\LinearSearch\LinearSearchInterface;
use PHPUnit\Framework\TestCase;

final class LinearSearchTest extends TestCase
{
    private const GET_ITERATION_COUNT_SIZE = 80;
    private const SEARCH_ITEM_EMPTY_LIST = [];
    private const SEARCH_ITEM_LIST = [64, 5, 84, 62, 34, 74];
    private const SEARCH_ITEM = 84;
    private const SEARCH_ITEM_NOT_FOUND = 39;
    private const SEARCH_ITEM_EXPECTED_RESULT = 2;

    /**
     * @throws Exception
     */
    public function testGetIterationCount(): void
    {
        [$itemList, $searchedItem, $expectedResult] = $this->createGetIterationCountData();

        $searcher = $this->createLinearSearch($itemList);

        $searcher->search($searchedItem);

        $result = $searcher->getIterationCount();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider searchDataProvider
     *
     * @param list<int> $itemList
     */
    public function testSearch(array $itemList, int $searchedItem, int $expectedResult = null): void
    {
        $searcher = $this->createLinearSearch($itemList);

        $result = $searcher->search($searchedItem);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return array<string, array{itemList: list<int>, searchedItem: int, expectedResult: ?int}>
     */
    public function searchDataProvider(): array
    {
        return
            [
                'Empty list' =>
                    [
                        'itemList' => self::SEARCH_ITEM_EMPTY_LIST,
                        'searchedItem' => self::SEARCH_ITEM,
                        'expectedResult' => null,
                    ],
                'Found searched item' =>
                    [
                        'itemList' => self::SEARCH_ITEM_LIST,
                        'searchedItem' => self::SEARCH_ITEM,
                        'expectedResult' => self::SEARCH_ITEM_EXPECTED_RESULT,
                    ],
                'Not found searched item' =>
                    [
                        'itemList' => self::SEARCH_ITEM_LIST,
                        'searchedItem' => self::SEARCH_ITEM_NOT_FOUND,
                        'expectedResult' => null,
                    ],
            ];
    }

    /**
     * @param list<int> $itemList
     */
    private function createLinearSearch(array $itemList): LinearSearchInterface
    {
        return new LinearSearch($itemList);
    }

    /**
     * @return array{list<int>, int, int}
     * @throws Exception
     */
    private function createGetIterationCountData(): array
    {
        $itemList = [];

        for ($i = 1; $i <= self::GET_ITERATION_COUNT_SIZE; $i++) {
            $itemList[$i] = mt_rand();
        }

        $expectedResult = random_int(self::GET_ITERATION_COUNT_SIZE / 2, self::GET_ITERATION_COUNT_SIZE);

        return
            [
                $itemList,
                $itemList[$expectedResult],
                $expectedResult,
            ];
    }
}
