<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomBookingInfo extends Model
{
    use HasFactory;
    protected $table = 'custombookinginfos';
    protected  $primaryKey = 'ID';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'resource', 'Name', 'FieldType','Description', 'Require'
    ];
}
