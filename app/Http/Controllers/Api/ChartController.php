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
     * Display a listing of the charts.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->chartRepository->index();
    }

    /**
     * Store a newly created chart.
     *
     * @param StoreChartRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreChartRequest $request)
    {
        return $this->chartRepository->store($request->validated());
    }
}
