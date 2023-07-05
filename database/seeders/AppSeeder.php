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
            'name'=>'Food',
            'type'=> 'Category',
        ]);
        Catalogue::factory()->create([
            'name'=>'Craft',
            'type'=> 'Category',
        ]);
        Catalogue::factory()->create([
            'name'=>'Clothes',
            'type'=> 'Category',
        ]);
        Catalogue::factory()->create([
            'name'=>'Software',
            'type'=> 'Carrer',
        ]);
        Catalogue::factory()->create([
            'name'=>'Marketing',
            'type'=> 'Carrer',
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
