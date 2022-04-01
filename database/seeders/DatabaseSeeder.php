<?php

namespace Database\Seeders;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\Models\Garage;
use Carbon\Carbon;
use DB;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            'name' => 'AutoPark',
            'email' => 'testemail@testautopark.fi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('owners')->insert([
            'name' => 'Parkkitalo OY',
            'email' => 'testemail@testgarage.fi',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('garages')->insert([
            'name' => 'Garage 1',
            'owner_id' => 1,
            'hourly_price' => 2,
            'currency' => "€",
            'country' => 'Finland',
            'lat' => 60.168607847624095,
            'lng' => 24.932371066131623,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('garages')->insert([
            'name' => 'Garage 2',
            'owner_id' => 1,
            'hourly_price' => 1.5,
            'currency' => "€",
            'country' => 'Finland',
            'lat' => 60.162562,
            'lng' => 24.939453,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('garages')->insert([
            'name' => 'Garage 3',
            'owner_id' => 1,
            'hourly_price' => 3,
            'currency' => "€",
            'country' => 'Finland',
            'lat' => 60.16444996645511,
            'lng' => 24.938178168200714,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('garages')->insert([
            'name' => 'Garage 4',
            'owner_id' => 1,
            'hourly_price' => 3,
            'currency' => "€",
            'country' => 'Finland',
            'lat' => 60.165219358852795,
            'lng' => 24.93537425994873,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('garages')->insert([
            'name' => 'Garage 5',
            'owner_id' => 1,
            'hourly_price' => 3,
            'currency' => "€",
            'country' => 'Finland',
            'lat' => 60.17167429490068,
            'lng' => 24.921585662024363,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('garages')->insert([
            'name' => 'Garage 6',
            'owner_id' => 2,
            'hourly_price' => 2,
            'currency' => "€",
            'country' => 'Finland',
            'lat' => 60.16867390148751,
            'lng' => 24.930162952045407,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
