<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function store()
    {
        $this->belongsTo(Store::class);  //Um produto pertence a uma loja
    }
}
