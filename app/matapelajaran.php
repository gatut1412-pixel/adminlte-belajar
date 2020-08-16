<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matapelajaran extends Model
{
    //
    protected $table = 'matapelajarans';
    protected $primaryKey = 'id';

    public function kelas()
    {
        return $this->belongsTo('App\kategori', 'id_kelas', 'id');
    }

    public function materipelajaran()
    {
        return $this->hasMany('App\materi', 'id_mapel', 'id');
    }

    public function soalmapel()
    {
        return $this->belongsTo('App\soal', 'id', 'id');
    }

    public function ujianmapel()
    {
        return $this->hasMany('App\ujian', 'id_mapel', 'id_mapel');
    }

}
