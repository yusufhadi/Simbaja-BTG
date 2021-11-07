<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InputPaket extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'SKPD', 'tahun', 'pilih', 'namaPaket',
        'namaPenyedia', 'paguAnggaran', 'nilaiKontrak',
        'nilaiHps', 'efisiensi', 'skpd_id'

    ];

    protected $hidden = [];

    public function skpd()
    {
        return $this->belongsTo(\App\skpd::class, 'skpd_id', 'id');
    }
}
