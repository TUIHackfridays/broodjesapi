<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sandwich extends Model
{
  /**
   * @var string
   */
  protected $table = 'sandwiches';

  public function provider()
  {
    return $this->belongsTo('App\Models\Provider');
  }
}
