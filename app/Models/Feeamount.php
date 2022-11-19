<?php

namespace App\Models;

use App\Models\Feecategory;
use App\Models\Studentclass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feeamount extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function feecategory()
    {
        return $this->belongsTo(Feecategory::class, 'fee_category_id', 'id');
    }

    public function studentclass()
    {
        return $this->BelongsTo(Studentclass::class, 'class_id', 'id');
    }
}
