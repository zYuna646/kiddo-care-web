<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class updateLog extends FormRequest
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
            'log_id' => ['required', 'max:100'],
            'status' => ['required', 'max:100'], // Example rule for video field: required, must be a file with mp4 extension, maximum size of 50MB
            'comment' => ['required', 'max:100'], // Example rule for description field: required, must be a string
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 401));
    }
}
