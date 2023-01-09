<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    use HasFactory;

    protected $table = 'skema';
    protected $primaryKey = 'Kd_skema';
    protected $fillable = ['Kd_skema', 'Nm_skema', 'Jenis', 'Jml_unit'];
    public $timestamps = false;
    public $incrementing = false;
    
}
