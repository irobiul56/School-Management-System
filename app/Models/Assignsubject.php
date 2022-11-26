<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignsubject extends Model
{
    use HasFactory;


    public function studentclass()
    {
        return $this->BelongsTo(Studentclass::class, 'class_id', 'id');
    }
}
