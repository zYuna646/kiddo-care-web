<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    use HasFactory;

    protected $table = 'chats';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'isi',
        'masyarakat_id',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
    }

    public function response()
    {
        return $this->hasOne(Response::class);
    }
}
