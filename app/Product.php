<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    //
    protected $table ='products';
    protected $fillable =['name', 'slug', 'description', 'extract', 'price', 'image', 'visible', 'category_id'];
    //relation with category
    public function category(){
      return $this->belongsTo('App\Category');
    }
}
