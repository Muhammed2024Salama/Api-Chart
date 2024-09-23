<?php

namespace App\Repository;

use App\Interface\ChartInterface;
use App\Models\Chart;

class ChartRepository implements ChartInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Chart::all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return Chart::create($data);
    }
}
