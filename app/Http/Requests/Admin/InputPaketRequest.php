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
            'tahun' => 'max:225',
            'pilih' => 'max:225',
            'namaPaket' => 'max:225',
            'namaPenyedia' => 'max:225',
            'nomorKontrak' => 'max:225',
            'awalPelaksanaan' => 'date',
            'akhirPelaksanaan' => 'date',
            'paguAnggaran' => 'integer',
            'nilaiKontrak' => 'integer',
            'nilaiHps' => 'integer',
            'efisiensi' => 'integer',
        ];
    }
}
