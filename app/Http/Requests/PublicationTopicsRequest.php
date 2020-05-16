<?php

namespace App\Http\Requests;

use App\Traits\HasFunctionalAuth;
use Illuminate\Foundation\Http\FormRequest;

class PublicationTopicsRequest extends FormRequest
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
            'topic.topic' => 'required',
            'topic.brief_description' => 'required',
            'topic.book_id' => 'required',
        ];
    }
}
