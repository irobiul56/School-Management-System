<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class Admin extends User
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function roleuser()
    {
        return $this->BelongsTo(Role::class, 'role', 'id');
    }

    public function designation()
    {
        return $this->BelongsTo(designation::class, 'designation_id', 'id');
    }

    public function governingbody()
    {
        return $this->BelongsTo(GoverningBody::class, 'admin_id', 'id');
    }
}
