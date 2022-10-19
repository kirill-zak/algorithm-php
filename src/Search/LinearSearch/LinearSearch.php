<?php

declare(strict_types=1);

namespace KirillZak\Algorithm\Search\LinearSearch;

final class LinearSearch implements LinearSearchInterface
{
    /**
     * @var list<mixed>
     */
    private array $itemList;

    private int $iterationCount = 0;

    /**
     * @param list<mixed> $itemList
     */
    public function __construct(array $itemList)
    {
        $this->itemList = $itemList;
    }

    public function search(mixed $searchedItem): ?int
    {
        foreach ($this->itemList as $index => $value) {
            $this->iterationCount++;

            if ($value === $searchedItem) {
                return $index;
            }
        }

        return null;
    }

    public function getIterationCount(): int
    {
        return $this->iterationCount;
    }
}
