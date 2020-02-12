<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class); //Um usuario pertence a uma loja
    }

    public function products()
    {
        return $this->hasMany(Product::class); //Uma loja possui muitos produtos
    }
}
