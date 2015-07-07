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
            'password' => '$2y$10$.ub.I7c0oXkylEacfJ4gPOA/FUFtKMm6VFFz0VRjtjxun2W.z7cga',
            'show' => '0'
        ]);

        User::create([
            'id' => 2,
            'name' => 'user2',
            'email' => 'test@test.ri',
            'country_id' => '1',
            'password' => '$2y$10$.ub.I7c0oXkylEacfJ4gPOA/FUFtKMm6VFFz0VRjtjxun2W.z7cga',
            'show' => '1'
        ]);

        User::create([
            'id' => 3,
            'name' => 'user3',
            'email' => 'test@tes.ls',
            'country_id' => '2',
            'password' => '$2y$10$.ub.I7c0oXkylEacfJ4gPOA/FUFtKMm6VFFz0VRjtjxun2W.z7cga',
            'show' => '1'
        ]);

    }
}
