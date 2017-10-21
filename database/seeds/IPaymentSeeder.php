<?php

use Kenswitch\IPayment;
use Illuminate\Database\Seeder;

class IPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IPayment::class, 20)->create();
    }
}
