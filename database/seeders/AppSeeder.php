<?php

namespace Database\Seeders;

use App\Models\Catalogue;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::factory()->create([
            'name'=> 'Danny Casis',
            'email'=> 'danny_casis@gmail.com',
            'address'=> 'Quitumbe',
            'password'=> Hash::make('159632100'),
            'phone'=> '0983379238',
        ])->assignRole('admin');

        User::factory()->create([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'address'=> 'admin',
            'password'=> Hash::make('admin'),
            'phone'=> '0983379238',
        ])->assignRole('super-admin');

        Payment::factory()->create([
            'name'=> 'PayPal',
        ]);
        Payment::factory()->create([
            'name'=> 'Transferencia',
        ]);
    }
}
