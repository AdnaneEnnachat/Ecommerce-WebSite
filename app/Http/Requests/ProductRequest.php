<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
                'name' => ['string', 'max:50','required'],
                'category' => ['required','string'],
                'quantite' => ['integer','required'],
                'description'=>['required','string'],
                'prix'=>['regex:/^\d*(\.\d{2})?$/','required'],
                'image'=>['required','mimes:jpeg,png,jpg,webp']
        ];
    }
        public function messages()
    {
        return [
            'name.required' => 'Please enter name of product',
            'name.string' => 'name of product must be a string',
            'category.required' => 'Please select the category of product',
            'category.string' => 'category of product must be a string',
            'quantite.required' => 'Please enter quantite of product',
            'quantite.integer' => 'quantite of product must be a number',
            'description.min'=>'Description must be at least 30 characters long',
            'description.required'=>'Please enter the description of product',
            'prix.regex'=>'',
            'prix.required'=>'please enter the price of product',
            'image.required'=>'please entre the image of product',
            'image.mimes'=>'the file most be an image jpeg,png,jpg'


        ];
    }

}
