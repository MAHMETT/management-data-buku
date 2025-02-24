<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kategori(): BelongsTo {
        return $this->belongsTo(Kategori::class);
    }

    public function penerbit(): BelongsTo {
        return $this->belongsTo(Penerbit::class);
    }


    // // Field yang boleh diisi secara massal
    // protected $fillable = [
    //     'judul',
    //     'pengarang',
    //     'tahun_terbit',
    //     'penerbit_id',
    //     'kategori_id',
    // ];
}
