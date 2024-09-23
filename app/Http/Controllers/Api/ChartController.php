<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChartRequest;
use App\Http\Resources\ChartResource;
use App\Interface\ChartInterface;
use Illuminate\Http\JsonResponse;

class ChartController extends Controller
{
    protected $chartRepository;

    public function __construct(ChartInterface $chartRepository)
    {
        $this->chartRepository = $chartRepository;
    }

    /**
     * Get all charts.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $charts = $this->chartRepository->getAllCharts();
        $chartResources = ChartResource::collection($charts);

        return ResponseHelper::success('success', 'Charts retrieved successfully!', $chartResources);
    }

    /**
     * Store multiple charts.
     *
     * @param StoreChartRequest $request
     * @return JsonResponse
     */
    public function store(StoreChartRequest $request): JsonResponse
    {
        $chartsData = $request->input('charts');

        // Check if there is chart data to store
        if (empty($chartsData)) {
            return ResponseHelper::error('error', 'No chart data provided.', 422);
        }

        $charts = $this->chartRepository->storeCharts($chartsData);
        $chartResources = ChartResource::collection($charts);

        return ResponseHelper::success('success', 'Charts created successfully!', $chartResources, 201);
    }
}
