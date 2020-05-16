<?php

namespace App\Http\Requests;

use App\Traits\HasFunctionalAuth;
use Illuminate\Foundation\Http\FormRequest;

class PublicationTestimonialRequest extends FormRequest
{
    use HasFunctionalAuth;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->hasPermission('publication-edit');
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
            'testimonial.message' => 'required|string|max:900',
            'testimonial.book_id' => 'required|numeric|min:1'
        ];
    }
}
