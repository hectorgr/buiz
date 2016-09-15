<?php

use Illuminate\Database\Seeder;
use Buiz\Entities\QuestionsType;

class QuestionsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionsType::create(['name' => 'Falso / Verdadero']);
        QuestionsType::create(['name' => 'Selección múltiple']);
        QuestionsType::create(['name' => 'Opción múltiple']);
        QuestionsType::create(['name' => 'Opción múltiple con respuesta corta']);
        QuestionsType::create(['name' => 'Completar oración']);
        QuestionsType::create(['name' => 'Relación de columnas']);
        QuestionsType::create(['name' => 'Respuesta corta']);
        QuestionsType::create(['name' => 'Respuesta larga']);
        QuestionsType::create(['name' => 'Ordenación']);
        QuestionsType::create(['name' => 'Ensayo']);
        QuestionsType::create(['name' => 'Carga de archivo']);
    }
}
