<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Classes()
    {
        return $this->belongsTo(Student_Class::class);
    }
}
