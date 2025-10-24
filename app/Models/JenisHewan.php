<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisHewan extends Model
{
    protected $table = 'jenis_hewan';
    protected $primaryKey = 'id_jenis_hewan';
    public $fillable = ['nama_jenis_hewan'];
}

