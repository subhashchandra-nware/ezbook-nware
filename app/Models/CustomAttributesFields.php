<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomAttributesFields extends Model
{
    use HasFactory;
    protected $table = 'customattributefields';
    public $timestamps= false;
    protected $fillable = [
        'resourcetype',
        'Name',
        'FieldType',
        'Description',
        'Require',
    ];

}
