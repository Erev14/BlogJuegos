<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Profile;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@correo.com',
            'password' => Hash::make('AdminBlogJuegos1234#'),
            'user_type' => 2,
            'email_verified_at' => Carbon::now()
        ]);
        $user_admin->profile()->save(factory(Profile::class)->make());
    }
}
