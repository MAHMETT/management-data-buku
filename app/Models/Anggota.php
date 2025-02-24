<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';
    protected $guarded = [];

    public function peminjaman(){
        return $this->belongsToMany(Buku::class,'peminjaman_bukus');
    }
}
