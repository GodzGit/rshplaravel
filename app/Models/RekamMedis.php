<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    public $timestamps = true;
    const UPDATED_AT = null;
    protected $primaryKey = 'idrekam_medis';

    protected $fillable = [
        'anamnesa',
        'temuan_klinis',
        'diagnosa',
        'idreservasi_dokter'
    ];

    // Relasi: Rekam Medis -> Temu Dokter
    public function temuDokter()
    {
        return $this->belongsTo(TemuDokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    // Relasi: Rekam Medis -> Detail Rekam Medis
    public function detailRekamMedis()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }

}
