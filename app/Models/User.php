<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Model implements Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'email',
        'phone',
        'password',
        'username',
        'role',
    ];

    public function getAuthIdentifierName()
    {
        return 'email';
    }
    public function getAuthIdentifier()
    {
        return $this->email;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getRememberToken()
    {
        return $this->token;
    }
    public function setRememberToken($value)
    {
        $this->token = $value;
    }
    public function getRememberTokenName()
    {
        return 'token';
    }


}
