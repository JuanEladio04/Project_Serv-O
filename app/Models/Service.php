<?php

namespace App\Models;

use App\Helpers\EncryptionHelper;
use App\Models\Server;
use phpseclib3\Net\SSH2;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'service_name'
    ];


    /**
     * Get all of the servers that belong to the service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function servers()
    {
        return $this->belongsToMany(Server::class, 'services_servers');
    }

    /**
     * Get all of the commands for the service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commands()
    {
        return $this->hasMany(Command::class, 'service_id');
    }

    /**
     * Get the status of the service on the given server.
     *
     * @param Server $server
     * @return bool
     */
    public function status(Server $server)
    {
        $encryptionHelper = new EncryptionHelper;

        try {
            $ssh = new SSH2($server->server_dir);
            $ssh->setTimeout(3);

            if (!$ssh->login($server->user_root, $encryptionHelper->decryptPassword($server->password, env('ENCRYPTION_KEY')))) {
                session()->flash('status', 'Credenciales inválidas');
                return false;
            }

            $output = $ssh->exec('systemctl status ' . $this->service_name);
            $isActive = strpos(strtolower($output), 'running') !== false;
            $ssh->disconnect();

            return $isActive;

        } catch (\Throwable $th) {
            session()->flash('status', 'No es posible obtener el estado del servicio.');
            return false;
        }
    }


}
