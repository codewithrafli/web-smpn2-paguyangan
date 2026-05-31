<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'name',
        'test_number',
        'status',
        'photo',
        'skl_file',
        'skn_file',
        'student_id',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
