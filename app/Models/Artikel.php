<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;


    protected $table = 'artikels';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'title',
        'cover',
        'body',
        'kategori_id',
    ];

    public function KategoriArtikel()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_id');
    }
}
