<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ujian extends Model
{
    //
    protected $table = 'ujians';
    protected $primaryKey = 'id';

    public function ujiansoal()
    {
        return $this->belongsTo('App\soal', 'id_soal', 'id_soal');
    }

    public function ujiankelas()
    {
        return $this->belongsTo('App\kategori', 'id_kelas', 'id_kelas');
    }

    public function ujianmapel()
    {
        return $this->belongsTo('App\matapelajaran', 'id_mapel', 'id_mapel');
    }

    public function ujianmateri()
    {
        return $this->belongsTo('App\materi', 'id_materi', 'id_materi');
    }
}
