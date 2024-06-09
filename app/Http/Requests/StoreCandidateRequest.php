<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'election_id' => 'required|exists:elections,id',
            'name' => 'required|string|unique:candidates,name|max:255',
            'foto' => 'required|image|max:2048', // Misalnya, foto adalah gambar yang diupload
            'description' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'election_id' => 'Pemilihan',
            'name' => 'Judul',
            'foto' => 'Foto Kandidat',
            'description' => 'Deskripsi',
        ];
    }

    public function messages()
    {
        return [
            'election_id.required' => ':attribute harus diisi!',
            'election_id.exists' => ':attribute pemilihan tidak tersedia!',

            'name.required' => ':attribute harus diisi!',
            'name.string' => ':attribute harus berupa teks!',
            'name.max' => ':attribute tidak boleh lebih dari 255 karakter!',

            'foto.required' => ':attribute harus diisi!',
            'foto.image' => ':attribute harus berupa file gambar!',
            'foto.max' => ':attribute tidak boleh lebih dari 2MB!',

            'description.required' => ':attribute harus diisi!',
            'description.string' => ':attribute harus berupa teks!',

        ];
    }
}
