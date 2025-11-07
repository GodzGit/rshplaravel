<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailRekamMedis extends Model
{
    public function kodeTindakan()
{
    return $this->belongsTo(KodeTindakan::class, 'idkode_tindakan_terapi', 'idkode_tindakan_terapi');
}

}
