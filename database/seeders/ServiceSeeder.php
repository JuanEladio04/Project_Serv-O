<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'id' => 1,
                'name' => 'Servidor Web',
                'service_name' => 'apache2',
                'created_at' => Carbon::create('2024', '05', '16', '11', '21', '01'),
                'updated_at' => Carbon::create('2024', '05', '16', '11', '21', '01'),
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Servidor SSH',
                'service_name' => 'ssh',
                'created_at' => Carbon::create('2024', '05', '17', '07', '25', '39'),
                'updated_at' => Carbon::create('2024', '05', '17', '07', '25', '39'),
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'Supervisor',
                'service_name' => 'supervisor',
                'created_at' => Carbon::create('2024', '05', '21', '10', '29', '51'),
                'updated_at' => Carbon::create('2024', '05', '21', '10', '36', '04'),
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'Servidor FTP',
                'service_name' => 'ftp',
                'created_at' => Carbon::create('2024', '05', '21', '16', '04', '07'),
                'updated_at' => Carbon::create('2024', '05', '21', '16', '04', '07'),
                'deleted_at' => null,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
