<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\Command;
use phpseclib3\Net\SSH2;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Helpers\EncryptionHelper;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
    public function executeCommand(Server $server, Command $command, $arguments)
    {
        $encryptionHelper = new EncryptionHelper;

        try {
            $ssh = new SSH2($server->server_dir);
            $ssh->setTimeout(3);

            if (!$ssh->login($server->user_root, $encryptionHelper->decryptPassword($server->password, env('ENCRYPTION_KEY')))) {
                session()->flash('status', 'Credenciales inválidas');
                return 'Error al comunicar con el servidor';
            }

            $ssh->write('sudo -S ' . $command->command . ' ' .  $arguments . "\n");
            $ssh->read('[sudo] password for ' . $server->user_root . ':');
            $ssh->write($encryptionHelper->decryptPassword($server->password, env('ENCRYPTION_KEY')) . "\n");
            $output = $ssh->read();
            $ssh->disconnect();

            if (strpos(strtolower($output), 'error') !== false) {
                session()->flash('status', 'Se produjo un error al ejecutar el comando.');
                Auth::user()->commands()->attach($command, [
                    'state' => 'ERROR',
                    'time' => Carbon::now()->toTimeString(),
                    'failure_traces' => $output
                ]);
            } else {
                Auth::user()->commands()->attach($command, [
                    'state' => 'Success',
                    'time' => Carbon::now()->toTimeString(),
                    'date' => Carbon::now()->toDateString(),
                    'failure_traces' => ''
                ]);
            }

            return $output;

        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible ejecutar la sentencia en el servidor.');
            return 'Error al ejecutar comando ' . $th;
        }
    }

}
