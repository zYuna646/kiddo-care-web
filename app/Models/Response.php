<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $table = 'responses';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'isi',
        'masyarakat_id',
        'chat_id',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
    }

    public function chat()
    {
        return $this->belongsTo(Chat::class,'chat_id');
    }


}
