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
            'city_name' => 'Vilnius',
        ]);

        City::create([
            'city_name' => 'Kaunas',
        ]);

        City::create([
            'city_name' => 'Klaipeda',
        ]);
    }
}
