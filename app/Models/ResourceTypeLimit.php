<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceTypeLimit extends Model
{
    use HasFactory;
    protected $table = 'resourcetypelimit';
    public $timestamps= false;
    protected $fillable = [
        'resourcetype',
        'LimitType',
        'Limit',
        'GroupAppliedTo',
    ];
}
