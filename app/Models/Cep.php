<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cep extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'value',
    'street_id',
    'neighborhood_id',
    'city_id',
    'state_id'
  ];

  public function street(): HasOne
  {
    return $this->hasOne(Street::class, 'id', 'street_id');
  }

  public function neighborhood(): HasOne
  {
    return $this->hasOne(Neighborhood::class, 'id', 'neighborhood_id');
  }

  public function city(): HasOne
  {
    return $this->hasOne(City::class, 'id', 'city_id');
  }

  public function state(): HasOne
  {
    return $this->hasOne(State::class, 'id', 'state_id');
  }
}
