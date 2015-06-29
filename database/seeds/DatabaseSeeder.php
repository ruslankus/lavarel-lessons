<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('PostsSeeder');

        //Model::reguard();
    }
}



class PostsSeeder extends Seeder {

    public function run()
    {
        DB::table('Posts')->delete();

        Post::create([

            'name' => 'First Name',
            'email' => 'test_mail1@test.lt',
            'city' => 'City 1',
            'content' => 'First Feedbuck 24',
            'slag' => 'first-feed',
            'published' => true,
            'created_at' => time(),


        ]);

        Post::create([

            'name' => 'Second Name',
            'email' => 'test_mail1@test.lt',
            'city' => 'City 2',
            'content' => 'Second Feedbuck 24',
            'slag' => 'second-feed',
            'published' => true,
            'created_at' => time(),


        ]);


        Post::create([

            'name' => 'Third Name',
            'email' => 'test_mail3@test.lt',
            'city' => 'City 3',
            'content' => 'Third Feedbuck 24sdsds',
            'slag' => 'third-feed',
            'published' => true,
            'created_at' => time(),


        ]);
    }

}


