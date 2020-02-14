<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','body','price','slug'];
    
    public function store()
    {
        $this->belongsTo(Store::class);  //Um produto pertence a uma loja
    }

    public function category(){
        return $this->belengsToMany(Category::class);
    }
}
