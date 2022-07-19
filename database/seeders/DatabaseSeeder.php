<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Renter;
use App\Models\Service;
use App\Models\User;
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
        $this->call([
            AdminSeeder::class
        ]);

        Service::factory(10)->create();
        Renter::factory(10)->create();
        Contact::factory(10)->create();
        Booking::factory(10)->create();
        User::factory(2)->create();
    }
}
