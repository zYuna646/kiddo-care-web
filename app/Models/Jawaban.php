<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'jawaban',
        'pertanyaan_id',
        'anak_id'
    ];

    public function pertanyaan ()
    {
        return $this->belongsTo('pertanyaan_id', Pertanyaan::class);
    }

    public function masyarakat ()
    {
        return $this->belongsTo('anak_id', Pertanyaan::class);
    }
}
