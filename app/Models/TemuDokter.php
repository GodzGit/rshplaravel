<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model
{
    protected $table = 'temu_dokter';
    protected $primaryKey = 'idtemu';
    public $timestamps = false;

    protected $fillable = [
        'idpet',
        'iddokter',
        'jadwal',
        'status'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'iddokter', 'iduser');
    }

}
