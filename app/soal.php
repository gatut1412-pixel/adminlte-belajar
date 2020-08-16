<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    //
    protected $table = 'soals';
    protected $primaryKey = 'id';

    public function soalkelas()
    {
        return $this->hasOne('App\kategori', 'id', 'id_kelas');
    }

    public function soalmapel()
    {
        return $this->hasOne('App\matapelajaran', 'id', 'id');
    }

    public function soalmateri()
    {
        return $this->hasOne('App\materi', 'id', 'id');
    }

    public function ujiansoal()
    {
        return $this->hasMany('App\ujian', 'id_soal', 'id_soal');
    }
}
