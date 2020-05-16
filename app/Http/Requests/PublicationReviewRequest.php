<?php

namespace App\Http\Requests;

use App\Traits\HasFunctionalAuth;
use Illuminate\Foundation\Http\FormRequest;

class PublicationReviewRequest extends FormRequest
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
            'reviewer.image' => 'required',
            'reviewer.names' => 'required',
            'reviewer.job_title' => 'required',
            'reviewer.facebook' => 'string|nullable',
            'reviewer.twitter' => 'string|nullable',
            'reviewer.message' => 'required|string|max:900',
            'reviewer.book_id' => 'required|numeric'
        ];
    }
}
