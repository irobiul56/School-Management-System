<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalstudentsmarks extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentinfo()
    {
        return $this->BelongsTo(Student::class, 'student_id', 'id');
    }

    public function tutorialmarks()
    {
        return $this->BelongsTo(tutorialmarksmodel::class, 'student_id', 'student_id');
    }

    public function year()
    {
        return $this->BelongsTo(Studentyear::class, 'year_id', 'id');
    }

    public function assignsubject()
    {
        return $this->BelongsTo(Assignsubject::class, 'assign_subject_id', 'id');
    }
}
