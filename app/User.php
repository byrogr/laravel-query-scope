<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'bio', 'password', 'active', 'activation_token', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    // Query Scope
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where("name", "LIKE", "%$name%");
        }
    }

    public function scopeEmail($query, $email)
    {
        if ($email) {
            return $query->where("email", "LIKE", "%$email%");
        }
    }

    public function scopeBio($query, $bio)
    {
        if ($bio) {
            return $query->where("bio", "LIKE", "%$bio%");
        }
    }
}
