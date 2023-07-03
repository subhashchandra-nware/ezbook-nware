<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceLocation extends Model
{
    use HasFactory;
    protected $table = 'resourcelocation';

    protected $fillable = [
        'ProviderID',
        'Name',
        'Description',
        'TimeZone',
        'Address1',
        'Address2',
        'City',
        'State_Province',
        'PostalCode',
        'Country',
        'CreatedBy',
        'created_at',
        'updated_at'
    ];

}
