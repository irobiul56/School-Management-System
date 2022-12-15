<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignstudent extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentinfo()
    {
        return $this->BelongsTo(Student::class, 'student_id', 'id');
    }

    public function studentclass()
    {
        return $this->BelongsTo(Studentclass::class, 'class_id', 'id');
    }

    
}
