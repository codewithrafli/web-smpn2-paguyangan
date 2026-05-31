<?php

namespace App\Http\Requests\Web\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreGraduationRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'test_number' => 'required|string',
            'status' => 'required|string|in:passed,failed',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'skl_file' => 'nullable|file|mimes:pdf|max:5120',
            'skn_file' => 'nullable|file|mimes:pdf|max:5120',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa string',
            'test_number.required' => 'Nomor ujian harus diisi',
            'test_number.string' => 'Nomor ujian harus berupa string',
            'status.required' => 'Status harus diisi',
            'status.string' => 'Status harus berupa string',
            'status.in' => 'Status harus berupa passed atau failed',
        ];
    }
}
