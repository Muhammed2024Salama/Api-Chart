<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'type_chart',
        'chart_data',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'chart_data' => 'array',
    ];
}
