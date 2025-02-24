<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $guarded = [];

    public function anggota() {
        return $this->belongsTo(Anggota::class);
    }

    public function buku() {
        return $this->belongsToMany(Buku::class, 'peminjaman_bukus');
    }

    public function peminjaman() {
        return $this->belongsToMany(Peminjaman::class, 'peminjaman_bukus');
    }
}
