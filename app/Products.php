<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable =['product_name','product_desc','thumbnail','gallery','category_id','brand_id','price','quantity'];

    public function Category(){
        return $this->belongsTo("\App\Category");// category_id -> id
    }

    public function Brand(){
        return $this->belongsTo("\App\Brand");
    }

}
