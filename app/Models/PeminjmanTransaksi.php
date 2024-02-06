<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjmanTransaksi extends Model
{
    use HasFactory;

    protected $table = 'peminjman_transaksis';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'pertanyaan_id',
    ];

    public function jawaban ()
    {
        return $this->hasOne(Jawaban::class);
    }
}
