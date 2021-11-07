<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skpd extends Model
{
    protected $guarded = [];

    public function inputPakets()
    {
        return $this->hasMany(\App\InputPaket::class, 'skpd_id', 'id');
    }
}
