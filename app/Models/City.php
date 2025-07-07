<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class City extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'name'
  ];

  public function cep(): HasMany
  {
    return $this->hasMany(Cep::class);
  }

  public function state(): HasOne
  {
    return $this->hasOne(State::class);
  }

  public function users(): HasMany
  {
    return $this->hasMany(State::class);
  }
}
