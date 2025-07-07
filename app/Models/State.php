<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
  public $timestamps = false;
  use HasFactory;

  public function cep(): HasMany
  {
    return $this->hasMany(Cep::class);
  }

  public function users(): HasMany
  {
    return $this->hasMany(State::class);
  }
}
