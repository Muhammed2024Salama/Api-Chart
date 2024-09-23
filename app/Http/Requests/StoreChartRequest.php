<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'charts' => 'required|array',
            'charts.*.title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('charts'),
            ],
            'charts.*.description' => 'nullable|string',
            'charts.*.type_chart' => 'required|string',
        ];
    }
}
