<?php

namespace App\Models;

use App\Models\Service;
use App\Models\WorkSpace;
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

    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
