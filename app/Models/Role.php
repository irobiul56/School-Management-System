<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany('App\Model\Permission');
    }

    public function admin_users()
    {
        return $this->belongsToMany('App\Model\Admin');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
