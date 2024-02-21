<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50|min:5',
            'description' => 'nullable',
            'thumb' => 'reqiured',
            'price' => 'reuired'|'max:10',
            'series' => 'required'|'min:5',
            'sale_date' => 'required'|'date',
            'type' => 'required'
        ];
    }
}
