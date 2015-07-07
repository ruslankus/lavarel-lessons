<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Countries')->delete();

        Country::create([
            'id' => 1,
            'country_name' => 'Lithuania',
        ]);

        Country::create([
            'id' => 2,
            'country_name' => 'Russia',
        ]);

        Country::create([
            'id' => 3,
            'country_name' => 'Germany',
        ]);


    }

}
