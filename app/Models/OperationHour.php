<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationHour extends Model
{
    use HasFactory;
    protected $table = 'operationhours';
    protected  $primaryKey = 'ID';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'Resource', 'DayofWeek', 'OpenTime','CloseTime',
    ];





}
