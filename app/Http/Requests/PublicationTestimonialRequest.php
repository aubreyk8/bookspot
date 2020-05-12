<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationTestimonialRequest extends FormRequest
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
            'testimonial.id' => 'nullable|numeric',
            'testimonial.names' => 'required|string|max:100',
            'testimonial.job_title' => 'required|string|max:100',
            'testimonial.message' => 'required|string|max:220',
            'testimonial.book_id' => 'required|numeric|min:1'
        ];
    }
}
