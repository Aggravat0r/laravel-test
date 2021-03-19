<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientRelation;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10000; $i++){
            ClientRelation::factory()
                ->for(Company::factory(), 'company')
                ->for(Client::factory(), 'client')
                ->create();

            /*Дополняем связи*/
            ClientRelation::factory()
                ->count(mt_rand(1, 10))
                ->state(new Sequence(
                    function () {
                        return ['client_id' => Client::all()->random()];
                    },
                ))
                ->state(new Sequence(
                    function () {
                        return ['company_id' => Company::all()->random()];
                    },
                ))
                ->create();
        }
    }
}
