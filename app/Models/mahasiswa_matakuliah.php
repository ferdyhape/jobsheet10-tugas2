<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa_matakuliah extends Model
{
    protected $table = "mahasiswa_matakuliah";

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }
    public function matakuliah()
    {
        return $this->hasMany(matakuliah::class);
    }
}
