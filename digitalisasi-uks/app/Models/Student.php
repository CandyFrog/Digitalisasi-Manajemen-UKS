<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = ['nis', 'nama', 'kelas_id', 'jenis_kelamin'];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'kelas_id');
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }
}
