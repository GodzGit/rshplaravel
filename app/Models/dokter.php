<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'iddokter';

    protected $fillable = [
        'iduser',
        'nama_dokter',
        'no_wa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }
}
