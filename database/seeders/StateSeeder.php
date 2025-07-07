<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $states = [
      [
        "AC",
        "Acre"
      ],
      [
        "AL",
        "Alagoas"
      ],
      [
        "AP",
        "Amapá"
      ],
      [
        "AM",
        "Amazonas"
      ],
      [
        "BA",
        "Bahia"
      ],
      [
        "CE",
        "Ceará"
      ],
      [
        "DF",
        "Distrito Federal"
      ],
      [
        "ES",
        "Espírito Santo"
      ],
      [
        "GO",
        "Goiás"
      ],
      [
        "MA",
        "Maranhão"
      ],
      [
        "MT",
        "Mato Grosso"
      ],
      [
        "MS",
        "Mato Grosso do Sul"
      ],
      [
        "MG",
        "Minas Gerais"
      ],
      [
        "PA",
        "Pará"
      ],
      [
        "PB",
        "Paraíba"
      ],
      [
        "PR",
        "Paraná"
      ],
      [
        "PE",
        "Pernambuco"
      ],
      [
        "PI",
        "Piauí"
      ],
      [
        "RJ",
        "Rio de Janeiro"
      ],
      [
        "RN",
        "Rio Grande do Norte"
      ],
      [
        "RS",
        "Rio Grande do Sul"
      ],
      [
        "RO",
        "Rondônia"
      ],
      [
        "RR",
        "Roraima"
      ],
      [
        "SC",
        "Santa Catarina"
      ],
      [
        "SP",
        "São Paulo"
      ],
      [
        "SE",
        "Sergipe"
      ],
      [
        "TO",
        "Tocantins"
      ],
    ];

    foreach ($states as $state) {
      State::factory()->create([
        'abbreviated_name' => $state[0],
        'name' => $state[1]
      ]);
    }
  }
}
