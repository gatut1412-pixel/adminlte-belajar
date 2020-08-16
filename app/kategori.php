<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $table = 'kategoris';
    protected $primaryKey = 'id';

    public function kelas()
    {
        return $this->hasMany('App\matapelajaran',  'id', 'id');
    }

    public function materikelas()
    {
        return $this->belongsTo('App\materi', 'id', 'id');
    }

    public function soalkelas()
    {
        return $this->belongsTo('App\soal', 'id_kelas', 'id');
    }

    public function ujiankelas()
    {
        return $this->hasMany('App\ujian', 'id_kelas', 'id_kelas');
    }


}
