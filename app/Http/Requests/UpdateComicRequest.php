<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'thumb' => 'required',
            'price' => 'required|max:10',
            'series' => 'required|min:5',
            'sale_date' => 'required|date',
            'type' => 'required'
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Campo obbligatorio',
            'title.max' => 'Massimo 50 caratteri',
            'title.min' => 'Minimo 5 caratteri',
            'thumb.required' => 'Campo obbligatorio',
            'price.required' => 'Campo obbligatorio',
            'price.max' => 'Massimo 10 caratteri',
            'series.required' => 'Campo obbligatorio',
            'series.min' => 'Minimo 5 caratteri',
            'sale_date.required' => 'Campo obbligatorio',
            'sale_date.date' => 'Inserisci una data valida',
            'type.required' => 'Campo obbligatorio',
            
        ];
    }
}
