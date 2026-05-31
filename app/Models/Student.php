<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'name',
        'class',
        'status',
        'nisn',
        'gender',
        'birthplace',
        'birthdate',
        'parent_name',
        'nomor_induk',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }

    public function graduation()
    {
        return $this->hasOne(Graduation::class);
    }
}
