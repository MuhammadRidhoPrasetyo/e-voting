<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateElectionRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }

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
            'title' => 'sometimes|string|max:255|'. Rule::unique('elections', 'title')->ignore($this->election->id),
            'slug' => 'sometimes|string|max:255|'. Rule::unique('elections', 'slug')->ignore($this->election->id),
            'cover' => 'sometimes|image|max:2048', // Misalnya, cover adalah gambar yang diupload
            'description' => 'sometimes|string',
            'status' => 'sometimes|string|in:active,inactive',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date|after_or_equal:start_time',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Judul',
            'slug' => 'Slug',
            'cover' => 'Sampul',
            'description' => 'Deskripsi',
            'status' => 'Status',
            'start_time' => 'Waktu Mulai',
            'end_time' => 'Waktu Selesai',
        ];
    }

    public function messages()
    {
        return [
            'title.sometimes' => ':attribute harus diisi!',
            'title.string' => ':attribute harus berupa teks!',
            'title.max' => ':attribute tidak boleh lebih dari 255 karakter!',

            'slug.sometimes' => ':attribute harus diisi!',
            'slug.string' => ':attribute harus berupa teks!',
            'slug.unique' => ':attribute sudah terdaftar!',
            'slug.max' => ':attribute tidak boleh lebih dari 255 karakter!',

            'cover.sometimes' => ':attribute harus diisi!',
            'cover.image' => ':attribute harus berupa file gambar!',
            'cover.max' => ':attribute tidak boleh lebih dari 2MB!',

            'description.sometimes' => ':attribute harus diisi!',
            'description.string' => ':attribute harus berupa teks!',

            'status.sometimes' => ':attribute harus diisi!',
            'status.string' => ':attribute harus berupa teks!',
            'status.in' => ':attribute harus salah satu dari: active, inactive!',

            'start_time.sometimes' => ':attribute harus diisi!',
            'start_time.date' => ':attribute harus berupa tanggal yang valid!',

            'end_time.sometimes' => ':attribute harus diisi!',
            'end_time.date' => ':attribute harus berupa tanggal yang valid!',
            'end_time.after_or_equal' => ':attribute harus setelah atau sama dengan Waktu Mulai!',
        ];
    }
}
