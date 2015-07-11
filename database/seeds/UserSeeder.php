<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->delete();

        User::create([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'country_id' => '1',
            'password' => '123456',
            'show' => '0'
        ]);

        User::create([
            'id' => 2,
            'name' => 'user2',
            'email' => 'test@test.ru',
            'country_id' => '1',
            'password' => '123456',
            'show' => '1'
        ]);


    }
}
