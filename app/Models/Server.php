<?php

namespace App\Models;

use App\Models\Service;
use phpseclib3\Net\SSH2;
use App\Models\WorkSpace;
use App\Helpers\EncryptionHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Server extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'server_dir',
        'user_root',
        'password'
    ];

    /**
     * Get all of the workspaces for the server.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workSpace()
    {
        return $this->belongsTo(WorkSpace::class);
    }

    /**
     * Get all of the services for the server.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    /**
     * Check if the server is online
     *
     * @return bool
     */
    public function ping()
    {
        exec("ping -n 1 -w 5 $this->server_dir", $output, $result);

        if ($result == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the CPU usage of the server
     *
     * @return float
     */
    public function getCpuUsage()
    {
        $encryptionHelper = new EncryptionHelper;

        try {
            $ssh = new SSH2($this->server_dir);

            if (!$ssh->login($this->user_root, $encryptionHelper->decryptPassword($this->password, env('ENCRYPTION_KEY')))) {
                session()->flash('status', 'Credenciales inválidas');
            }

            $output = $ssh->exec('cat /proc/stat | grep "^cpu " | awk \'{usage=($2+$4)*100/($2+$4+$5)} END {print usage}\'');
            $cpuUsage = floatval($output);


            $ssh->disconnect();

            return $cpuUsage;
        } catch (\Throwable $th) {
            return 0;
            session()->flash('status', 'No es posible leer la información de la CPU');
        }
    }

    /**
     * Get the memory of the server
     *
     * @return string
     */
    public function getMemory()
    {
        $encryptionHelper = new EncryptionHelper;

        try {
            $ssh = new SSH2($this->server_dir);

            if (!$ssh->login($this->user_root, $encryptionHelper->decryptPassword($this->password, env('ENCRYPTION_KEY')))) {
                session()->flash('status', 'Credentials are invalid');
            }

            // Get memory information using the 'free' command
            $output = $ssh->exec('free -m');

            $ssh->disconnect();

            // Return the obtained output
            return $output;
        } catch (\Throwable $th) {
            session()->flash('status', 'It is not possible to read memory information');
            return null;
        }
    }

    /**
     * Get the memory usage of the server
     *
     * @return float
     */
    public function getMemoryUsage()
    {
        $encryptionHelper = new EncryptionHelper;

        try {
            $ssh = new SSH2($this->server_dir);

            if (!$ssh->login($this->user_root, $encryptionHelper->decryptPassword($this->password, env('ENCRYPTION_KEY')))) {
                session()->flash('status', 'Credentials are invalid');
            }

            // Get memory information using the 'free' command
            $output = $ssh->exec('free -m');

            $ssh->disconnect();

            // Return the obtained output
            return $output;
        } catch (\Throwable $th) {
            session()->flash('status', 'It is not possible to read memory information');
            return null;
        }
    }


}
