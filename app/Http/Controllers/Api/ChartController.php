<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChartRequest;
use App\Http\Resources\ChartResource;
use App\Interface\ChartInterface;

class ChartController extends Controller
{
    /**
     * @var ChartInterface
     */
    protected $chartRepository;

    /**
     * @param ChartInterface $chartRepository
     */
    public function __construct(ChartInterface $chartRepository)
    {
        $this->chartRepository = $chartRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $charts = $this->chartRepository->all();

        return ResponseHelper::success('success', 'Charts retrieved successfully!', ChartResource::collection($charts));
    }

    /**
     * @param StoreChartRequest $request
     * @return mixed
     */
    public function store(StoreChartRequest $request)
    {
        $chart = $this->chartRepository->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type_chart' => $request->input('type_chart'),
            'chart_data' => json_encode($request->input('chart_data')),
        ]);

        return ResponseHelper::success('success', 'Chart created successfully!', new ChartResource($chart), 201);
    }
}
