<?php

namespace App\Repository;

use App\Http\Resources\ChartResource;
use App\Interface\ChartInterface;
use App\Models\Chart;

class ChartRepository implements ChartInterface
{
    /**
     * Retrieve all charts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Chart::all();
    }

    /**
     * Create a new chart.
     *
     * @param array $data
     * @return Chart
     */
    public function create(array $data)
    {
        return Chart::create($data);
    }

    /**
     * Handle index request logic.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $charts = $this->all();
        return response()->json([
            'status' => 'success',
            'message' => 'Charts retrieved successfully!',
            'data' => ChartResource::collection($charts),
        ]);
    }

    /**
     * Handle store request logic.
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(array $data)
    {
        $charts = [];
        foreach ($data as $chartData) {
            $charts[] = $this->create([
                'title' => $chartData['title'],
                'description' => $chartData['description'],
                'type_chart' => $chartData['type_chart'],
                'chart_data' => json_encode($chartData['chart_data']),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Charts created successfully!',
            'data' => ChartResource::collection($charts),
        ], 201);
    }
}
