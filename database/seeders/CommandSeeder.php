<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Command;
use Carbon\Carbon;

class CommandSeeder extends Seeder
{
    public function run()
    {
        $commands = [
            [
                'id' => 1,
                'name' => 'Instalar servicio',
                'description' => 'Instala el servicio apache2',
                'command' => 'apt install apache2 ',
                'operation' => 'install',
                'service_id' => 1,
                'deleted_at' => null,
                'created_at' => Carbon::create('2024', '05', '16', '11', '57', '19'),
                'updated_at' => Carbon::create('2024', '05', '16', '11', '57', '19'),
            ],
            [
                'id' => 2,
                'name' => 'Desinstalar',
                'description' => 'Desinstala el servicio',
                'command' => 'apt purge apache2',
                'operation' => 'uninstall',
                'service_id' => 1,
                'deleted_at' => null,
                'created_at' => Carbon::create('2024', '05', '16', '11', '57', '40'),
                'updated_at' => Carbon::create('2024', '05', '16', '11', '57', '40'),
            ],
            // ... (incluye el resto de los datos)
        ];

        foreach ($commands as $command) {
            Command::create($command);
        }
    }
}
