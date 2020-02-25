<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = "moduls";
    protected $fillable = ['nama', 'pertemuan_ke', 'mapel', 'modul', 'file'];
}
