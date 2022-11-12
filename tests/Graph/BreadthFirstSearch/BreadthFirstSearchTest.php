<?php

namespace KirillZak\Algorithm\Tests\Graph\BreadthFirstSearch;

use KirillZak\Algorithm\Graph\BreadthFirstSearch\BreadthFirstSearch;
use KirillZak\Algorithm\Graph\BreadthFirstSearch\Graph\Employee;
use PHPUnit\Framework\TestCase;

final class BreadthFirstSearchTest extends TestCase
{
    private const POSITION_RECRUITER = 'recruiter';

    private const START_NAME = 'start';

    public function testSearch(): void
    {
        $breadthFirstSearch = $this->createBreadthFirstSearch();

        $result = $breadthFirstSearch->search(self::START_NAME, self::POSITION_RECRUITER);

        $this->assertEquals($this->createExpectedResult(), $result);
    }

    private function createBreadthFirstSearch(): BreadthFirstSearch
    {
        return new BreadthFirstSearch($this->createEmployeeGraph());
    }

    /**
     * @return array<string, list<Employee>>
     */
    private function createEmployeeGraph(): array
    {
        return
            [
                'start' =>
                    [
                        new Employee('alice', 'manager'),
                        new Employee('bob', 'manager'),
                        new Employee('claire', 'manager'),
                    ],
                'alice' =>
                    [
                        new Employee('peggy', 'manager'),
                    ],
                'bob' =>
                    [
                        new Employee('anuj', 'recruiter'),
                        new Employee('peggy', 'manager'),
                    ],
                'claire' =>
                    [
                        new Employee('thom', 'manager'),
                        new Employee('jonny', 'manager'),
                    ],
                'anuj' => [],
                'peggy' => [],
                'thom' => [],
                'jonny' => [],
            ];
    }

    private function createExpectedResult(): Employee
    {
        return new Employee('anuj', 'recruiter');
    }
}
