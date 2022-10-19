<?php

declare(strict_types=1);

namespace KirillZak\Algorithm\Search\BinarySearch;

final class BinarySearch implements BinarySearchInterface
{
    /**
     * @var list<mixed>
     */
    private array $itemList;

    private int $low = 0;

    private int $high;

    private int $iterationCount = 0;

    /**
     * @param list<mixed> $itemList
     */
    public function __construct(array $itemList)
    {
        $this->itemList = $itemList;
        $this->high = count($itemList);
    }

    public function search(mixed $searchedItem): ?int
    {
        if (count($this->itemList) === 0) {
            return null;
        }

        while ($this->low <= $this->high) {
            $this->iterationCount++;

            $iterationResult = $this->performIteration($searchedItem);
            if ($iterationResult !== null) {
                return $iterationResult;
            }
        }

        return null;
    }

    public function getIterationCount(): int
    {
        return $this->iterationCount;
    }

    private function performIteration(mixed $searchedItem): ?int
    {
        $middle = (int) ceil(($this->low + $this->high) / 2);
        $middleValue = $this->itemList[$middle];

        if ($middleValue === $searchedItem) {
            return $middle;
        }

        if ($middleValue > $searchedItem) {
            $this->high = $middle - 1;
        } else {
            $this->low = $middle + 1;
        }

        return null;
    }
}
