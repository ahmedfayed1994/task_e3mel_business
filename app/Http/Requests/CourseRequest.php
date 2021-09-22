<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:1024|dimensions:min_height=500 ',
            'rating' => 'integer|digits_between:1,5',
            'level' => Rule::in(['beginner', 'immediate', 'high']),
            'hours' => 'integer',
        ];
    }
}
