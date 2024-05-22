<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Command;
use Carbon\Carbon;

class CommandSeeder extends Seeder
{
    public function run()
    {
        Command::create([
            'id' => 1,
            'name' => 'Instalar servicio',
            'description' => 'Instala el servicio apache2',
            'command' => 'apt install apache2 ',
            'operation' => 'install',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-16 11:57:19',
            'updated_at' => '2024-05-16 11:57:19'
        ]);

        Command::create([
            'id' => 2,
            'name' => 'Desinstalar',
            'description' => 'Desinstala el servicio',
            'command' => 'apt purge apache2',
            'operation' => 'uninstall',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-16 11:57:40',
            'updated_at' => '2024-05-16 11:57:40'
        ]);

        Command::create([
            'id' => 3,
            'name' => 'Comprobar estado',
            'description' => 'Comprueba el estado del servicio apache2',
            'command' => 'systemctl status apache2',
            'operation' => 'operation',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-16 11:58:14',
            'updated_at' => '2024-05-16 11:58:14'
        ]);

        Command::create([
            'id' => 4,
            'name' => 'Reiniciar servicio',
            'description' => 'Reinicia o inicia el servicio Apache2',
            'command' => 'systemctl restart apache2',
            'operation' => 'operation',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-16 16:23:36',
            'updated_at' => '2024-05-16 17:44:33'
        ]);

        Command::create([
            'id' => 5,
            'name' => 'Habilitar sitio web',
            'description' => 'Habilita un sitio web que especifiques en los argumentos.',
            'command' => 'a2ensite',
            'operation' => 'operation',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-17 07:23:08',
            'updated_at' => '2024-05-17 07:23:08'
        ]);

        Command::create([
            'id' => 6,
            'name' => 'Deshabilitar sitio web',
            'description' => 'Deshabilita un sitio web que especifiques en los argumentos.',
            'command' => 'a2dissite',
            'operation' => 'operation',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-17 07:23:47',
            'updated_at' => '2024-05-17 22:43:12'
        ]);

        Command::create([
            'id' => 7,
            'name' => 'Listar sitio web disponibles',
            'description' => 'Lista todos los virtualhost disponibles en el servidor.',
            'command' => 'ls /etc/apache2/sites-available',
            'operation' => 'operation',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-17 07:24:32',
            'updated_at' => '2024-05-17 07:24:32'
        ]);

        Command::create([
            'id' => 8,
            'name' => 'Listar sitios web habilitados',
            'description' => 'Lista virtualhost que han sido habilitados en el servidor.',
            'command' => 'ls /etc/apache2/sites-enabled',
            'operation' => 'operation',
            'service_id' => 1,
            'deleted_at' => NULL,
            'created_at' => '2024-05-17 07:25:22',
            'updated_at' => '2024-05-17 07:25:22'
        ]);

        Command::create([
            'id' => 9,
            'name' => 'Intalar servicio',
            'description' => 'Instala el servicio openssh-server. Para confirmar la instalacion se debe especificar en los argumentos.',
            'command' => 'apt install openssh-server',
            'operation' => 'install',
            'service_id' => 2,
            'deleted_at' => NULL,
            'created_at' => '2024-05-17 07:26:25',
            'updated_at' => '2024-05-17 07:26:25'
        ]);

        Command::create([
            'id' => 10,
            'name' => 'Desinstalar servicio',
            'description' => 'Desinstala el servicio openssh-server del servidor.',
            'command' => 'apt purge openssh-server',
            'operation' => 'uninstall',
            'service_id' => 2,
            'deleted_at' => NULL,
            'created_at' => '2024-05-17 07:26:53',
            'updated_at' => '2024-05-17 07:27:01'
        ]);

        Command::create([
            'id' => 11,
            'name' => 'Comprobar estado del servicio ',
            'description' => 'Muestra el estado del servidor openssh-server',
            'command' => 'systemctl status ssh',
            'operation' => 'operation',
            'service_id' => 2,
            'deleted_at' => NULL,
            'created_at' => '2024-05-17 12:09:19',
            'updated_at' => '2024-05-17 12:10:22'
        ]);

        Command::create([
            'id' => 12,
            'name' => 'Instalar supervisor',
            'description' => 'Instala el servicio de supervisor en el servidor',
            'command' => 'apt install supervisor',
            'operation' => 'install',
            'service_id' => 3,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:36:52',
            'updated_at' => '2024-05-21 10:36:52'
        ]);

        Command::create([
            'id' => 13,
            'name' => 'Desinstalar supervisor',
            'description' => 'Desinstala el servicio de supervisor del servidor',
            'command' => 'apt purge supervidor',
            'operation' => 'uninstall',
            'service_id' => 3,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:37:40',
            'updated_at' => '2024-05-21 10:37:40'
        ]);

        Command::create([
            'id' => 14,
            'name' => 'Ver estado de supervisor',
            'description' => 'Muestra el estado del servicio supervisor',
            'command' => 'systemctl status supervisor',
            'operation' => 'operation',
            'service_id' => 3,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:39:20',
            'updated_at' => '2024-05-21 10:39:20'
        ]);

        Command::create([
            'id' => 15,
            'name' => 'Ver estado de los workers',
            'description' => 'Muestra el estado de los workers',
            'command' => 'supervisorctl status',
            'operation' => 'operation',
            'service_id' => 3,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:39:51',
            'updated_at' => '2024-05-21 10:39:51'
        ]);

        Command::create([
            'id' => 16,
            'name' => 'Reiniciar workers',
            'description' => 'Reinicia todos los workers habilitados',
            'command' => 'supervisorctl restart all',
            'operation' => 'operation',
            'service_id' => 3,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:40:41',
            'updated_at' => '2024-05-21 10:40:41'
        ]);

        Command::create([
            'id' => 17,
            'name' => 'Recargar la configuración del servicio SSH (sin interrumpir las conexiones activas)',
            'description' => 'Recarga el servicio ssh sin interrumpir las conexiones activas por lo que este se puede serguir utilizando.',
            'command' => ' systemctl reload ssh',
            'operation' => 'operation',
            'service_id' => 2,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:47:22',
            'updated_at' => '2024-05-21 10:47:22'
        ]);

        Command::create([
            'id' => 18,
            'name' => 'Habilitar el servicio SSH para que se inicie automáticamente al arrancar el sistema.',
            'description' => 'Habilita el servicio ssh automáticamente al arrancar el sistema',
            'command' => 'systemctl enable ssh',
            'operation' => 'operation',
            'service_id' => 2,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:48:28',
            'updated_at' => '2024-05-21 10:48:28'
        ]);

        Command::create([
            'id' => 19,
            'name' => 'Deshabilitar el servicio SSH para que no se inicie automáticamente al arrancar el sistema:',
            'description' => 'Hace que el servicio ssh no esté disponible al arrancar el sistema.',
            'command' => 'systemctl disable ssh',
            'operation' => 'operation',
            'service_id' => 2,
            'deleted_at' => NULL,
            'created_at' => '2024-05-21 10:49:17',
            'updated_at' => '2024-05-21 10:49:17'
        ]);

        Command::create([
            'id' => 20,
            'name' => 'zxczxc',
            'description' => 'xzzxzcHace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.Hace que el servicio ssh no esté disponible al arrancar el sistema.',
            'command' => 'zxczxc',
            'operation' => 'operation',
            'service_id' => 2,
            'deleted_at' => '2024-05-21 10:49:42',
            'created_at' => '2024-05-21 10:49:34',
            'updated_at' => '2024-05-21 10:49:42'
        ]);
    }
}
