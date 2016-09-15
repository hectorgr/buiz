<?php

use Illuminate\Database\Seeder;
use Buiz\Entities\Grade;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create(['name' => 'Ninguno']);
        Grade::create(['name' => 'Primaria 1ero']);
        Grade::create(['name' => 'Primaria 2do']);
        Grade::create(['name' => 'Primaria 3ero']);
        Grade::create(['name' => 'Primaria 4to']);
        Grade::create(['name' => 'Primaria 5to']);
        Grade::create(['name' => 'Primaria 6to']);
        Grade::create(['name' => 'Secundaria 1ero']);
        Grade::create(['name' => 'Secundaria 2do']);
        Grade::create(['name' => 'Secundaria 3ero']);
        Grade::create(['name' => 'Bachillerato 1ero']);
        Grade::create(['name' => 'Bachillerato 2do']);
        Grade::create(['name' => 'Bachillerato 3ero']);
        Grade::create(['name' => 'Licenciatura 1ero']);
        Grade::create(['name' => 'Licenciatura 2do']);
        Grade::create(['name' => 'Licenciatura 3ero']);
        Grade::create(['name' => 'Licenciatura 4to']);
        Grade::create(['name' => 'Licenciatura 5to']);
        Grade::create(['name' => 'Licenciatura 6to']);
        Grade::create(['name' => 'Licenciatura 7mo']);
        Grade::create(['name' => 'Licenciatura 8vo']);
        Grade::create(['name' => 'Licenciatura 9no']);
        Grade::create(['name' => 'Licenciatura 10mo']);
        Grade::create(['name' => 'Licenciatura 11vo']);
        Grade::create(['name' => 'Licenciatura 12vo']);
        Grade::create(['name' => 'Maestría 1ero']);
        Grade::create(['name' => 'Maestría 2do']);
        Grade::create(['name' => 'Maestría 3ero']);
        Grade::create(['name' => 'Maestría 4to']);
        Grade::create(['name' => 'Maestría 5to']);
        Grade::create(['name' => 'Maestría 6to']);
    }
}
