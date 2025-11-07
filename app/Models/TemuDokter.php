<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model
{
    protected $table = 'temu_dokter';
    protected $primaryKey = 'idreservasi_dokter';
    public $timestamps = false;

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

}
