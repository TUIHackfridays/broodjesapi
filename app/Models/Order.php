<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /**
   * @var string
   */
  protected $table = 'orders';

  public function orderItems()
  {
    return $this->hasMany('App\Models\OrderItem');
  }

  public function provider()
  {
    return $this->belongsTo('App\Models\Provider');
  }

  // FIXME
  /*
  public function customer()
  {
    return $this->belongsTo('App\Models\Customer');
  }
  */
}