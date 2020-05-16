<?php

namespace App\Http\Requests;

use App\Traits\HasFunctionalAuth;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PublicationRequest
 * @package App\Http\Requests
 */
class PublicationRequest extends FormRequest
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
            'book.isbn' => 'required',
            'book.title' => 'required',
            'book.sub_title' => 'required',
            'book.promotional_title' => 'required',
            'book.price' => 'required',
            'book.description' => 'required',
            'book.category_id' => 'required|numeric|min:1'
        ];
    }
}
