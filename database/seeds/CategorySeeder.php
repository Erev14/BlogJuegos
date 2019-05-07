<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Publication;
use App\User;
use App\Classification;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 3)->create()->each(function ($category) {
            $user_admin = User::where('user_type', 2)->first();
            $classification = factory(Classification::class)->create();
            $category
                ->publications()
                ->saveMany(factory(Publication::class, 5)
                    ->make([
                        'user_id' => $user_admin->id,
                        'classification_id' => $classification->id
                    ]));
        });
    }
}
