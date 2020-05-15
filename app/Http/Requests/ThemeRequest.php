<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest
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
            'theme.id' => 'required|numeric|min:1',
            'theme.primary_color' => 'required|string|max:6',
            'theme.secondary_color' => 'required|string|max:6',
            'theme.icon_color' => 'required|string|max:6',
            'theme.cover_image_height' => 'required|numeric|min:50',
            'theme.secondary_image_height' => 'required|numeric|min:50',
            'theme.font_color' => 'required|string|max:6'
        ];
    }
}
