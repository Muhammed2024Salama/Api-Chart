<?php

namespace App\Interface;

interface ChartInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);
}
