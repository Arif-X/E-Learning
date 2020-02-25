<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = "pelajarans";
    protected $fillable = ['mapel', 'kelas', 'semester'];
}
