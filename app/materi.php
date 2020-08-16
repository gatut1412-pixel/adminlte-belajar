<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materi extends Model
{
    //
    protected $table = 'materis';
    protected $primaryKey = 'id';

    public function materipelajaran()
    {
        return $this->belongsTo('App\matapelajaran', 'id_mapel', 'id');
    }

    public function materikelas()
    {
        return $this->hasOne('App\kategori', 'id', 'id');
    }

    public function soalmateri()
    {
        return $this->belongsTo('App\soal', 'id', 'id');
    }

    public function ujianmateri()
    {
        return $this->hasMany('App\ujian', 'id_materi', 'id_materi');
    }

}
