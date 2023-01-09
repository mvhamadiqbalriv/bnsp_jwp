<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'Peserta';
    protected $primaryKey = 'Id_peserta';
    protected $fillable = ['Id_peserta', 'Kd_skema', 'Jekel', 'Nm_peserta', 'Alamat', 'No_hp'];
    public $timestamps = false;

    public function skema()
    {
        return $this->belongsTo(Skema::class, 'Kd_skema', 'Kd_skema');
    }
}
