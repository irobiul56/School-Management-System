<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoverningBody extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->BelongsTo(Admin::class, 'admin_id', 'id');
    }
}
