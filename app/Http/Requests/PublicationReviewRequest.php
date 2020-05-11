<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationReviewRequest extends FormRequest
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
            'reviewer.image' => 'required',
            'reviewer.names' => 'required',
            'reviewer.job_title' => 'required',
            'reviewer.facebook' => 'string|nullable',
            'reviewer.twitter' => 'string|nullable',
            'reviewer.message' => 'required',
            'reviewer.book_id' => 'required'
        ];
    }
}
