<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisHewan extends Model
{
    protected $table = 'jenis_hewan';
    protected $primaryKey = 'idjenis_hewan';
    public $timestamps = false;

    public function ras()
    {
        return $this->hasMany(Ras::class, 'idjenis_hewan', 'idjenis_hewan');
    }
}

