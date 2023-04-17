<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class AddPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'package_name' => 'Silver',
                'package_price' => '299',
                'package_validity' => '2 night stay',
            ],
            [
                'package_name' => 'Gold',
                'package_price' => '499',
                'package_validity' => '3 night stay',
            ],
            [
                'package_name' => 'Platinum',
                'package_price' => '799',
                'package_validity' => '6 night stay',
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
