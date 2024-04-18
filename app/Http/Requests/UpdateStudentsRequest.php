<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
            'txtfullname' => 'required',
            'txtgender' => 'required',
            'txtemail' => [
                'required',
                Rule::unique('students','email')->ignore($this->txtid, 'idstudents'),
                'email'
            ],
            'txtphone' => [
                'required',
                Rule::unique('students', 'phone')->ignore($this->txtphone, 'idstudents'),
                'numeric',
                'digits:13'
            ],
            'txtaddress' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtid.digits' => 'Kolom :attribute Tidak Boleh Lebih dari 7 Digit',
            'txtfullname.required' => 'Kolom :attribute Harus Di Isi',
            'txtgender.required' => 'Kolom :attribute Harus Di Isi',
            'txtemail.required' => 'Kolom :attribute Harus Di Isi',
            'txtemail.unique' => ':attribute Sudah Terdaftar',
            'txtphone.required' => 'Kolom :attribute Harus Di Isi',
            'txtphone.numeric' => 'Kolom :attribute Harus Berupa Angka',
            'txtphone.digits' => 'Kolom :attribute Tidak Boleh Lebih dari 13 Digit',
            'txtaddress.required' => 'Kolom :attribute Harus Di Isi'
        ];
    }

    public function attributes()
    {
        return [
            'txtfullname' => 'Nama Lengkap',
            'txtgender' => 'Jenis Kelamin',
            'txtemail' => 'Alamat Email',
            'txtphone' => 'Nomor HP',
            'txtaddress' => 'Alamat'
        ];
    }
}
