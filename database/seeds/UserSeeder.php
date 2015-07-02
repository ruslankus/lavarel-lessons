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
            'name' => 'user1',
            'email' => 'test@test.ri'
        ]);

        User::create([
            'id' => 2,
            'name' => 'user2',
            'email' => 'test@test.ri'
        ]);

        User::create([
            'id' => 3,
            'name' => 'user3',
            'email' => 'test@tes.ls'
        ]);

    }
}
