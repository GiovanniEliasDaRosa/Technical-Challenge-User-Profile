<?php

use App\Models\City;
use App\Models\Neighborhood;
use App\Models\State;
use App\Models\Street;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('states', function (Blueprint $table) {
      $table->id();
      $table->string('abbreviated_name')->unique();
      $table->string('name')->unique();
    });

    Schema::create('cities', function (Blueprint $table) {
      $table->id();
      $table->string('name');
    });

    Schema::create('neighborhoods', function (Blueprint $table) {
      $table->id();
      $table->string('name');
    });

    Schema::create('streets', function (Blueprint $table) {
      $table->id();
      $table->string('name');
    });

    Schema::create('ceps', function (Blueprint $table) {
      $table->id();
      $table->string('value', 8);
      $table->foreignIdFor(Street::class)->constrained();
      $table->foreignIdFor(Neighborhood::class)->constrained();
      $table->foreignIdFor(City::class)->constrained();
      $table->foreignIdFor(State::class)->constrained();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('neighborhoods');
    Schema::dropIfExists('states');
    Schema::dropIfExists('cities');
    Schema::dropIfExists('streets');
    Schema::dropIfExists('ceps');
  }
};
