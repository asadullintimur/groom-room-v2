<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderStatusRequest extends FormRequest
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
            "new_status" => ["required", Rule::in("new", "processing", "processed")],
            "photo" => ["exclude_unless:new_status,processed", "required", "mimes:jpeg,bmp", "max:2048"]
        ];
    }
}
