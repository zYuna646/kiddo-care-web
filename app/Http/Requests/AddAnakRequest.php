<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddAnakRequest extends FormRequest
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
            'name' => ['required', 'max:100'],
            'nik' => ['required', 'max:100'],
            'jenis_kelamin' => ['required', 'max:100'],
            'tanggal_lahir' => ['required', 'date_format:Y-m-d'],
            'berat' => ['required', 'max:100'],
            'tinggi' => ['required', 'max:100'],
            'isMenyusui' => ['required', 'boolean'],
            'isBuku' => ['required', 'boolean'],

            'masyarakat_id' => ['required', 'max:100'],
            'puskesmas_id' => ['required', 'max:100'],
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], 400));
    }
}
