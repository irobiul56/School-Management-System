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

}
