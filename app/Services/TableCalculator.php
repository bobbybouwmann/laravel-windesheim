<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TableCalculator
{
    public function calculateForPersons($count): Collection
    {
        $collection = collect(array_fill(0, $count, 1));

        switch ($collection->count() % 4) {
            case 1:
                return $this->calculateForOnePersonLeftOver($collection);
                break;
            case 2:
                return $this->calculateForTwoPersonsLeftOver($collection);
                break;
            default:
                return $collection->chunk(4);
        }
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    private function calculateForOnePersonLeftOver(Collection $collection): Collection
    {
        $customTablesCount = $collection->count() - 9;
        $normalUsers = $collection->slice(0, $customTablesCount);
        $customTableUsers = $collection->slice($customTablesCount);

        $tablesWith4Users = $normalUsers->chunk(4);
        $tablesWith3Users = $customTableUsers->chunk(3);

        return $tablesWith3Users->merge($tablesWith4Users);
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    private function calculateForTwoPersonsLeftOver(Collection $collection): Collection
    {
        $customTablesCount = $collection->count() - 6;
        $normalUsers = $collection->slice(0, $customTablesCount);
        $customTableUsers = $collection->slice($customTablesCount);

        $tablesWith4Users = $normalUsers->chunk(4);
        $tablesWith3Users = $customTableUsers->chunk(3);

        return $tablesWith3Users->merge($tablesWith4Users);
    }
}
