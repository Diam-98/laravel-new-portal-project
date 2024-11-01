<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => ['string', 'required', 'max:255'],
            'description' => ['string', 'required'],
            'image' => ['image', 'nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'isComment' => ['required'],
            'isSharable' => ['required'],
            'isActive' => ['required'],
            'category_id' => ['required'],
            'tags' => ['string', 'nullable']
        ];
    }
}
