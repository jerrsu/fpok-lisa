<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role_user";
    protected $fillable = ['id','nama_role'];
}
