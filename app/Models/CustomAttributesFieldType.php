<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomAttributesFieldType extends Model
{
    use HasFactory;
    protected $table = 'customattributesfieldtype';
    public $timestamps= false;
}
