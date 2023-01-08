<?php

namespace Database\Seeders;

use App\Models\Catalogue;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalogue::factory()->create([
            'name'=>'Camisa',
            'type'=> 'category',
        ]);
        Catalogue::factory()->create([
            'name'=>'Pantalon',
            'type'=> 'category',
        ]);
        Catalogue::factory()->create([
            'name'=>'Abrigo',
            'type'=> 'category',
        ]);
        Catalogue::factory()->create([
            'name'=>'Hombre',
            'type'=> 'gender',
        ]);
        Catalogue::factory()->create([
            'name'=>'Mujer',
            'type'=> 'gender',
        ]);
        Catalogue::factory()->create([
            'name'=>'Negro',
            'type'=> 'color',
        ]);
        Catalogue::factory()->create([
            'name'=>'Gris',
            'type'=> 'color',
        ]);
        Catalogue::factory()->create([
            'name'=>'Azul',
            'type'=> 'color',
        ]);
        Catalogue::factory()->create([
            'name'=>'Anaranjado',
            'type'=> 'color',
        ]);
        Catalogue::factory()->create([
            'name'=>'XL',
            'type'=> 'size',
        ]);
        Catalogue::factory()->create([
            'name'=>'S',
            'type'=> 'size',
        ]);
        Catalogue::factory()->create([
            'name'=>'M',
            'type'=> 'size',
        ]);
        Catalogue::factory()->create([
            'name'=>'L',
            'type'=> 'size',
        ]);
    }
}
