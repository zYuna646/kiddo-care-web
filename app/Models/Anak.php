<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anaks';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'name',
        'nik',
        'anak_ke',
        'jenis_kelamin',
        'tanggal_lahir',
        'berat',
        'tinggi',
        'isMenyusui',
        'isBuku',
        'isBantuan',
        'status',
        'masyarakat_id',
        'puskesmas_id',
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
    }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class,'puskesmas_id');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

}
