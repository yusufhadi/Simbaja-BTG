<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class skpd extends Model
{
    // use SoftDeletes;

    protected $guarded = [];

    public function inputPakets()
    {
        return $this->hasMany(\App\InputPaket::class, 'skpd_id', 'id');
    }
}
