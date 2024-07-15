<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberCategory;

class MemberCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberCategory::create([
            'name' => 'Nové'
        ]);
    }
}
