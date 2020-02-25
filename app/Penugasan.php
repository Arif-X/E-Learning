<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    protected $table = "penugasans";
    protected $fillable = ['kelas', 'mapel', 'semester', 'pertemuan_ke', 'detail', 'pengumpulan_terakhir'];
    protected $dates = ['pengumpulan_terakhir'];
}
