<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $fillable = [
        'nama', 'nik', 'no_telp', 'isi_laporan', 'tgl_pengaduan', 'file'
    ];
}
