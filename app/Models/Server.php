<?php

namespace App\Models;

use App\Models\Service;
use App\Models\WorkSpace;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
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
        try {
            if ($this->description) {
                $response = Http::timeout(2)->get($this->description);
                return $response->successful();
            }
        } catch (\Exception $e) {
            // Log the exception message if needed
        }

        return false;
    }

}
