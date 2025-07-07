<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Street extends Model
{
  public $timestamps = false;
  protected $fillable = [
    'name'
  ];

  public function cep(): HasMany
  {
    return $this->hasMany(Cep::class);
  }

  public function neighborhood(): HasOne
  {
    return $this->hasOne(Neighborhood::class);
  }

  public function users(): HasMany
  {
    return $this->hasMany(State::class);
  }
}
