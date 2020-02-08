<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = \Template\Domain\Company\Models\Company::limit(2)->get();

        $companies->each(function ($u) {
            $u->projects()->saveMany(factory(\Template\Domain\Project\Models\Project::class, 5)->make());
        });

    }
}
