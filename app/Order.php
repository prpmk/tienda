<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = ['subtotal', 'shipping', 'user_id'];
    //relacion user
    public function user(){
      return $this->belongsTo('App\User');
    }
    //relacion items
    public function order_items(){
      return $this->hasMany('App\OrderItem');
    }
}
