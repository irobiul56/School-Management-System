<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentclass()
    {
        return $this->BelongsTo(Studentclass::class, 'admitedclass', 'id');
    }

    public function studentyear()
    {
        return $this->BelongsTo(Studentyear::class, 'id', 'id');
    }
}
