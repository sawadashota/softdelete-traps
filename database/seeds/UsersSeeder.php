<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = \App\Models\Country::all();
        
        foreach($countries as $country) {
            factory(\App\Models\User::class, 3)->create(['country_id' => $country->id])->each(function ($u) {
                $u->posts()->save(factory(\App\Models\Post::class)->create());
            });
        }
    }
}
