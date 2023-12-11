<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'adminloginlogs';
    // public $timestamps= false;
    const CREATED_AT = 'loginDateTime';
    const UPDATED_AT = null;

    protected $fillable = [
        'userName','ip',
        // 'loginDateTime',
        'result', 'country'
    ];
}
