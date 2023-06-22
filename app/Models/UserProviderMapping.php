<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProviderMapping extends Model
{
    use HasFactory;
    protected $table = 'user_provider_mapping';
    public $timestamps= false;

    protected $fillable = [
        'ID',
        'UserId',
        'ProviderId',
        'Active',
    ];
}
