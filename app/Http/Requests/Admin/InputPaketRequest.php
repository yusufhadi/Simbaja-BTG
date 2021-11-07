<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InputPaketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'SKPD' => 'max:225',
            'tahun' => 'required|max:225',
            'pilih' => 'required|max:225',
            'namaPaket' => 'required|max:225',
            'namaPenyedia' => 'required|max:225',
            'paguAnggaran' => 'required|integer',
            'nilaiKontrak' => 'required|integer',
            'nilaiHps' => 'required|integer',
            'efisiensi' => 'required|integer',
        ];
    }
}
