<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $timestamps = false;

    public function kodeTindakan()
    {
        return $this->hasMany(KodeTindakan::class, 'idkategori', 'idkategori');
    }
}
