<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|unique:food,name,' . $this->food->id,
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
        ];

    }
}
