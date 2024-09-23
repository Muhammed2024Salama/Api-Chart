<?php

namespace App\Interface;

use Illuminate\Database\Eloquent\Collection;

interface ChartInterface
{
    /**
     * Get all charts.
     *
     * @return Collection
     */
    public function getAllCharts(): Collection;

    /**
     * Store multiple charts.
     *
     * @param array $chartsData
     * @return Collection
     */
    public function storeCharts(array $chartsData): Collection;
}
