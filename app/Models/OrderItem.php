<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  protected $table = 'order_items';

  public function sandwich()
  {
    return $this->belongsTo('App\Models\Sandwich');
  }

  public function provider()
  {
    return $this->belongsTo('App\Models\Provider');
  }
}