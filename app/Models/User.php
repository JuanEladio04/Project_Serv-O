<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'birth_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get all of the user's workspaces.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function workSpaces()
    {
        return $this->belongsToMany(WorkSpace::class, 'work_spaces_user')
            ->withPivot('wk_role');
    }

    /**
     * Get all of the user's commands.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function commands()
    {
        return $this->belongsToMany(Command::class)
            ->withPivot('state', 'date', 'time', 'failure_traces');
    }
}
