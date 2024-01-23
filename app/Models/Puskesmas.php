<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;

    protected $table = 'puskesmas';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'provinsi',
        'kabupaten',
        'kecamatan',
        'name',
    ];

    public function masyarakat()
    {
        return $this->hasMany(Masyarakat::class);
    }

    
}
