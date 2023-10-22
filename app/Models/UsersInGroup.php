<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInGroup extends Model
{
    use HasFactory;
    protected $table = "usersingroups";

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        "UserID","GroupID","Participation",
    ];
}
