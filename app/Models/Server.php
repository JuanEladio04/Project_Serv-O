<?php

namespace App\Models;

use App\Models\Service;
use App\Jobs\PingServer;
use App\Models\WorkSpace;
use App\Jobs\CheckServerOnlineJob;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Client\RequestException;
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
        exec("ping -n 1 $this->server_dir", $output, $result);

        if ($result == 0) {
            return true;
        } else {
            return false;
        }
    }

}
