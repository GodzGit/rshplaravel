<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class perawat extends Model
{
    protected $table = 'perawat';
    protected $primaryKey = 'idperawat';

    protected $fillable = [
        'iduser',
        'nama_perawat',
        'no_wa'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }
}
