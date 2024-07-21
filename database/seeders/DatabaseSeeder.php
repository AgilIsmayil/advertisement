<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ban;
use App\Models\CarSupplier;
use App\Models\City;
use App\Models\Color;
use App\Models\Currency;
use App\Models\FuelType;
use App\Models\Gear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Car::factory(100)->create();

        \App\Models\User::factory(1)->create();

        Ban::query()
            ->insert([
                [
                    'name' => 'Avtobus'
                ],
                [
                    'name' => 'Dartqi'
                ],
                [
                    'name' => 'Furqon'
                ],
                [
                    'name' => 'Moped'
                ],
                [
                    'name' => 'Motosiklet'
                ],
                [
                    'name' => 'Sedan'
                ],
                [
                    'name' => 'SUV'
                ],
                [
                    'name' => 'Fayton'
                ],
                [
                    'name' => 'Karavan'
                ],
            ]);

        FuelType::query()
            ->insert([
                [
                    'name' => 'Benzin'
                ],
                [
                    'name' => 'Qaz'
                ],
                [
                    'name' => 'Dizel'
                ],
                [
                    'name' => 'Elektro'
                ],
                [
                    'name' => 'Hybrid'
                ],
                [
                    'name' => 'Plug-in Hybrid'
                ],

            ]);

        Gear::query()
            ->insert([
                [
                    'name' => 'Arxa'
                ],
                [
                    'name' => 'On'
                ],
                [
                    'name' => 'Tam'
                ],
            ]);

        Color::query()
            ->insert([
                [
                    'name' => 'Qırmızı'
                ],
                [
                    'name' => 'Çəhrayı'
                ],
                [
                    'name' => 'Yaşıl'
                ],
                [
                    'name' => 'Qara'
                ],
                [
                    'name' => 'Ağ'
                ],
            ]);


        City::query()
            ->insert([
                [
                    'name' => 'Baki'
                ],
                [
                    'name' => 'Sumqayit'
                ],
                [
                    'name' => 'Gence'
                ],
                [
                    'name' => 'Mingecevir'
                ],
                [
                    'name' => 'Berde'
                ],
            ]);

        Currency::query()
            ->insert([
                [
                    'name' => 'Manat',
                    'code' => 'AZN'
                ],
                [
                    'name' => 'Dollar',
                    'code' => 'USD'
                ],
                [
                    'name' => 'Avro',
                    'code' => 'EUR'
                ],
            ]);

        CarSupplier::query()
            ->insert([
                [
                    'name' => 'Yüngül lehimli disklər',
                ],
                [
                    'name' => 'Mərkəzi qapanma',
                ],
                [
                    'name' => 'Dəri salon',
                ],
                [
                    'name' => 'ABS',
                ],
                [
                    'name' => 'Park radari',
                ],
                [
                    'name' => 'Ksenon lampalar',
                ],
                [
                    'name' => 'Lyuk',
                ],
                [
                    'name' => 'Kondisioner',
                ],
                [
                    'name' => 'Yağış sensoru',
                ],
            ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'aqil@gmail.com',
        //     'password' => bcrypt('salam123'),
        //     'remember_token' => Str::random(10),


        // ]);
    }
}