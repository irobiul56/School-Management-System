<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userdata()
    {
        return $this->BelongsTo(Admin::class, 'user_id', 'id');
    }
}
