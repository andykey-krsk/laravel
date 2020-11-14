<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertNewsRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'short_text' => ['string'],
            'full_text' => ['string'],
            'photo' => ['nullable', 'url'],
            'category_id' => ['exists:categories,id'],
            'source_id' => ['exists:sources,id'],
        ];
    }
}
