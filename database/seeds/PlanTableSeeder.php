<?php

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Template\Domain\Subscriptions\Models\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Premium',
                'slug' => SlugService::createSlug(Plan::class, 'slug', 'Premium'),
                'gateway_id' => 'premium',
                'price' => '800',
                'active' => true,
                'teams_enabled' => false,
                'teams_limit' => null,
            ],
            [
                'name' => 'Pro',
                'slug' => SlugService::createSlug(Plan::class, 'slug', 'Pro'),
                'gateway_id' => 'pro',
                'price' => '1200',
                'active' => true,
                'teams_enabled' => false,
                'teams_limit' => null,
            ],
            [
                'name' => 'Team',
                'slug' => SlugService::createSlug(Plan::class, 'slug', 'Monthly for 10 Users'),
                'gateway_id' => 'team_month_100',
                'price' => '10000',
                'active' => true,
                'teams_enabled' => true,
                'teams_limit' => 10,
            ],
        ];


        Plan::insert($plans);
    }
}
