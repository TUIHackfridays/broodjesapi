<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  /**
   * @var string
   */
  protected $table = 'providers';

  public function sandwiches()
  {
    return $this->hasMany('App\Models\Sandwich');
  }
}