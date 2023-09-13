<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentclass extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentclasses()
    {
        return $this-> belongsTo(Student::class, 'admitedclass', 'id');
    }

    public function feeamount()
    {
        return $this-> belongsTo(Feeamount::class, 'id', 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function timetables()
    {
        return $this->hasMany(Timetable::class);
    }
}
