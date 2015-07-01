<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Cities')->delete();

        City::create([
            'id' => 1,
            'city_name' => 'Vilnius',
        ]);

        City::create([
            'id' => 2,
            'city_name' => 'Kaunas',
        ]);

        City::create([
            'id' => 3,
            'city_name' => 'Klaipeda',
        ]);

        City::create([
            'id' => 4,
            'city_name' => 'Kita',
        ]);


    }
}
