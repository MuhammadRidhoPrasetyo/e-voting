<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'password' => '12345678',
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|'.Rule::unique('users','email')->ignore($this->user->id),
            'nis' => 'required|numeric|digits_between:1,8|'.Rule::unique('users','nis')->ignore($this->user->id), // Perbaikan pada aturan nis
            'password' => 'required|string|between:1,8',
            'role_id' => 'required|exists:roles,id'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nama Siswa',
            'email' => 'Email',
            'nis' => 'Nomor Induk Siswa',
            'password' => 'Kata Sandi',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute harus diisi!',
            'name.string' => ':attribute harus berupa teks!',
            'name.max' => ':attribute tidak boleh lebih dari 255 karakter!',
            'email.required' => ':attribute harus diisi!',
            'email.unique' => ':attribute sudah terdaftar!',
            'email.email' => ':attribute harus berupa alamat email yang valid!',
            'nis.required' => ':attribute harus diisi!',
            'nis.unique' => ':attribute sudah terdaftar!',
            'nis.numeric' => ':attribute harus berupa angka!',
            'nis.digits_between' => ':attribute harus terdiri dari 1 hingga 8 digit!',
            'password.required' => ':attribute harus diisi!',
            'password.string' => ':attribute harus berupa teks!',
            'password.between' => ':attribute harus terdiri dari 1 hingga 8 karakter!',
            'role_id.required' => ':attribute harus diisi!',
            'role_id.exists' => ':attribute tidak tersedia!',
        ];
    }
}
