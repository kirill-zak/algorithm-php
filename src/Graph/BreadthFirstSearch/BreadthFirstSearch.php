<?php

declare(strict_types=1);

namespace KirillZak\Algorithm\Graph\BreadthFirstSearch;

use KirillZak\Algorithm\Graph\BreadthFirstSearch\Graph\Employee;
use SplQueue;

final class BreadthFirstSearch implements BreadthFirstSearchInterface
{
    /**
     * @param array<string, list<Employee>> $employeeGraph
     */
    public function __construct(private readonly array $employeeGraph)
    {
    }

    public function search(string $startName, string $needPosition): ?Employee
    {
        $queue = new SplQueue();
        $alreadySearched = [];

        $this->addGraphNodeIntoQueue($this->employeeGraph[$startName], $queue);

        foreach ($queue as $employee) {
            /** @var Employee $employee */

            if (!isset($alreadySearched[$employee->name])) {
                if ($employee->position === $needPosition) {
                    return $employee;
                }

                $this->addGraphNodeIntoQueue($this->employeeGraph[$employee->name], $queue);

                $alreadySearched[$employee->name] = true;
            }
        }

        return null;
    }

    /**
     * @param list<Employee> $mode
     */
    private function addGraphNodeIntoQueue(array $mode, SplQueue $queue): void
    {
        foreach ($mode as $employee) {
            $queue->enqueue($employee);
        }
    }
}
