<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    protected $table = 'masyarakats';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'jenis_kelamin',
        'nik',
        'nkk',
        'user_id',
        'puskesmas_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class, 'puskesmas_id');
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }

   
}
