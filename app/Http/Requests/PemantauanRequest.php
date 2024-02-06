<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PemantauanRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     */public function authorize(): bool
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
            'pemantauan_id' => 'required|string',
            'video' => 'required|mimetypes:video/mp4|max:10240', // Assuming a max size of 10MB
            'description' => 'required|string',
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
