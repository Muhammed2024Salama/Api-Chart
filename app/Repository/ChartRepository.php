<?php

namespace App\Repository;

use App\Http\Resources\ChartResource;
use App\Interface\ChartInterface;
use App\Models\Chart;
use Illuminate\Database\Eloquent\Collection;

class ChartRepository implements ChartInterface
{
    /**
     * Get all charts.
     *
     * @return Collection
     */
    public function getAllCharts(): Collection
    {
        return Chart::all();
    }

    /**
     * Store multiple charts.
     *
     * @param array $chartsData
     * @return Collection
     */
    public function storeCharts(array $chartsData): Collection
    {
        $charts = new Collection();

        foreach ($chartsData as $data) {
            $chart = Chart::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'type_chart' => $data['type_chart'],
                // Storing categories and series in separate columns
                'category' => json_encode($data['chart_data']['categories']),
                'series' => json_encode($data['chart_data']['series']),
            ]);
            $charts->push($chart);
        }

        return $charts;
    }
}
